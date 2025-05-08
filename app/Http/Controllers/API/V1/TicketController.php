<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function index(Request $request) {

    if ($request->has('ref')) {
        $ticket = Ticket::where('ref', $request->ref)->first();

        if ($ticket) {
            return response()->json(['data' => $ticket]);
        } else {
            return response()->json(['message' => 'Ticket not found'], 404);
        }
    }

    $tickets = Ticket::all();

    return response()->json([
        'data' => $tickets
    ]);
}

    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_name' => 'required|max:200',
            'email' => 'required|email',
            'description' => 'required',
        ]);

        $data = $request->only([
            'customer_name',
            'email',
            'phone',
            'description',
        ]);

        $data['ref'] = sha1(time());
        $data['status'] = 0;

        $ticket = Ticket::create($data);

        if ($ticket) {
            // dispatch the TicketCreated event
            \App\Events\TicketCreated::dispatch($ticket);

            return response()->json([
                'data' => $ticket,
                'message' => 'Your ticket is created successfully. Please write down the reference number to check the ticket status later.'
            ]);
        }

        return response()->json([
            'data' => null,
            'message' => 'Oops! Could not create your ticket. Please try later.'
        ], 500);
    }

    public function updateStatus(Request $request, $id) {

        $request->validate([
            'status' => 'required|integer|in:0,1,2,3'
        ]);

        $ticket = Ticket::find($id);
        if (!$ticket) {
            return response()->json(['message' => 'Ticket not found'], 404);
        }

        $ticket->status = $request->status;
        $ticket->save();

        return response()->json([
            'data' => $ticket,
            'message' => 'Ticket status updated successfully.'
        ]);
    }

    public function addComment(Request $request, $id) {

        $request->validate([
            'comment' => 'required|string',
            'user_id' => 'required|exists:users,id' // Agent/User who comments
        ]);

        $ticket = Ticket::find($id);
        if (!$ticket) {
            return response()->json(['message' => 'Ticket not found'], 404);
        }

        $comment = $ticket->comments()->create([
            'comment' => $request->comment,
            'user_id' => $request->user_id
        ]);

        return response()->json([
            'data' => $comment,
            'message' => 'Comment added successfully.'
        ]);
    }

    public function assignToAgent(Request $request, $id) {

        $request->validate([
                'agent_id' => 'required|exists:users,id'
            ]);

            $ticket = Ticket::find($id);
            if (!$ticket) {
                return response()->json(['message' => 'Ticket not found'], 404);
            }

            $ticket->assigned_to = $request->agent_id;
            $ticket->save();

            return response()->json([
                'data' => $ticket,
                'message' => 'Ticket assigned to agent successfully.'
            ]);
        }

}

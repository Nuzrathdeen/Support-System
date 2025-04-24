<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required',
            'ticket_id' => 'required|exists:tickets,id',
        ]);

        $data = $request->only(['content', 'ticket_id']);
        $data['user_id'] = auth()->check() ? auth()->id() : null;
        $comment = Comment::create($data);

        if ($comment) {
            return redirect(route('tickets.show', $comment->ticket_id))
                ->with('success', 'Your reply added successfully.');
        }

        return redirect()->back()
            ->with('error', 'Opps! we could not save your reply. Please try again.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Ticket extends Model
{
    use HasFactory;

    protected $with= ['comments', 'comments.user'];

    protected $fillable = [
        'customer_name',
        'email',
        'phone',
        'description',
        'ref',
        'status',
    ];
    /**
     * A Ticket Has Many Comments
     *
     */
    public function comments(){

        return $this->hasMany(\App\Models\Comment::class);
    }

    public function getLastCommentedAgentAttribute(){

        return $this->comments->sortByDesc('created_at')
            ->whereNotNull('user')->pluck('user')->first();
    }


////////////////
    //  use HasFactory;

    // // It's better to eager load only when needed, so we remove $with for now.

    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * You should add the fields you want to allow for mass assignment.
    //  */
    // protected $fillable = [
    //     'customer_name',
    //     'email',
    //     'description',
    //     // add other fields you have in your tickets table
    // ];

    // /**
    //  * A Ticket has many Comments
    //  */
    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }

    // /**
    //  * Get the last agent who commented on the ticket.
    //  */
    // public function getLastCommentedAgentAttribute()
    // {
    //     return $this->comments()
    //         ->whereHas('user')        // Ensure comment has a user
    //         ->with('user')             // Eager load user
    //         ->orderByDesc('created_at') // Latest first
    //         ->first()?->user;           // Get the user's model
    // }

}

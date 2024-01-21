<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Idea $idea){
        request()->validate([
            'comment_content'=> 'required|min:2',
        ]);
        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->idea_id = $idea->id;
        $comment->content = request()->get('comment_content');
        $comment->save();
        return redirect()->route('ideas.show',$idea->id)->with('success','Comment Created Successfully');
    }

    // public function destroy(Idea $idea){
    //     $comment = auth()->user();

    //     $comment->comments()->delete($idea);

    //     return redirect()->route('dashboard')->with('success','Idea deleted Successfully');
    // }
}

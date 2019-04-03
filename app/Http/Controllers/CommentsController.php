<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function addComment(Request $request)
    {
        $this->validate($request,[
            'message' => 'required'
        ]);

        $comment = new Comment();
        $comment->text = $request->get('message');
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->get('post_id');
        $comment->save();

        return redirect()->back()->with('status', 'Коментарий добавлен');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CreateCommentRequest $request, Idea $idea)
    {
        // dump($idea);
        $val = $request->validated();
        $val['user_id'] = auth()->id();
        $val['idea_id'] = $idea->id;

        Comment::create($val);
        return redirect()->route("dashboard")->with("success", "Comment posted successfully!");
    }
}

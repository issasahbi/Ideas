<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class IdeaLikeController extends Controller
{
    public function Like(Idea $idea)
    {
        $liker = auth()->user();
        $liker->likes()->attach($idea);
        return redirect()->route("dashboard")->with("success", "you liked this idea");
    }
    public function unlike(Idea $idea)
    {
        $liker = auth()->user();
        $liker->likes()->detach($idea);
        return redirect()->route("dashboard")->with("success", "you unliked this idea");
    }
}

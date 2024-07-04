<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();
        $followingsIDs = $user->followings()->pluck("user_id");
        //dd($followingsIDs);
        $idea = Idea::whereIn('user_id', $followingsIDs)->latest();
        if (request()->has("search")) {
            $idea = Idea::where("content", "LIKE", "%" . request()->get('search', '') . "%");
        }
        return view("dashboard", [
            'ideas' => $idea->paginate(5)
        ]);
    }
}

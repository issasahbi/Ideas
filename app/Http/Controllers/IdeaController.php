<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use App\Http\Requests\IdeaRequest;

class IdeaController extends Controller
{
    public function store(IdeaRequest $request)
    {
        $idea = Idea::create([
            'content' => $request->content
        ]);
        return redirect()->route("dashboard")->with("success", "Idea Created Successfully!");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use App\Http\Requests\IdeaRequest;

class IdeaController extends Controller
{
    public function show(Idea $idea)
    {

        return view("ideas.show", ['idea' => $idea]);
    }
    public function store(IdeaRequest $request)
    {
        $idea = Idea::create([
            'content' => $request->content
        ]);
        return redirect()->route("dashboard")->with("success", "Idea Created Successfully!");
    }
    public function destroy(Idea $idea)
    {
        $idea->delete();
        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }
    public function edit(Idea $idea)
    {
        $editing = true;
        return view("ideas.show", ['idea' => $idea, 'editing' => $editing]);
    }
    public function update(Idea $idea)
    {
        $validated = request()->validate([
            'content' => 'required|min:3|max:240'
        ]);
        $idea->update($validated);
        // dd($request->content);
        return redirect()->route('ideas.show', $idea->id)->with('success', 'idea updated successfully!');
    }
}

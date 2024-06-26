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

        $request->merge(['user_id' => auth()->id()]);
        $idea = Idea::create([
            'content' => $request->content,
            'user_id' => $request->user_id
        ]);
        return redirect()->route("dashboard")->with("success", "Idea Created Successfully!");
    }
    public function destroy(Idea $idea)
    {
        if (auth()->id() !== $idea->id) {
            abort(404, 'you do not have the permission !!');
        }
        $idea->delete();
        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }
    public function edit(Idea $idea)
    {
        if (auth()->id() !== $idea->id) {
            abort(404, 'you do not have the permission !!');
        }
        $editing = true;
        return view("ideas.show", ['idea' => $idea, 'editing' => $editing]);
    }
    public function update(Idea $idea)
    {
        if (auth()->id() !== $idea->id) {
            abort(404, 'you do not have the permission !!');
        }
        $validated = request()->validate([
            'content' => 'required|min:3|max:240'
        ]);
        $idea->update($validated);
        // dd($request->content);
        return redirect()->route('ideas.show', $idea->id)->with('success', 'idea updated successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $idea = Idea::orderBy('created_at', 'DESC');
        if (request()->has("search")) {
            $idea = Idea::where("content", "LIKE", "%" . request()->get('search', '') . "%");
        }
        return view("dashboard", [
            'ideas' => $idea->paginate(5)
        ]);
    }
}

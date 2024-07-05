<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // $this->authorize("admin"); // use gate "admin" to ensure the user is admin to access !


        /* ********** use gate "admin" to ensure the user is admin to access ! ***********

       if (Gate::denies("admin")) {
            return abort(403);
        }

        *******************************************************/


        return view("admin.dashboard");
    }
}

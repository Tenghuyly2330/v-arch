<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {

        $data['project'] = Project::orderBy('created_at', 'asc')->get();

        return view('frontend.project', $data);
    }

    public function showProject($slug)
    {
        $data['project'] = Project::where('slug', $slug)->firstOrFail();


        return view('frontend.showProject', $data);
    }
}

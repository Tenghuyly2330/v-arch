<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Banner;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {

        $data['project'] = Project::orderBy('created_at', 'asc')->get();
        $data['banners'] = Banner::find(6);

        return view('frontend.project', $data);
    }

    public function showProject($slug)
    {
        $data['project'] = Project::where('slug', $slug)->firstOrFail();
        $data['banners'] = Banner::find(6);

        return view('frontend.showProject', $data);
    }
}

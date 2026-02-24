<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    //
    public function home()
    {
        $posts = \App\Models\Post::latest()->get();
        $services = Service::all();
        $teamMembers = TeamMember::all();
        $abouts = About::orderBy('id')->get();

        return view('front.pages.home.index', [
            'posts' => $posts,
            'services' => $services,
            'teamMembers' => $teamMembers,
            'abouts' => $abouts,
        ]);
    }
    public function about()
    {
        $abouts = About::orderBy('id')->get();

        return view('front.pages.about.index', [
            'title' => 'About',
            'abouts' => $abouts,
        ]);
    }

    public function contact()
    {
        return view('front.pages.contact.index', [
            'title' => 'Contact',
        ]);
    }
    public function team() {
        $teamMembers = TeamMember::all();
        return view('front.pages.home.components.team', compact('teamMembers'));
    }
}

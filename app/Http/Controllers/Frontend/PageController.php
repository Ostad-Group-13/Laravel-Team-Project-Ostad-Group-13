<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    function contactPage(){
        return view('pages.contact');
    }

    function blogPage(){
        return view('pages.blog');
    }
}

<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
    function index()
    {
        return view(('index'));
    }
    function pricing()
    {
        return view(('pricing'));
    }
    function faq()
    {
        return view(('faq'));
    }
    function about()
    {
        return view(('about'));
    }
    function contact()
    {
        return view(('contact'));
    }
}

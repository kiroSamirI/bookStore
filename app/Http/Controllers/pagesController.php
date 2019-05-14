<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function index(){
    //     $title = 'Welcome to Laravel';
    //    // return view('pages.index', compact('title'));
    //    return view('pages.index')->with('title', $title);
    $books = book::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.index') -> with('books',$books);
    }

    public function about(){
        $title = 'About Us';
        return view('pages.about')->with('title', $title);
    }

    public function services(){
        $data = array(
            'title' => 'Our Services',
            'services' => ['web design', 'web develop', 'SEO']
        );
        return view('pages.services')->with($data);
    }
}

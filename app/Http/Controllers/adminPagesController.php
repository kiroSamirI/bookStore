<?php

namespace App\Http\Controllers;
use App\User;
use App\Book;
use Illuminate\Http\Request;

class adminPagesController extends Controller
{

    public function listUsers(){

        $users = User::all();
        return view('admin.listUsers')-> with ('users',$users);
    }

    public function listBooks(){

        $books = Book::all();
        return view('admin.listBooks')-> with ('books',$books);
    }
    public function adminIndex(){

        return view('admin.adminHome');
    }
}

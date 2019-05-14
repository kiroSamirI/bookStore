<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logger;
use App\Book;
use App\User;

use DB;

use Auth;

class booksController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index', 'show']);
    }


    private function mylog(array $data , Loger $loger){
        //$log = new $logger;
        $loger->log($data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //order books by their title in an ascending order
        //$books = book::orderBy('title', 'desc')->take(2)->get();
        //$books = book::orderBy('title', 'desc')->get();
        //$books = Book::all();
        //$books = DB::select('SELECT * FROM books');
        
        $books = book::orderBy('created_at', 'desc')->paginate(10);
        return view('books.index') -> with('books',$books);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'title' => 'required',
            'description' => 'required',
            'book_image' => 'image | nullable | max : 1999',
        ]);

        // file handling
        if( $request -> hasFile('book_image')){
            // get full name with extension
            $fileNameWithExt = $request -> file('book_image') -> getClientOriginalName();

            // get just name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request -> file('book_image') -> getClientOriginalExtension();
            // filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload image
            $path = $request -> file('book_image')->storeAs('public/book_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';

        }

        
        $book = new Book;
        $book -> title = $request->input('title');
        $book -> description = $request->input('description');
        $book -> user_id = \Auth::user()->id;  
        $book -> book_image = $fileNameToStore;
        $book->price = $request->input('price');
        $book -> save();

        $data = array("operation" => "insert",
                        "comment" => "inaert".$book -> title ."to log file");
        
        $this->mylog($data , new logToFileController);
        return redirect('/books')->with('success', 'book uplooaded');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $book = book::find($id);
        return view('books.show') ->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = book::find($id);

        //check for correct user
        if(Auth::user()-> id != $book -> user_id){
        
            return redirect('/books') ->with('error', 'Unauthorized');
        }

        return view('books.edit') ->with('book', $book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this -> validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);
        
        $book =  Book::find($id);
        $book -> title = $request->input('title');
        $book -> description = $request->input('description');  
        $book->price =$request->input('price');
        $book -> save();
        
        return redirect('/books')->with('success', 'book Updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $user = User::find(auth() -> user() -> id);
        //dd($user);
        $book = Book::find($id);

        if($user -> is_admin()){
            
            $book -> delete();
            return redirect('/listBooks')->with('success', 'book Deleted');

        }

         //check for correct user
        if(Auth::user()-> id != $book -> user_id){
            return redirect('/books') ->with('error', 'Unauthorized');
        }

        $book -> delete();
        
        return redirect('/books')->with('success', 'book Deleted');
    }
   
}

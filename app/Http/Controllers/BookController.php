<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Writer;
use Exception;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = [
        //     'book' => $this->Book->allData()
        // ];
        $book = Book::with('Writer')->get();
        // return $book;
        return view('pustaka.index', [
            'books'=>$book
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $writer = Writer::all();
       return view('pustaka/create', [
           'writers'=>$writer,
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $books = Book::create([
        //     'writer_id'     => $request->input('writer_id'),
        //     'book_title'     => $request->input('book_title'),
        //     'book_price'   => $request->input('book_price'),
        //     'book_type'   => $request->input('book_price'),
        // ]);

        // $books->save();
        $book = new Book;
        $book->writer_id =  $request->input('writer_id');
        $book->book_title = $request->input('book_title');
        $book->book_price =  $request->input('book_price');
        $book->book_type = $request->input('book_type');

        try{
            $book->save();
            return redirect('/book');
        } catch(Exception $e){
            return response()->json([
                'message' => 'Internal error',
                'code' => '500',
                'error' => true,
                'errors' => $e,
            ]);
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $book = Book::with('Writer')->findOrFail($id);
         $writers = Writer::all();
        // return $writer;
        return view('pustaka.edit', [
            'book'=>$book,
            'writers'=>$writers,
        ]);
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
        $book = Book::with('Writer')->findOrFail($id);
        $book->writer_id =  $request->input('writer_id');
        $book->book_title = $request->input('book_title');
        $book->book_price =  $request->input('book_price');
        $book->book_type = $request->input('book_type');

        try{
            $book->save();
            return redirect('/book');
        } catch(Exception $e){
            return response()->json([
                'message' => 'Internal error',
                'code' => '500',
                'error' => true,
                'errors' => $e,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::with('Writer')->findOrFail($id);
        $book->delete();
        try{
            $book->delete();
            return redirect('/book');
        } catch(Exception $e){
            return response()->json([
                'message' => 'Internal error',
                'code' => '500',
                'error' => true,
                'errors' => $e,
            ]);
        }
    }
    
}

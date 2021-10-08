<?php

namespace App\Http\Controllers;

use App\Models\Writer;
use Exception;
use Illuminate\Http\Request;

class WriterController extends Controller
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
        // return $book;
        $writers = Writer::get();
        return view('writer.index', [
            'writers'=>$writers,
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
       return view('writer/create', [
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
        $writer = new Writer;
        $writer->writer_name = $request->input('writer_name');
        $writer->address =  $request->input('address');
        $writer->phone_number = $request->input('phone_number');
        $writer->book_publish = $request->input('book_publish');

        try{
            $writer->save();
            return redirect('/writer');
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
         $writer = Writer::find($id);
        // return $writer;
        return view('writer.edit', [
            'writer'=>$writer,
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
        $writer = Writer::findOrFail($id);
        $writer->writer_name =  $request->input('writer_name');
        $writer->address = $request->input('address');
        $writer->phone_number =  $request->input('phone_number');
        $writer->book_publish = $request->input('book_publish');

        try{
            $writer->save();
            return redirect('/writer');
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
        $writer = Writer::findOrFail($id);
        try{
            $writer->delete();
            return redirect('/writer');
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

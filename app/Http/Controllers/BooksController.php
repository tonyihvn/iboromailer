<?php

namespace App\Http\Controllers;

use App\Models\books;
use App\Models\categories;
use App\Models\supplies;
use App\Models\access;
use App\Models\book_stock;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = books::select(['id','title','publisher','isbn_no','author','subtitle','copyright_year','image'])->get();
        return view('books')->with(['books'=>$books]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = categories::where('group_name','Books')->orWhere('group_name','Book Locations')->get();
        return view('new-book')->with(['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorebooksRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->bid>0){
            $outcome = "modified";
        }else{
            $outcome = "created";
        }

        $validateData = $request->validate([
            'image'=>'image|mimes:jpg,png,jpeg'
        ]);

        if(!empty($request->file('image'))){
            $file_name = time().'.'.$request->image->extension();
            $request->image->move(\public_path('files'),$file_name);
        }else{
                $file_name = "";
        }

        $bid = books::updateOrCreate(['id'=>$request->cid],[
            'title'=>$request->title,
            'subtitle'=>$request->subtitle,
            'author'=>$request->author,
            'description'=>$request->description,
            'location'=>$request->location,
            'image'=>$file_name,
            'category'=>$request->category,
            'publisher'=>$request->publisher,
            'copyright_year'=>$request->copyright_year,
            'status'=>$request->status,
            'school_id'=>Auth()->user()->school_id

        ]);

        book_stock::updateOrCreate(['book_id',$bid->id],[
            'book_id'=>$bid->id,
            'quantity'=>0,
            'school_id'=>Auth()->user()->school_id
        ]);

        if($request->isbn_no==""){
            $isbn_no=="NA".$bid->id;
        }else{
            $isbn_no = $request->isbn_no;
        }

        $bid->isbn_no = $isbn_no;
        $bid->save();

        $message = 'The '.$request->object.' has been '.$outcome.' successfully';

        return redirect()->route('books')->with(['message'=>$message]);

    }

    public function editBook($bid)
    {
        $book = books::where('id',$bid)->first();
        $categories = categories::where('group_name','Books')->get();
        return view('new-book')->with(['book'=>$book,'categories'=>$categories]);
    }

    public function Book($bid)
    {
        $book = books::where('id',$bid)->first();
        $categories = categories::where('group_name','Checkout Plans')->get();
        $suppliers = supplies::where('book_id',$bid)->get();
        $accesses = access::where('book_id',$bid)->get();
        $supplies = supplies::where('book_id',$bid)->get();

        return view('book')->with(['book'=>$book,'categories'=>$categories,'suppliers'=>$suppliers,'supplies'=>$supplies,'accesses'=>$accesses]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\books  $books
     * @return \Illuminate\Http\Response
     */
    public function show(books $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\books  $books
     * @return \Illuminate\Http\Response
     */
    public function edit(books $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebooksRequest  $request
     * @param  \App\Models\books  $books
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatebooksRequest $request, books $books)
    {
        //
    }

    public function Barcodes(Request $request){
        $books = books::select(['id','title','author','subtitle','isbn_no'])->get();
        return view('barcodes')->with(['books'=>$books]);
    }

    public function searchByISBN(Request $request){
        $book = books::where('isbn_no',$request->isbn_no)->first();
        $bid = $book->id;
        $categories = categories::where('group_name','Checkout Plans')->get();
        $suppliers = supplies::where('book_id',$bid)->get();
        $accesses = access::where('book_id',$bid)->get();
        $supplies = supplies::where('book_id',$bid)->get();

        return view('book')->with(['book'=>$book,'categories'=>$categories,'suppliers'=>$suppliers,'supplies'=>$supplies,'accesses'=>$accesses]);
    }

    public function searchByKeyweord(Request $request){
        $books = books::select(['id','title','author','subtitle','isbn_no'])->get();
        return view('barcodes')->with(['books'=>$books]);
    }

    public function Returned($bid)
    {
        $access = access::where('id',$bid)->first();
        $access->status = 'Returned';
        $access->save();

        book_stock::where('book_id', $access->book_id)->increment('quantity', $access->quantity_checkout);


        $message = 'The book checkout has been updated!';

        return redirect()->back()->with(['message'=>$message]);
    }

    public function Lost($bid)
    {
        $access = access::where('id',$bid)->first();
        $access->status = 'Lost';
        $access->save();

        $message = 'The book checkout has been updated!';

        return redirect()->back()->with(['message'=>$message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\books  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy(books $books)
    {
        //
    }
}

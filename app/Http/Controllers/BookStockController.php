<?php

namespace App\Http\Controllers;

use App\Models\book_stock;
use App\Http\Requests\Storebook_stockRequest;
use App\Http\Requests\Updatebook_stockRequest;

class BookStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storebook_stockRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storebook_stockRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\book_stock  $book_stock
     * @return \Illuminate\Http\Response
     */
    public function show(book_stock $book_stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book_stock  $book_stock
     * @return \Illuminate\Http\Response
     */
    public function edit(book_stock $book_stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatebook_stockRequest  $request
     * @param  \App\Models\book_stock  $book_stock
     * @return \Illuminate\Http\Response
     */
    public function update(Updatebook_stockRequest $request, book_stock $book_stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book_stock  $book_stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(book_stock $book_stock)
    {
        //
    }
}

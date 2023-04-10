<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Http\Requests\StoreproductsRequest;
use App\Http\Requests\UpdateproductsRequest;
use Illuminate\Http\Request;

use App\Models\User;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = products::all();
        return view('products')->with(['products'=>$products]);
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

    public function newProduct(){
        $suppliers = User::where('role','Supplier')->get();
        return view('new-product')->with(['suppliers'=>$suppliers]);
    }

    public function editProduct($pid)
    {
        $product = products::where('id',$pid)->first();
        $suppliers = User::where('role','Supplier')->get();
        return view('new-product')->with(['product'=>$product,'suppliers'=>$suppliers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->product_id!=''){
            $outcome = "modified";
        }else{
            $outcome = "created";
        }


        products::updateOrCreate(['id'=>$request->product_id],[
            'title'=>$request->title,
            'price'=>$request->price,
            'supplier_id'=>$request->supplier_id,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'detail'=>$request->detail,
            'terms'=>$request->terms,
            'status'=>$request->status,
            'business_id'=>Auth()->user()->business_id
        ]);

        $message = 'The product has been '.$outcome.' successfully';

        return redirect()->route('products')->with(['message'=>$message]);
    }

    public function productDashboard($pid)
    {
        $product = products::where('id',$pid)->first();
        return view('product-dashboard')->with(['product'=>$product]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductsRequest  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateproductsRequest $request, products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(products $products)
    {
        //
    }
}

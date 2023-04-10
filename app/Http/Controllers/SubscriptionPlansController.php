<?php

namespace App\Http\Controllers;

use App\Models\subscription_plans;
use App\Models\products;
use App\Http\Requests\Storesubscription_plansRequest;
use App\Http\Requests\Updatesubscription_plansRequest;
use Illuminate\Http\Request;


class SubscriptionPlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subplans = subscription_plans::paginate(50);
        $products = products::select('id','title','price','supplier_id')->get();

        return view('subscription_plans', compact('subplans','products'));
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
     * @param  \App\Http\Requests\Storesubscription_plansRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        subscription_plans::updateOrCreate(['id'=>$request->id],[
            'title'=>$request->title,
            'product_id'=>$request->product_id,
            'frequency'=>$request->frequency,
            'no_times'=>$request->no_times,
            'duration_per'=>$request->duration_per,
            'amount_per'=>$request->amount_per,
            'penalty'=>$request->penalty,
            'business_id'=>Auth()->user()->business_id
        ]);
        $message = 'The Subscription Plan has been created!';

        return redirect()->route('subplans')->with(['message'=>$message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\subscription_plans  $subscription_plans
     * @return \Illuminate\Http\Response
     */
    public function show(subscription_plans $subscription_plans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subscription_plans  $subscription_plans
     * @return \Illuminate\Http\Response
     */
    public function edit(subscription_plans $subscription_plans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatesubscription_plansRequest  $request
     * @param  \App\Models\subscription_plans  $subscription_plans
     * @return \Illuminate\Http\Response
     */
    public function update(Updatesubscription_plansRequest $request, subscription_plans $subscription_plans)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subscription_plans  $subscription_plans
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        subscription_plans::findOrFail($id)->delete();
        $message = 'The Subscription Plan has been deleted!';
        return redirect()->route('subplans')->with(['message'=>$message]);
    }
}

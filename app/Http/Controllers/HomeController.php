<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reservation;
use App\Models\sentmails;
use App\Models\settings;

// To be used for registration
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Artisan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reservations = Reservation::select('id','title','full_name')->get();
        $sentmails = sentmails::select('id','recipients','title','category','status')->get();
        return view('home')->with(['reservations'=>$reservations,'sentmails'=>$sentmails]);
    }


    public function settings(request $request){
        $validateData = $request->validate([
            'logo'=>'image|mimes:jpg,png,jpeg,gif,svg',
            'background'=>'image|mimes:jpg,png,jpeg,gif,svg'
        ]);

        if(!empty($request->file('logo'))){

            $logo = time().'.'.$request->logo->extension();

            $request->logo->move(\public_path('images'),$logo);
        }else{
            $logo = $request->oldlogo;
        }

        if(!empty($request->file('background'))){

            $background = time().'.'.$request->background->extension();

            $request->background->move(\public_path('images'),$background);
        }else{
            $background = $request->oldbackground;
        }


        settings::updateOrCreate(['id'=>$request->id],[
            'company_name' => $request->school_name,
            'motto' => $request->motto,
            'logo' => $logo,
            'address' => $request->address,
            'background' => $background,
            'mode'=>$request->mode,
            'color'=>$request->color        ]);


        $message = "The settings has been updated!";
        return redirect()->back()->with(['message'=>$message]);
      }

      public function Artisan1($command) {
        $artisan = Artisan::call($command);
        $output = Artisan::output();
        return dd($output);
    }

    public function Artisan2($command, $param) {
        $output = Artisan::call($command.":".$param);
        return dd($output);
    }



}

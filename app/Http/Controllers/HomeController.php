<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\projects;
use App\Models\categories;

// To be used for registration
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
        $projects = projects::with('milestones:project_id,status')->get(['id','title', 'status']);
        return view('home')->with(['projects'=>$projects]);
    }

    public function clients()
    {
        $allclients = User::where('role','Client')->get();
        return view('clients')->with(['allclients'=>$allclients]);
    }



    public function newClient()
    {
        $categories = categories::where('group_name','Clients')->get();
        return view('new-client')->with(['categories'=>$categories]);
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    public function saveClient(Request $request)
    {
        if($request->password!=""){
            $password = Hash::make($request->password);

        }else{
            $password =$request->oldpassword;
        }

        if($request->cid>0){
            $outcome = "modified";
        }else{
            $outcome = "created";
        }

        User::updateOrCreate(['id'=>$request->cid],[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'about'=>$request->about,
            'phone_number'=>$request->phone_number,
            'company_name'=>$request->company_name,
            'category'=>$request->category,
            'address'=>$request->address,
            'role'=>$request->role,
            'status'=>$request->status,
            'business_id'=>Auth()->user()->business_id

        ]);

        $message = 'The '.$request->object.' has been '.$outcome.' successfully';

        return redirect()->route('clients')->with(['message'=>$message]);
    }

    public function editClient($cid)
    {
        $client = User::where('id',$cid)->first();
        $categories = categories::where('group_name','Clients')->get();
        return view('new-client')->with(['client'=>$client,'categories'=>$categories]);
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
            'ministry_name' => $request->ministry_name,
            'motto' => $request->motto,
            'logo' => $logo,
            'address' => $request->address,
            'background' => $background,
            'mode'=>$request->mode,
            'color'=>$request->color,
            'ministrygroup_id'=>$request->ministrygroup_id,
            'user_id'=>$request->user_id
        ]);


        $message = "The settings has been updated!";
        return redirect()->back()->with(['message'=>$message]);
      }

}

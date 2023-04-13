<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\books;
use App\Models\categories;
use App\Models\access;
use App\Models\school;

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
        $books = books::select(['id','title', 'subtitle','image'])->get();
        $checkouts = access::select(['id','status'])->get();

        return view('home')->with(['books'=>$books,'checkouts'=>$checkouts]);
    }

    public function students()
    {
        $allstudents = User::where('role','Student')->get();
        return view('students')->with(['allstudents'=>$allstudents]);
    }



    public function newStudent()
    {
        $categories = categories::where('group_name','Students')->get();
        return view('new-student')->with(['categories'=>$categories,'object'=>'Student']);
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    public function saveStudent(Request $request)
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
            'phone_number'=>$request->phone_number,
            'matric_no'=>$request->matric_no,
            'dob'=>$request->dob,
            'gender'=>$request->gender,
            'category'=>$request->category,
            'address'=>$request->address,
            'role'=>$request->role,
            'status'=>$request->status,
            'school_id'=>Auth()->user()->school_id

        ]);

        $smallobject = $request->object;
        if($smallobject!="Staff"){
            $smallobject = strtolower($smallobject)."s";
        }else{
            $smallobject = strtolower($smallobject);
        }
        $message = 'The '.$request->object.' has been '.$outcome.' successfully';

        return redirect()->route($smallobject)->with(['message'=>$message]);
    }

    public function editStudent($cid)
    {
        $student = User::where('id',$cid)->first();
        $categories = categories::where('group_name','Students')->get();
        return view('new-student')->with(['student'=>$student,'categories'=>$categories, 'object'=>'Student']);
    }
    public function editSupplier($cid)
    {
        $student = User::where('id',$cid)->first();
        $categories = categories::where('group_name','Students')->get();
        return view('new-student')->with(['student'=>$student,'categories'=>$categories, 'object'=>'Supplier']);
    }
    public function editStaff($cid)
    {
        $student = User::where('id',$cid)->first();
        $categories = categories::where('group_name','Students')->get();
        return view('new-student')->with(['student'=>$student,'categories'=>$categories, 'object'=>'Staff']);
    }

    public function newSupplier()
    {
        $categories = categories::where('group_name','Suppliers')->get();
        return view('new-student')->with(['categories'=>$categories, 'object'=>'Supplier']);
    }

    public function newStaff()
    {
        $categories = categories::where('group_name','Staff')->get();
        return view('new-student')->with(['categories'=>$categories, 'object'=>'Staff']);
    }

    public function Suppliers()
    {
        $allstudents = User::where('role','Supplier')->get();
        return view('suppliers')->with(['allstudents'=>$allstudents]);
    }

    public function Staff()
    {
        $allstudents = User::where('role','Staff')->orWhere('role','Admin')->orWhere('role','Super')->get();
        return view('staff')->with(['allstudents'=>$allstudents]);
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


        school::updateOrCreate(['id'=>$request->id],[
            'school_name' => $request->school_name,
            'motto' => $request->motto,
            'logo' => $logo,
            'address' => $request->address,
            'background' => $background,
            'mode'=>$request->mode,
            'color'=>$request->color,
            'user_id'=>$request->user_id
        ]);


        $message = "The settings has been updated!";
        return redirect()->back()->with(['message'=>$message]);
      }



}

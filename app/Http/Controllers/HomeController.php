<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reservation;
use App\Models\sentmails;
use App\Models\settings;
use App\Models\events;
use App\Models\registrations;
use App\Models\contacts;
use App\Models\resources;
use Illuminate\Support\Facades\File;

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

    public function publishEvent(request $request){

        if(isset($request->event_id)){
            $event = events::where('id',$request->event_id)->first();
            $event_id = $request->event_id;
            $slide1 = $event->slide1;
            $slide2 = $event->slide2;
            $slide3 = $event->slide3;

            $flyer1 = $event->flyer1;
            $flyer2 = $event->flyer2;
            $flyer3 = $event->flyer3;
            $status = $request->status;
            $postevent_detail = $request->postevent_detail;
            $message = "Event Updated Successfully!";
        }else{
            $event_id = 0;
            $slide1 = '';
            $slide2 = '';
            $slide3 = '';

            $flyer1 = '';
            $flyer2 = '';
            $flyer3 = '';
            $message = "New Event Created!";
            $status = "";
            $postevent_detail = $request->postevent_detail;
        }

        if(!empty($request->file('slide1'))){

            $slide1 = time().'.'.$request->slide1->extension();

            $request->slide1->move(\public_path('images-event'),$slide1);
        }

        if(!empty($request->file('slide2'))){

            $slide2 = time().'.'.$request->slide2->extension();

            $request->slide2->move(\public_path('images-event'),$slide2);
        }

        if(!empty($request->file('slide3'))){

            $slide3 = time().'.'.$request->slide3->extension();

            $request->slide3->move(\public_path('images-event'),$slide3);
        }

        if(!empty($request->file('flyer1'))){

            $flyer1 = time().'.'.$request->flyer1->extension();

            $request->flyer1->move(\public_path('images-event'),$flyer1);
        }

        if(!empty($request->file('flyer2'))){

            $flyer2 = time().'.'.$request->flyer2->extension();

            $request->flyer2->move(\public_path('images-event'),$flyer2);
        }

        if(!empty($request->file('flyer3'))){

            $flyer3 = time().'.'.$request->flyer3->extension();

            $request->flyer3->move(\public_path('images-event'),$flyer3);
        }

        events::updateOrCreate(['id'=>$event_id],[
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'details' => $request->details,
            'from' => $request->from,
            'to' => $request->to,
            'venue'=>$request->venue,
            'bgcolor'=>$request->bgcolor,
            'textcolor'=>$request->textcolor,
            'more_info'=>$request->more_info,

            'slide1'=>$slide1,
            'slide2'=>$slide2,
            'slide3'=>$slide3,

            'flyer1'=>$flyer1,
            'flyer2'=>$flyer2,
            'flyer3'=>$flyer3,

            'url'=>$request->url,
            'linkText'=>$request->linkText,
            'map_location'=>$request->map_location,
            'postevent_detail' => $postevent_detail,
            'status' => $status
        ]);

        return redirect()->back()->with(['message'=>$message]);

    }

    public function publishPostEvent(request $request){


        // Validate the request data
        $request->validate([
            'resources.*' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png', // Adjust MIME types as needed
        ]);

        $files = $request->file('materials');
        $gallery = $request->file('gallery');
        $destinationPath = public_path('images-event/'.$request->event_id);

        if (!is_dir($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        if(!empty($files)){
            foreach ($files as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move($destinationPath, $fileName);

                resources::updateOrCreate(['material_name'=>$fileName],[
                    'material_name' => $fileName,
                    'event_id' => $request->event_id
                ]);
            }
        }

        if(!empty($gallery)){
            foreach ($gallery as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move($destinationPath, $fileName);
            }
        }

        events::updateOrCreate(['id'=>$request->event_id],[
            'postevent_detail' => $request->postevent_detail,
            'status' => 'Past'
        ]);


        $message = "The Post Event Content was published successfully.";
        return redirect()->back()->with(['message'=>$message]);

    }

    public function registerEvent(request $request){
        $event = events::where('id',$request->event_id)->first();
        registrations::create([
            'event_id' => $request->event_id,
            'first_name' => $request->first_name,
            'other_names' => $request->other_names,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'payment'=>'Not Paid',
            'your_conference_interest'=>$request->your_event_interest,
            'approval'=>'Not Approved'
        ]);

        contacts::create([
            'name' => $request->first_name.' '.$request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'group' => $event->title."-".date("Y",strtotime($event->from)),
            'info' => 'Participant Register for the Event',
        ]);

        if($event->url!=""){
            $message = "Your registration was successful. Please <a href='".$event->url."' class='btn btn-primary' target='_blank'>Click Here to Make Payment</a>. Thank you!";
        }else{
            $message = "Your registration was successful. We will send you updates about the event by email. Thank you!";
        }

        return redirect()->back()->with(['message'=>$message]);

    }

    public function events()
    {
        $events = events::all();

        return view('events')->with(['events'=>$events]);
    }

    public function createEvent(){
        return view('event-form');
    }

    public function editEvent($event_id)
    {
        $event = events::where('id',$event_id)->first();
        return view('edit-event', compact('event'));
    }

    public function addPostEvent($event_id)
    {
        return view('postevent-form', compact('event_id'));
    }



    public function eventRegistrations()
    {
        $registrations = registrations::where('event_id',$event_id)->get();

        return view('registrations')->with(['registrations'=>$registrations,'registrations'=>$sentmails]);
    }

    public function registrations()
    {
        $registrations = registrations::all();

        return view('registrations', compact('registrations'));
    }

    public function event($event_id)
    {

        $directory = public_path('images-event/'.$event_id); // Assuming the images are in public/images/gallery
        $images = glob($directory . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE); // Get all images

        // Strip the base directory path for displaying in view
        $images = array_map(function ($image) {
            return str_replace(public_path(), 'public/', $image); // Remove 'public_path' part for display
        }, $images);

        $event = events::where('id',$event_id)->first();
        return view('event', compact('event','images'));
    }

    public function approveRegistration($reg_id)
    {
        registrations::where('id',$reg_id)->update(['approval'=>'Approved']);

        $message = "The event registration has been approved.";
        return redirect()->back()->with(['message'=>$message]);
    }

    public function deleteEvent($event_id)
    {
        events::find($event_id)->delete();

        $message = "The event has been deleted successfully.";
        return redirect()->back()->with(['message'=>$message]);
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

    public function help() {
        return view('help');
    }



}

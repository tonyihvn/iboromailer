<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sentmails;
use App\Models\contacts;
use Mail;

class EmailController extends Controller
{
    public function showForm()
    {
        $contacts = contacts::all();
        return view('email-form')->with(['contacts'=>$contacts]);
    }

    public function sendEmail(Request $request)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required',
            'url' => 'url',
            'top_image' => 'image|mimes:jpeg,png,jpg,gif|max:8048',
            'bottom_image' => 'image|mimes:jpeg,png,jpg,gif|max:8048'
        ]);
            $filename = "";
            $filename2 = "";

            if($request->hasFile('top_image')){

                // Upload images top and bottom
                // Get the uploaded file from the request
                $image = $request->file('top_image');

                // // COMPRESS IMAGE FOR GMAIL
                // $compressedImage = Image::make($image)->resize(800, null, function ($constraint) {
                //     $constraint->aspectRatio();
                // })->encode('jpg', 60); // 60% quality, adjust as needed

                // // Encode the compressed image to base64
                // $base64Image = base64_encode($compressedImage->__toString());


                // Generate a unique filename for the uploaded image (you can use your own logic here)
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                // Move the uploaded image to the public/images directory
                $image->move(public_path('images'), $filename);
            }

            if($request->hasFile('bottom_image')){

                // Upload bottom image
                // Get the uploaded file from the request
                $image2 = $request->file('bottom_image');
                // Generate a unique filename for the uploaded image (you can use your own logic here)
                $filename2 = uniqid() . '.' . $image2->getClientOriginalExtension();
                // Move the uploaded image to the public/images directory
                $image2->move(public_path('images'), $filename2);
            }

        // Send the email to multiple recipients
        $recipients = explode(',', $request->recipients);

        if($request->group!=""){
            $groupRecipients = contacts::select('email')->get();
            $grecipients = "";
            foreach($groupRecipients as $recips){
                $grecipients.=$recips.",";
            }
            $grec = explode($grecipients);

            $recipients = array_merge($recipients,$gec);
        }

        foreach ($recipients as $recipient) {
            Mail::send('emails.email-template', [
                'title' => $request->title,
                'content' => $request->email_content,
                'url' => $request->url,
                'top_image' => $filename,
                'bottom_image' => $filename2,
                'linkText' => $request->linkText
            ], function ($message) use ($recipient, $request, $filename, $filename2) {
                $message->from('admin@ibotoempire.com', 'Jacob Oroks');
                $message->to(trim($recipient));
                $message->subject($request->title);



                // Attach top image
                // $message->attach($request->file('top_image')->getRealPath(), [
                //     'as' => 'top_image.jpg',
                //     'mime' => 'image/jpeg',
                // ]);
                if($request->hasFile('top_image')){
                    // Attach top image
                    $message->attach(public_path('images/'.$filename), [
                        'as' => 'top_image.jpg',
                        'mime' => 'image/jpeg',
                    ]);
                }
                if($request->hasFile('bottom_image')){
                    // Attach bottom image
                    $message->attach(public_path('images/'.$filename2), [
                        'as' => 'bottom_image.jpg',
                        'mime' => 'image/jpeg',
                    ]);
                }
            });
        }

        sentmails::create([
            'recipients'=>$request->recipients,
            'group'=>$request->group,
            'category'=>$request->mail_category,
            'title'=>$request->title,
            'mail_body'=>$request->email_content,
            'top_image'=>$filename,
            'bottom_image'=>$filename2,
            'link'=>$request->url,
            'status'=>'Sent'
        ]);

        return redirect()->back()->with('message', 'Email sent successfully!');
    }
}

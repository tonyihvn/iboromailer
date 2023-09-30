<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contacts;

class ContactsController extends Controller
{
    public function index()
    {

        $contacts = contacts::all();
        return view('contacts')->with(['contacts'=>$contacts]);
    }

    public function create()
    {
        $groups = contacts::select('group')->distinct()->get();
        return view('contact-form')->with(['groups'=>$groups]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'group' => 'required|string|max:255',
            'info' => 'nullable|string',
        ]);

        contacts::create($validatedData);

        return redirect()->route('contacts')->with('message', 'Contact saved successfully!');
    }
}

<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    public function Contact()
    {
        return view('frontend.contact');
    }

    public function StoreContact(Request $request)
    {

         Contact::insert([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
                'number' => $request->number,
                'subject' => $request->subject,
                'budget' => $request->budget,
                'created_at' => Carbon::now()
          ]);

          $notification = array(
          'message'=> 'Contact Details Saved Successfully! Will be in Touch.',
          'alert-type'=> 'success'
          );

        return redirect()->back()->with($notification);
    }
}

<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;
use Illuminate\Support\Carbon;

class FooterController extends Controller
{
    public function Footer()
    {
       $footer = Footer::all();
       return view('admin.footer.footer',compact('footer'));
    }

    public function EditFooter()
    {
        $footer = Footer::find(1);
        return view('admin.footer.footer_edit',compact('footer'));
    }

    public function UpdateFooter(Request $request)
    {
       $footer_id = $request->id;
       Footer::findOrFail($footer_id)->update([
                'number' => $request->number,
                'short_description' => $request->short_description,
                'address' => $request->address,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'copyright' => $request->copyright,
          ]);

          $notification = array(
          'message'=> 'Footer Updated Successfully!',
          'alert-type'=> 'success'
          );

        return redirect()->route('footer')->with($notification);
    }
}

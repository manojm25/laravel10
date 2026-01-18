<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EducationDetails;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Carbon;

class EducationDetailsController extends Controller
{
    public function EducationDetails()
    {
        $educationdetails = EducationDetails::latest()->get();
        return view('admin.educationdetails.educationdetails_all',compact('educationdetails'));
    }

    public function StoreEducationDetails(Request $request)
    {

    $request->validate([
            'job_title'=> 'required',
            'company_name'=> 'required',
            'service_period'=> 'required',
            'description'=> 'required',
            'company_logo'=> 'required',
         ],[
            'job_title.required' => 'Course Name is Required',
            'company_name.required' => 'Institution Name is Required',
            'service_period.required' => 'Period is Required',
            'description.required' => 'Description is Required',
            'company_logo.required' => 'Institution Logo is Required',
         ]);


          $image = $request->file('company_logo');
          $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
          $manager = new ImageManager(new Driver());
          $img = $manager->read($image);
          $img->resize(220, 200);
          $img->save(public_path('upload/company_logo/'.$name_gen));
          $save_url = 'upload/company_logo/'.$name_gen;


         EducationDetails::insert([
                'job_title' => $request->job_title,
                'company_name' => $request->company_name,
                'service_period' => $request->service_period,
                'description' => $request->description,
                'company_logo' => $save_url,
                'created_at' => Carbon::now()
          ]);

          $notification = array(
          'message'=> 'Education Details Data Inserted Successfully!',
          'alert-type'=> 'success'
        );

        return redirect()->route('education.details')->with($notification);
    }

    public function EditEducationDetails($id)
    {
        $educationdetails = EducationDetails::findOrFail($id);
        return view('admin.educationdetails.educationdetails_edit',compact('educationdetails'));
    }

    public function UpdateEducationDetails(Request $request)
    {

    $request->validate([
            'job_title'=> 'required',
            'company_name'=> 'required',
            'service_period'=> 'required',
            'description'=> 'required',
            
         ],[
            'job_title.required' => 'Course Name is Required',
            'company_name.required' => 'Institution Name is Required',
            'service_period.required' => 'Period is Required',
            'description.required' => 'Description is Required',
         ]);

     $workhistory = EducationDetails::findOrFail($request->id);
    $data = [
        'job_title' => $request->job_title,
                'company_name' => $request->company_name,
                'service_period' => $request->service_period,
                'description' => $request->description,
                'updated_at' => Carbon::now()
    ];

    $manager = new ImageManager(new Driver());

    // Main Portfolio Image
    if ($request->hasFile('company_logo')) {
        $image = $request->file('company_logo');
        $name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $manager->read($image)
             ->resize(220, 200)
            ->save(public_path('upload/company_logo/'.$name));
        $data['company_logo'] = 'upload/company_logo/'.$name;
    }

    $workhistory->update($data);

    return redirect()->route('education.details')->with([
        'message' => 'Education Details Updated Successfully!',
        'alert-type' => 'success'
    ]);
    }

    public function DeleteEducationDetails($id)
    {
      $workhistory = EducationDetails::findOrFail($id);
      $img = $workhistory->company_logo;
        unlink($img);
          EducationDetails::findOrFail($id)->delete();
      $notification = array(
          'message'=> 'Education Details Deleted Successfully!',
          'alert-type'=> 'success'
        );
      return redirect()->route('education.details')->with($notification);
    }

    public function AddEducationDetails()
    {
        return view('admin.educationdetails.educationdetails_add');
    }
}

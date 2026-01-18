<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkHistory;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Carbon;

class WorkHistoryController extends Controller
{
    public function WorkHistory()
    {
        $workhistory = WorkHistory::latest()->get();
        return view('admin.work_history.work_history_all',compact('workhistory'));
    }

    public function StoreWorkHistory(Request $request)
    {

    $request->validate([
            'job_title'=> 'required',
            'company_name'=> 'required',
            'service_period'=> 'required',
            'description'=> 'required',
            'company_logo'=> 'required',
         ],[
         ]);


          $image = $request->file('company_logo');
          $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
          $manager = new ImageManager(new Driver());
          $img = $manager->read($image);
          $img->resize(220, 200);
          $img->save(public_path('upload/company_logo/'.$name_gen));
          $save_url = 'upload/company_logo/'.$name_gen;


         WorkHistory::insert([
                'job_title' => $request->job_title,
                'company_name' => $request->company_name,
                'service_period' => $request->service_period,
                'description' => $request->description,
                'company_logo' => $save_url,
                'created_at' => Carbon::now()
          ]);

          $notification = array(
          'message'=> 'Work History Data Inserted Successfully!',
          'alert-type'=> 'success'
        );

        return redirect()->route('all.work.history')->with($notification);
    }

    public function EditWorkHistory($id)
    {
        $workhistory = WorkHistory::findOrFail($id);
        return view('admin.work_history.work_history_edit',compact('workhistory'));
    }

    public function UpdateWorkHistory(Request $request)
    {
     $workhistory = WorkHistory::findOrFail($request->id);
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

    return redirect()->route('all.work.history')->with([
        'message' => 'Work History Updated Successfully!',
        'alert-type' => 'success'
    ]);
    }

    public function DeleteWorkHistory($id)
    {
      $workhistory = WorkHistory::findOrFail($id);
      $img = $workhistory->company_logo;
        unlink($img);
          WorkHistory::findOrFail($id)->delete();
      $notification = array(
          'message'=> 'Work History Deleted Successfully!',
          'alert-type'=> 'success'
        );
      return redirect()->route('all.work.history')->with($notification);
    }

    public function AddWorkHistory()
    {
        return view('admin.work_history.work_history_add');
    }
}

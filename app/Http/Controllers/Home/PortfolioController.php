<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Carbon;

class PortfolioController extends Controller
{
    public function AllPortfolio()
    {
        $portfolio = Portfolio::latest()->get();
        return view('admin.portfolio.portfolio_all',compact('portfolio'));
    }

    public function AddPortfolio()
    {
        return view('admin.portfolio.portfolio_add');
    }

    public function StorePortfolio(Request $request)
    {
         $request->validate([
            'portfolio_name'=> 'required',
            'portfolio_title'=> 'required',
            'portfolio_image'=> 'required',
            'location'=> 'required',
            'category'=> 'required',
            'client_ethnicity'=> 'required',
            'portfolio_link'=>'required',
            'portfolio_support_image_one'=>'required',
            'portfolio_support_image_two'=>'required',
         ],[
            'portfolio_name.required' => 'Portfolio Name is Required',
            'portfolio_title.required' => 'Portfolio Title is Required',
            'portfolio_image.required' => 'Portfolio Image is Required',
            'location.required' => 'Portfolio Location is Required',
            'category.required' => 'Portfolio Category is Required',
            'client_ethnicity.required' => 'Portfolio Client Ethinicity is Required',
            'portfolio_link.required' => 'Portfolio Link is Required',
         ]);

          $image = $request->file('portfolio_image');
          $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        //   Image::make($image)->resize(636,852)->save('upload/home_slide/'.$name_gen);
          $manager = new ImageManager(new Driver());
          $img = $manager->read($image);
          $img->resize(1020, 519);
          $img->save(public_path('upload/portfolio/'.$name_gen));
          $save_url = 'upload/portfolio/'.$name_gen;

          //for uploading support images -1 
          $image = $request->file('portfolio_support_image_one');
          $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
          $manager1 = new ImageManager(new Driver());
          $img = $manager1->read($image);
          $img->resize(414, 348);
          $img->save(public_path('upload/supportimages/'.$name_gen));
          $save_url1 = 'upload/supportimages/'.$name_gen;

          //for uploading support images -2 
          $image = $request->file('portfolio_support_image_two');
          $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
          $manager2 = new ImageManager(new Driver());
          $img = $manager2->read($image);
          $img->resize(414, 348);
          $img->save(public_path('upload/supportimages/'.$name_gen));
          $save_url2 = 'upload/supportimages/'.$name_gen;


          Portfolio::insert([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_image' => $save_url,
                'portfolio_description' => $request->portfolio_description,
                'created_at' => Carbon::now(),
                'location' => $request->location,
                'category' => $request->category,
                'client_ethnicity' => $request->client_ethnicity,
                'portfolio_support_image_one' => $save_url1,
                'portfolio_support_image_two' => $save_url2,

          ]);

          $notification = array(
          'message'=> 'Portfolio Data Inserted Successfully!',
          'alert-type'=> 'success'
        );

        return redirect()->route('all.portfolio')->with($notification);
    }

    public function EditPortfolio($id)
    {
       $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.portfolio_edit',compact('portfolio'));
    }

    public function UpdatePortfolio(Request $request)
{
    $portfolio = Portfolio::findOrFail($request->id);
    $data = [
        'portfolio_name' => $request->portfolio_name,
        'portfolio_title' => $request->portfolio_title,
        'portfolio_description' => $request->portfolio_description,
        'location' => $request->location,
        'category' => $request->category,
        'client_ethnicity' => $request->client_ethnicity,
        'portfolio_link' => $request->portfolio_link,
        'updated_at' => Carbon::now(),
    ];

    $manager = new ImageManager(new Driver());

    // Main Portfolio Image
    if ($request->hasFile('portfolio_image')) {
        $image = $request->file('portfolio_image');
        $name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $manager->read($image)
            ->resize(1020, 519)
            ->save(public_path('upload/portfolio/'.$name));
        $data['portfolio_image'] = 'upload/portfolio/'.$name;
    }

    // Support Image One
    if ($request->hasFile('portfolio_support_image_one')) {
        $image = $request->file('portfolio_support_image_one');
        $name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $manager->read($image)
            ->resize(414, 348)
            ->save(public_path('upload/supportimages/'.$name));
        $data['portfolio_support_image_one'] = 'upload/supportimages/'.$name;
    }

    // Support Image Two
    if ($request->hasFile('portfolio_support_image_two')) {
        $image = $request->file('portfolio_support_image_two');
        $name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $manager->read($image)
            ->resize(414, 348)
            ->save(public_path('upload/supportimages/'.$name));
        $data['portfolio_support_image_two'] = 'upload/supportimages/'.$name;
    }

    $portfolio->update($data);

    return redirect()->route('all.portfolio')->with([
        'message' => 'Portfolio Updated Successfully!',
        'alert-type' => 'success'
    ]);
}


    public function DeletePortfolio($id)
    {

      $portfolio = Portfolio::findOrFail($id);
      $img = $portfolio->portfolio_image;
      $img1 = $portfolio->portfolio_support_image_one;
      $img2 = $portfolio->portfolio_support_image_two;
      unlink($img);
      unlink($img1);
      unlink($img2);
      Portfolio::findOrFail($id)->delete();
      $notification = array(
          'message'=> 'Portfolio Deleted Successfully!',
          'alert-type'=> 'success'
        );
      return redirect()->route('all.portfolio')->with($notification);
    }

    public function PortfolioDetails($id)
    {
       $portfolio = Portfolio::findOrFail($id);
        return view('frontend.portfolio_details',compact('portfolio'));
    }

    public function HomePortfolio()
    {
        $portfolioget = Portfolio::latest()->paginate(1);
        return view('frontend.portfolio',compact('portfolioget'));
    }
}

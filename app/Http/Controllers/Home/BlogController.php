<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
    public function AllBlog()
    {
        $blog = Blog::latest()->get();
        return view('admin.blog.blog_all',compact('blog'));
    }

    public function AddBlog()
    {
         return view('admin.blog.blog_add');
    }

    public function StoreBlog(Request $request)
    {
           $request->validate([
            'blog_category_id'=> 'required',
            'blog_title'=> 'required',
            'blog_tags'=> 'required',
            'blog_description'=> 'required',
            'blog_short_description'=> 'required',
            'blog_image'=> 'required',
         ],[
         ]);

          $image = $request->file('blog_image');
          $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        //   Image::make($image)->resize(636,852)->save('upload/home_slide/'.$name_gen);
          $manager = new ImageManager(new Driver());
          $img = $manager->read($image);
          $img->resize(430, 327);
          $img->save(public_path('upload/blogs/'.$name_gen));
          $save_url = 'upload/blogs/'.$name_gen;

          Blog::insert([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_short_description' => $request->blog_short_description,
                'blog_image' => $save_url,
                'created_at' => Carbon::now()
          ]);

          $notification = array(
          'message'=> 'Blog Data Inserted Successfully!',
          'alert-type'=> 'success'
        );

        return redirect()->route('all.blog')->with($notification);
    }

    public function EditBlog($id)
    {
       $blog = Blog::findOrFail($id);
        return view('admin.blog.blog_edit',compact('blog'));
    }

    public function UpdateBlog(Request $request)
    {
        $blog_id = $request->id;
       if($request->file('blog_image'))
       {
          $image = $request->file('blog_image');
          $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
          $manager = new ImageManager(new Driver());
          $img = $manager->read($image);
          $img->resize(430, 327);
          $img->save(public_path('upload/blogs/'.$name_gen));
          $save_url = 'upload/blogs/'.$name_gen;
          Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_short_description' => $request->blog_short_description,
                'blog_image' => $save_url,
                'updated_at' => Carbon::now()
          ]);
          $notification = array(
          'message'=> 'Blog Updated Successfully!',
          'alert-type'=> 'success'
        );

        return redirect()->route('all.blog')->with($notification);
   }else{
    Blog::findOrFail($blog_id)->update([
                 'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_short_description' => $request->blog_short_description,
                'updated_at' => Carbon::now()
          ]);

          $notification = array(
         'message'=> 'Blog Updated Successfully!',
          'alert-type'=> 'success'
        );

        return redirect()->route('all.blog')->with($notification);
   }
    }

    public function DeleteBlog($id)
    {
       $blog = Blog::findOrFail($id);
      $img = $blog->blog_image;
      unlink($img);

      Blog::findOrFail($id)->delete();

      $notification = array(
          'message'=> 'Blog Deleted Successfully!',
          'alert-type'=> 'success'
        );
      return redirect()->route('all.blog')->with($notification);
    }

    public function BlogDetails($id)
    {
        $allblogs = Blog::latest()->limit(5)->get();
        $blogcategories = BlogCategory::orderBy('blog_category','ASC')->get();
        $blogs = Blog::findOrFail($id);
        return view('frontend.blog_details',compact('blogs','allblogs','blogcategories'));
    }

    public function CategoryPost($id)
    {
        $allblogs = Blog::latest()->limit(5)->get();
        $blogcategories = BlogCategory::orderBy('blog_category','ASC')->get();
        $blogpost = Blog::where('blog_category_id',$id)->orderBy('id','DESC')->get();
        $selectedcategory = BlogCategory::findOrFail($id);
        if($blogpost->isNotEmpty())
        {
        return view('frontend.cat_blog_details',compact('blogpost','allblogs','blogcategories','selectedcategory'));
        }else{
        return redirect()->back()->with('error', 'No blogs found in this category');
        }
    }

    public function HomeBlog()
    {
      $allblogs = Blog::latest()->paginate(3);
      $blogcategories = BlogCategory::orderBy('blog_category','ASC')->get();
      return view('frontend.home_blog_details',compact('allblogs','blogcategories'));
    }
}


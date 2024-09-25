<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        return view ('blog.index')->with('posts', Post::get());
    }


    public function create()
    {

        return view ('blog.create');

    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $slug= Str::slug($request->title,'-');

        $newImgName=uniqid().'-'. $slug.'.'. $request->image->extension();
        $request->image->move(public_path('images'),$newImgName);


        Post::create([

            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'slug'=>$slug,
            'image_path'=>$newImgName,
            'user_id'=>auth()->user()->id
        ]);

        return redirect('/blog')->with('message','Done Create');
    }



    public function show($slug)
    {
        return view('blog.show')
        ->with('post', Post::where('slug', $slug)->first());
    }




    public function edit($slug)
    {
        return view ('blog.edit')
        ->with('post', Post::where('slug', $slug)->first());
    }


    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            // 'image' => 'required|mines:JPG,png|max:5048',
        ]);

        $slug= Str::slug($request->title,'-');

        $newImgName=uniqid().'-'. $slug.'.'. $request->image->extension();
        $request->image->move(public_path('images'),$newImgName);



        Post::where('slug', $slug)->update([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'slug'=>$slug,
            'image_path'=>$newImgName,
            'user_id'=>auth()->user()->id
        ]);

        return redirect('/blog/'.$slug)->with('message','Done Edit');

    }



    public function destroy( $slug){
        Post::where('slug', $slug)->delete();
        return redirect('/blog')->with('message','Done deleted');
    }



    public function store_in (Request $request){

    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);


    Post::create($validatedData);

    return redirect()->route('posts.index')->with('success', 'Post created successfully');
}


}

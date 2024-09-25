<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;

class PostDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('post.index')->with('posts', Post::get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('post.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            // 'image' => 'required|mines:JPG,png|max:5048',
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

        return redirect('/post');
    }

    /**
     * Display the specified resource.
     */

        public function show($slug)
        {
            return view('post.show')
            ->with('post', Post::where('slug', $slug)->first());
        }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        return view ('post.edit')
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

        return redirect('/post/'.$slug);

    }

    public function destroy( $slug){
        Post::where('slug', $slug)->delete();
        return redirect('/post');
    }

}

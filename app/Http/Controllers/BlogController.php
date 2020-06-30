<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\Blog as BlogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.blog.index', [
            'title' => 'Blog',
            'data_blog' => Blog::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.blog.create', [
            'title' => 'CreateBlog',
            'tag' => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $grt = $request['thumbnail'];
        $grt = $request->file('thumbnail')->store('assets/post/thumbnail', 'public');
        $grim = $request['image_post'];
        $grim = $request->file('image_post')->store('assets/post/images', 'public');
        $blog = Blog::create([
            'title' => $request['title'],
            'post' => $request['post'],
            'thumbnail' => $grt,
            'image_post' => $grim
        ]);
        $blog->tag()->attach($request->tag);
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}

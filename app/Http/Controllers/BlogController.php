<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\Blog as BlogRequest;
use Illuminate\Support\Str;

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
            'data_blog' => Blog::all()->sortByDesc('id'),
            'tag' => Tag::all()
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
        $gus = Str::of($request['title'])->slug('-');
        $cus = Blog::where('slug', $gus)->first();
        if ($cus !== null) {
            $gus .= '-'.rand(1, 101);
        }
        $grt = $request['thumbnail'];
        $grt = $request->file('thumbnail')->store('assets/post/thumbnail', 'public');
        $grim = $request['image_post'];
        $grim = $request->file('image_post')->store('assets/post/images', 'public');
        $blog = Blog::create([
            'title' => $request['title'],
            'post' => $request['post'],
            'thumbnail' => $grt,
            'image_post' => $grim,
            'slug' => $gus,
            'view' => 1
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
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.pages.blog.edit', [
            'title' => 'UpdateBlog',
            'data' => $blog,
            'tag' => Tag::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        $gus = Str::of($request['title'])->slug('-');
        $cus = Blog::where('slug', $gus)->first();
        $grt = $request['thumbnail'];
        $grim = $request['image_post'];
        if ($cus !== null) {
            if ($cus->slug === $blog->slug) {
                if ($grt) {
                    Storage::delete('public/'. $blog->thumbnail);
                    $grt = $request->file('thumbnail')->store('assets/post/thumbnail', 'public');
                    $blog->update([
                        'title' => $request['title'],
                        'post' => $request['post'],
                        'thumbnail' => $grt
                    ]);
                } elseif($grim) {
                    Storage::delete('public/'. $blog->image_post);
                    $grim = $request->file('image_post')->store('assets/post/images', 'public');
                    $blog->update([
                        'title' => $request['title'],
                        'post' => $request['post'],
                        'image_post' => $grim
                    ]);
                } elseif($grt && $grim) {
                    Storage::delete('public/'. $blog->thumbnail);
                    Storage::delete('public/'. $blog->image_post);
                    $blog->update([
                        'title' => $request['title'],
                        'post' => $request['post'],
                        'thumbnail' => $grt,
                        'image_post' => $grim
                    ]);
                } else {
                    $blog->update([
                        'title' => $request['title'],
                        'post' => $request['post']
                    ]);
                }
            } else {
                if ($cus->slug !== $blog->slug) {
                    $gus .= '-'.rand(1, 101);
                    if ($grt) {
                        Storage::delete('public/'. $blog->thumbnail);
                        $grt = $request->file('thumbnail')->store('assets/post/thumbnail', 'public');
                        $blog->update([
                            'title' => $request['title'],
                            'post' => $request['post'],
                            'thumbnail' => $grt,
                            'slug' => $gus
                        ]);
                    } elseif($grim) {
                        Storage::delete('public/'. $blog->image_post);
                        $grim = $request->file('image_post')->store('assets/post/images', 'public');
                        $blog->update([
                            'title' => $request['title'],
                            'post' => $request['post'],
                            'image_post' => $grim,
                            'slug' => $gus
                        ]);
                    } elseif($grt && $grim) {
                        Storage::delete('public/'. $blog->thumbnail);
                        Storage::delete('public/'. $blog->image_post);
                        $blog->update([
                            'title' => $request['title'],
                            'post' => $request['post'],
                            'thumbnail' => $grt,
                            'image_post' => $grim,
                            'slug' => $gus
                        ]);
                    } else {
                        $blog->update([
                            'title' => $request['title'],
                            'post' => $request['post'],
                            'slug' => $gus
                        ]);
                    }
                }
            }
        } else {
            if ($grt) {
                Storage::delete('public/'. $blog->thumbnail);
                $grt = $request->file('thumbnail')->store('assets/post/thumbnail', 'public');
                $blog->update([
                    'title' => $request['title'],
                    'post' => $request['post'],
                    'thumbnail' => $grt,
                    'slug' => $gus
                ]);
            } elseif($grim) {
                Storage::delete('public/'. $blog->image_post);
                $grim = $request->file('image_post')->store('assets/post/images', 'public');
                $blog->update([
                    'title' => $request['title'],
                    'post' => $request['post'],
                    'image_post' => $grim,
                    'slug' => $gus
                ]);
            } elseif($grt && $grim) {
                Storage::delete('public/'. $blog->thumbnail);
                Storage::delete('public/'. $blog->image_post);
                $blog->update([
                    'title' => $request['title'],
                    'post' => $request['post'],
                    'thumbnail' => $grt,
                    'image_post' => $grim,
                    'slug' => $gus
                ]);
            } else {
                $blog->update([
                    'title' => $request['title'],
                    'post' => $request['post'],
                    'slug' => $gus
                ]);
            }
        }
        $blog->tag()->sync($request->tag);
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        return abort(404);
    }
}

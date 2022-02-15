<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
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
        $companies = Blog::all();

        return response()->json([
            'success' => true,
            'data' => $companies
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
            'image' => 'nullable|image||mimes:jpg,jpeg,png,gif,bmp|max:5000',
            'tags' => 'nullable'
        ]);

        $blog = Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'tags' => $request->tags,
            'image' => $request->image->store('uploads/news', 'public_resources'),
            'user_id' => auth()->id(),
        ]);

        $blog->update([
            'slug' => Str::slug($request->title).$blog->id
        ]);

        return response()->json([
            'success' => true,
            'data' => $blog
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return response()->json([
            'success' => true,
            'data' => $blog
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
            'image' => 'nullable|image||mimes:jpg,jpeg,png,gif,bmp|max:5000',
            'tags' => 'nullable'
        ]);

        $blog = Blog::where('slug', $slug)->firstOrFail();

        $blog->update([
            'title' => $request->title,
            'description' => $request->description,
            'tags' => $request->tags,
            'slug' => Str::slug($request->title).$blog->id
        ]);

        if ($request->hasFile('image')) {
            $blog->update([
                'image' => $request->image->store('uploads/news', 'public_resources'),
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $blog->delete();
        return response()->json([
            'success' => true,
            'message' => 'Article deleted'
        ], 200);
    }
}

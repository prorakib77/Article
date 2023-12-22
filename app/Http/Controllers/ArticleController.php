<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Traits\ImageSaveTrait;

class ArticleController extends Controller
{
    use ImageSaveTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("backend.article.index",[
            'articles' => Article::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.article.create',[
            'categories' => Category::all(),
            'tags'=> Tag::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'category_id' =>'required',
            'title' =>'required',
            'tags' =>'required',
            'description' =>'required',
            'image' =>'nullable',
        ]);

        if ($request->hasFile('image')) {
            $image_path = $this->saveImage('image', $request->image, 1200, 720);
        }

    $article = Article::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image_path ?? null,
        ]);
        $article->tags()->attach($request['tags']);


        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('backend.article.show',[
            'article' => $article,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('backend.article.edit',[
            'article' => $article,
            'categories' => Category::all(),
            'tags'=> Tag::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'category_id' =>'required',
            'title' =>'required',
            'tags' =>'required',
            'description' =>'required',
            'image' =>'nullable',
        ]);
        if ($request->hasFile('image')) {
            $image_path = $this->updateImage($article->image,'image', $request->image, 1200, 720);
        }
        $article->update(['image' => $image_path ?? null]+$request->all());
        $article->tags()->sync($request['tags']);

        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $this->deleteImage($article->image);
        $article->tags()->detach();
        $article->delete();
        return redirect()->route('article.index');
    }
}

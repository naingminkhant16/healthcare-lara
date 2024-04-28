<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Psy\CodeCleaner\ReturnTypePass;

class AdminArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::when(request('search'), function ($query, $search) {
            $query->where('title', 'like', "%$search%")
                ->orWhere('content', 'like', "%$search%");
        })->latest()->paginate(10);

        return view('Admin.Article.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formData =  $request->validate([
            'title' => 'required|min:5|max:200',
            'content' => 'required|min:10|max:3000',
            'image' => 'required|image|file|max:255'
        ]);

        //save image
        if ($request->image) {
            //generate unique image name
            $imageName = uniqid() . "_article_photo_" . $request->image->extension();
            //save to storage
            $request->image->storeAs('public', $imageName);
            //save to database
            $formData['image'] = $imageName;
        }

        Article::create([
            'title' => $formData['title'],
            'content' => $formData['content'],
            'user_id' => auth()->id(),
            'publish_date' => date('Y-m-d'),
            'image' => $formData['image']
        ]);

        return redirect()->route('articles.index')->with('message', "New Article is successfully created.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('Admin.Article.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('Admin.Article.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $formData =  $request->validate([
            'title' => 'required|min:5|max:200',
            'content' => 'required|min:10|max:3000',
            'image' => '|image|file|max:255|nullable'
        ]);

        //save image
        if ($request->image) {
            //delete old image
            Storage::delete('public/' . $article->image);

            //generate unique image name
            $imageName = uniqid() . "_article_photo_" . $request->image->extension();
            //save to storage
            $request->image->storeAs('public', $imageName);
            //save to database
            $article->image = $imageName;
        }

        $article->title = $formData['title'];
        $article->content = $formData['content'];
        $article->update();

        return redirect()->route('articles.index')->with('message', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if ($article->image) {
            //delete photo
            Storage::delete('public/' . $article->image);
        }

        $article->delete();

        return redirect()->route('articles.index')->with('message', 'Successfully deleted.');
    }
}

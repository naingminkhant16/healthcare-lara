<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Event;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $events = Event::latest()->limit(2)->get();
        $articles = Article::latest()->limit(3)->get();

        return view('Public.home', [
            'events' => $events,
            'articles' => $articles
        ]);
    }

    public function eventShow(Event $event)
    {
        return view('Public.event-details', ['event' => $event]);
    }

    public function events()
    {
        return view('Public.events', ['events' => Event::latest()->paginate(4)]);
    }

    public function aboutUs()
    {
        return view('Public.about-us');
    }

    public function articleShow(Article $article)
    {
        return view('Public.article-details', ['article' => $article]);
    }

    public function articles()
    {
        return view('Public.articles', ['articles' => Article::latest()->paginate(6)]);
    }

    public function contactUs()
    {
        return view('Public.contact-us');
    }

    public function enrolledEvents()
    {
        $events = auth()->user()->enrolledEvents;
        return view('Public.enrolled-events', ['events' => $events]);
    }

    public function search()
    {
        $search = request('search');
        $events = Event::when($search, function ($query, $search) {
            $query->where('title', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->orWhere('location', 'like', "%$search%");
        })->get();

        $articles = Article::when($search, function ($query, $search) {
            $query->where('title', 'like', "%$search%")
                ->orWhere('content', 'like', "%$search%");
        })->get();

        return view('Public.search', [
            'events' => $events,
            'articles' => $articles
        ]);
    }
}

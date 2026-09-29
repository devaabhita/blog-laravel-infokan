<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('posts')->orderByDesc('posts_count')->take(6)->get();
        $posts = Post::published()->feed('terbaru')->with('categories')->paginate(6, ['*'], 'page', 1);

        return view('home.index', [
            'categories' => $categories,
            'posts' => $posts,
            'hasMore' => $posts->hasMorePages(),
        ]);
    }
}

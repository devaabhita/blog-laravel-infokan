<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q'));

        $posts = Post::published()->with('categories')
            ->when($q !== '', fn ($query) => $query->where(function ($w) use ($q) {
                $w->whereFullText(['title', 'excerpt'], $q)
                  ->orWhere('title', 'like', "%{$q}%");
            }))
            ->latest('published_at')
            ->paginate(9)
            ->withQueryString();

        return view('posts.index', compact('posts', 'q'));
    }

    public function show(Post $post)
    {
        abort_unless($post->is_published && $post->published_at?->isPast(), 404);

        $post->increment('views');
        $post->load('categories', 'user');

        $related = Post::published()->where('id', '!=', $post->id)
            ->whereHas('categories', fn ($q) => $q->whereIn('categories.id', $post->categories->pluck('id')))
            ->with('categories')->latest('published_at')->take(3)->get();

        return view('posts.show', compact('post', 'related'));
    }

    // Endpoint untuk tab Terbaru/Popular dan "Muat Lebih Banyak"
    public function feed(Request $request)
    {
        $tab = $request->query('tab') === 'popular' ? 'popular' : 'terbaru';

        $posts = Post::published()->feed($tab)->with('categories')
            ->paginate(6, ['*'], 'page', max(1, (int) $request->query('page', 1)));

        $html = $posts->map(fn ($post) => Blade::render('<x-post-card :post="$post" />', ['post' => $post]))->implode('');

        return response()->json(['html' => $html, 'has_more' => $posts->hasMorePages()]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        $posts = [
            [
                'title' => 'Apa Itu REST API?', 'slug' => 'apa-itu-rest-api',
                'excerpt' => 'Penjelasan sederhana REST API', 'thumbnail' => '⚙️',
                'read_time' => 5, 'views' => 10, 'cats' => ['backend'],
                'content' => "REST API adalah cara dua aplikasi saling bertukar data lewat HTTP.\n\nBayangkan restoran: kamu (client) memesan lewat pelayan (API), dapur (server) menyiapkan data.",
            ],
            [
                'title' => 'Kenapa Golang Cepat?', 'slug' => 'kenapa-golang-cepat',
                'excerpt' => 'Alasan performa Go tinggi', 'thumbnail' => '🐹',
                'read_time' => 6, 'views' => 25, 'cats' => ['golang', 'backend'],
                'content' => "Go dikompilasi langsung ke kode mesin dan punya goroutine yang ringan.\n\nInilah alasan Go populer untuk layanan backend berkinerja tinggi.",
            ],
        ];

        foreach ($posts as $i => $data) {
            $cats = $data['cats'];
            unset($data['cats']);

            $post = Post::updateOrCreate(['slug' => $data['slug']], $data + [
                'user_id' => $user->id,
                'level' => 'beginner',
                'is_published' => true,
                'published_at' => now()->subMinutes($i),
            ]);

            $post->categories()->sync(Category::whereIn('slug', $cats)->pluck('id'));
        }
    }
}

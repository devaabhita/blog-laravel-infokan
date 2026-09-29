<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    private function makePost(array $attrs = []): Post
    {
        return Post::create($attrs + [
            'user_id' => User::factory()->create()->id,
            'title' => 'Apa Itu REST API?',
            'slug' => 'apa-itu-rest-api',
            'excerpt' => 'Penjelasan sederhana REST API',
            'content' => 'Isi artikel',
            'level' => 'beginner',
            'read_time' => 5,
            'is_published' => true,
            'published_at' => now()->subMinute(),
        ]);
    }

    public function test_detail_artikel_menambah_views(): void
    {
        $this->withoutVite();
        $post = $this->makePost();

        $this->get('/blog/' . $post->slug)->assertOk()->assertSee('Apa Itu REST API?');
        $this->assertEquals(1, $post->fresh()->views);
    }

    public function test_pencarian_di_blog(): void
    {
        $this->withoutVite();
        $this->makePost();

        $this->get('/blog?q=REST')->assertOk()->assertSee('Apa Itu REST API?');
        $this->get('/blog?q=zzzz')->assertOk()->assertDontSee('Apa Itu REST API?');
    }

    public function test_feed_mengembalikan_json(): void
    {
        $this->makePost();

        $this->getJson('/posts/feed?tab=popular&page=1')
            ->assertOk()
            ->assertJsonStructure(['html', 'has_more']);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsletterTest extends TestCase
{
    use RefreshDatabase;

    public function test_subscribe_berhasil(): void
    {
        $this->post('/newsletter', ['email' => 'budi@example.com'])->assertRedirect();

        $this->assertDatabaseHas('subscribers', ['email' => 'budi@example.com']);
    }

    public function test_email_tidak_valid_ditolak(): void
    {
        $this->post('/newsletter', ['email' => 'bukan-email'])->assertSessionHasErrors('email');
    }
}

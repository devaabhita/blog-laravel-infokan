<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    public function test_beranda_tampil(): void
    {
        $this->withoutVite();

        $this->get('/')->assertOk()->assertSee('Belajar Tech dari Nol');
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['Golang', 'golang', '🐹', '#e0f2fe'],
            ['Backend', 'backend', '⚙️', '#ffedd5'],
            ['System Design', 'system-design', '🧩', '#ede9fe'],
            ['DevOps', 'devops', '🚀', '#dcfce7'],
            ['AI Tools', 'ai-tools', '🤖', '#fce7f3'],
        ];

        foreach ($items as [$name, $slug, $icon, $color]) {
            Category::updateOrCreate(['slug' => $slug], compact('name', 'icon', 'color'));
        }
    }
}

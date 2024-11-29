<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Technology',
                'slug' => 'technology',
                'icon' => 'fas fa-laptop-code'
            ],
            [
                'name' => 'Lifestyle',
                'slug' => 'lifestyle',
                'icon' => 'fas fa-heart'
            ],
            [
                'name' => 'Travel',
                'slug' => 'travel',
                'icon' => 'fas fa-plane'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
} 
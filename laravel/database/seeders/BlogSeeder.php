<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = collect([
            [
                'title' => 'blog 1 title',
                'description' => 'description of blog 1',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'blog 2 title',
                'description' => 'description of blog 2',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'blog 3 title',
                'description' => 'description of blog 3',
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],

        ]);

        $blogs->each(function($blog){
            Blog::insert($blog);
        });
    }
}

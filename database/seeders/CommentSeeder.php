<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {



      Comment::create([
        'post_id' => 1,
        'author' => 'lalala',
        'text' => 'kitten is very cute i looove it',
      ]);
    }
}

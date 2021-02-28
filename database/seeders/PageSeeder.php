<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::updateOrCreate([
            'title' => 'About',
            'slug' => 'about',
            'excerpt' => 'This is about page.',
            'body' => '<h1>This is about page</h1>',
            'meta_description' => 'about desc',
            'meta_keywords' => 'about, etc.',
            'status' => true
        ]);
    }
}

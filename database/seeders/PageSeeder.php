<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = 'About Us';
        Page::updateOrCreate([
            'page_title' => $title,
            'page_slug' => Str::slug($title),
            'page_short' => "hhh  yyyt",
            'page_long' => "hhgh",
            'meta_title' => 'about us know more about us',
            'meta_keywords' => 'about us, know more, get in touch',
            'meta_description' => 'This is a about page by letting you know about us',
            'is_active' => true
        ]);
    }
}

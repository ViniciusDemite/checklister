<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        Page::create(['title' => 'Welcome', 'content' => 'Welcome']);
        Page::create(['title' => 'Get Consultation', 'content' => 'Get Consultation']);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Page::count() > 0) {
            $this->command->info('既にレコードが存在するためPageSeederをスキップしました。');
            return;
        }

        Page::create([
            'title' => 'Profile',
            'slug' => 'profile',
            'content' => '<h2>This is profile</h2>',
            'is_published' => 1,
        ]);
    }
}

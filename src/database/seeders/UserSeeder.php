<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if ($this->skipBecauseOfEnvironment()) {
            return;
        }

        if ($this->skipBecauseRecordsExist()) {
            return;
        }

        $this->createTestUser();
    }

    private function skipBecauseOfEnvironment(): bool
    {
        if (!App::environment(['local', 'staging'])) {
            $this->command->info("本番環境の可能性があるためSeederの実行をスキップしました。");
            return true;
        }

        return false;
    }

    private function skipBecauseRecordsExist(): bool
    {
        if (User::count() > 0) {
            $this->command->info('既にレコードが存在するためUserSeederをスキップしました。');
            return true;
        }

        return false;
    }

    private function createTestUser(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}

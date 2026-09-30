<?php

namespace Database\Seeders;

use App\Models\Analysis;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'demo@litera.test'],
            [
                'name' => 'LITERA Demo User',
                'password' => Hash::make('LiteraDemo123!'),
                'email_verified_at' => now(),
            ],
        );
        $user->forceFill(['email_verified_at' => now()])->save();

        $user->analyses()->where('url', 'https://example.com/litera-demo-health-claim')->delete();

        foreach (Analysis::demoScenarios() as $url => $attributes) {
            $user->analyses()->updateOrCreate(['url' => $url], $attributes);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            PillarSeeder::class,
            BudgetItemSeeder::class,
            StakeholderSeeder::class,
            ImplementationPhaseSeeder::class,
            SettingSeeder::class,
        ]);
    }
}

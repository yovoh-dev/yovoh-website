<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            'site_name' => 'Young Voices of Hope - Marsabit',
            'contact_email' => 'info@yovohmarsabit.org',
            'contact_phone' => '+254 700 000 000',
            'address' => 'Marsabit County, Kenya',
            'mission_statement' => 'To strengthen educational resilience and promote holistic development through integrated interventions in mental well-being, menstrual health, WASH, climate action, and digital literacy.',
            'vision_statement' => 'An empowered, resilient, and digitally literate generation of learners in Marsabit County who thrive academically, socially, and environmentally.',
            'stat_schools' => '50',
            'stat_learners' => '15000',
            'stat_years' => '3',
        ];

        foreach ($defaults as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}

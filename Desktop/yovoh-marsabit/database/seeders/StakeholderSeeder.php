<?php

namespace Database\Seeders;

use App\Models\Stakeholder;
use Illuminate\Database\Seeder;

class StakeholderSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['icon' => 'landmark', 'name' => 'County Government of Marsabit', 'role' => 'Policy guidance, school access, co-funding and endorsement'],
            ['icon' => 'school', 'name' => 'Local Schools (Primary & Secondary)', 'role' => 'Program implementation sites, teacher and learner engagement'],
            ['icon' => 'users', 'name' => 'Parents & Community Leaders', 'role' => 'Advocacy, community mobilization, and oversight'],
            ['icon' => 'handshake', 'name' => 'NGOs & Development Partners', 'role' => 'Technical expertise, co-funding, WASH, digital literacy, mental health'],
            ['icon' => 'heart-pulse', 'name' => 'Health Institutions', 'role' => 'Menstrual health, psychosocial services, drug rehabilitation referrals'],
            ['icon' => 'sparkles', 'name' => 'Youth Networks & Clubs', 'role' => 'Peer-led initiatives, environmental stewardship, awareness campaigns'],
            ['icon' => 'building-2', 'name' => 'Private Sector', 'role' => 'ICT devices, sanitary products, CSR co-funding, technical expertise'],
        ];

        foreach ($items as $i => $data) {
            Stakeholder::updateOrCreate(
                ['name' => $data['name']],
                $data + ['sort_order' => $i]
            );
        }
    }
}

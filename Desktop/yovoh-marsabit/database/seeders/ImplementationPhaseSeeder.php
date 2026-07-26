<?php

namespace Database\Seeders;

use App\Models\ImplementationPhase;
use Illuminate\Database\Seeder;

class ImplementationPhaseSeeder extends Seeder
{
    public function run(): void
    {
        $phases = [
            [
                'phase' => 'Phase 1',
                'timeline' => '0 – 6 months',
                'focus' => 'Foundational Development',
                'items' => ['CBO registration & governance setup', 'Community & stakeholder mapping', 'Baseline assessments across all 6 pillars', 'Pilot intervention design'],
            ],
            [
                'phase' => 'Phase 2',
                'timeline' => '6 – 18 months',
                'focus' => 'Pilot Implementation',
                'items' => ['Pilot programs in 10–15 schools', 'Capacity building for teachers & volunteers', 'Monitoring, evaluation & learning cycles', 'Refined program models for scaling'],
            ],
            [
                'phase' => 'Phase 3',
                'timeline' => '18 – 36 months',
                'focus' => 'Scale & Consolidate',
                'items' => ['Full rollout to 50 schools', '15,000+ learners directly engaged', 'Sustainability & local ownership planning', 'Comprehensive MEL reporting'],
            ],
        ];

        foreach ($phases as $i => $data) {
            ImplementationPhase::updateOrCreate(
                ['phase' => $data['phase']],
                $data + ['sort_order' => $i]
            );
        }
    }
}

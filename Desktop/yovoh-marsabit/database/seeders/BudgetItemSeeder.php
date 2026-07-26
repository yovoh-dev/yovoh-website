<?php

namespace Database\Seeders;

use App\Models\BudgetItem;
use Illuminate\Database\Seeder;

class BudgetItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['area' => 'Mental Well-being', 'amount' => 600000, 'components' => 'Counseling, peer support, training'],
            ['area' => 'Menstrual Health & Hygiene', 'amount' => 900000, 'components' => 'Sanitary supplies, facility upgrades'],
            ['area' => 'Drug Abuse Education', 'amount' => 450000, 'components' => 'Workshops, materials, forums'],
            ['area' => 'WASH Improvements', 'amount' => 1500000, 'components' => 'Water tanks, boreholes, hygiene stations'],
            ['area' => 'Climate & Environmental Action', 'amount' => 750000, 'components' => 'Tree planting, campaigns, materials'],
            ['area' => 'Digital Literacy', 'amount' => 1200000, 'components' => 'ICT devices, teacher training, connectivity'],
            ['area' => 'MEL & Data Management', 'amount' => 500000, 'components' => 'Tools, surveys, software, reporting'],
            ['area' => 'Staff & Administration', 'amount' => 2000000, 'components' => 'Salaries, allowances, office costs'],
            ['area' => 'Monitoring Trips', 'amount' => 600000, 'components' => 'Travel, field monitoring'],
            ['area' => 'Contingency (10%)', 'amount' => 700000, 'components' => 'Risk buffer'],
        ];

        foreach ($items as $i => $data) {
            BudgetItem::updateOrCreate(
                ['area' => $data['area']],
                $data + ['sort_order' => $i]
            );
        }
    }
}

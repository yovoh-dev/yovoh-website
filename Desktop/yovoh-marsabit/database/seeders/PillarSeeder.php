<?php

namespace Database\Seeders;

use App\Models\Pillar;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PillarSeeder extends Seeder
{
    public function run(): void
    {
        $pillars = [
            [
                'title' => 'Mental Well-being',
                'icon' => 'brain',
                'color' => 'from-rose-500 to-orange-400',
                'short' => 'School-based psychosocial support, peer groups, counseling and mental health awareness.',
                'goal' => 'Strengthen learners\' psychological resilience, emotional stability and engagement through school-based psychosocial support programs, peer support systems, and mental health awareness initiatives.',
                'activities' => [
                    'Conduct baseline assessments to identify learners\' psychosocial needs',
                    'Train teachers, counselors and volunteers on psychosocial first aid',
                    'Establish school-based counseling sessions and peer support groups',
                    'Run workshops on stress management and coping strategies',
                    'Build referral pathways with health providers and NGOs',
                ],
                'outputs' => [
                    '50 schools with structured psychosocial support programs',
                    '100+ teachers & 50+ community volunteers trained',
                    'Monthly counseling & peer support sessions in every target school',
                    'Awareness materials reaching 15,000+ learners and 2,000+ parents',
                ],
            ],
            [
                'title' => 'Menstrual Health & Hygiene',
                'icon' => 'droplet',
                'color' => 'from-pink-500 to-fuchsia-400',
                'short' => 'Sanitary products, gender-sensitive sanitation, and menstrual hygiene education for girls.',
                'goal' => 'Reduce absenteeism among girls and promote dignity, health and gender equality in education.',
                'activities' => [
                    'Provide reusable and disposable sanitary products to girls in need',
                    'Construct or upgrade gender-sensitive, private sanitation facilities',
                    'Deliver menstrual hygiene education to girls, boys, teachers & parents',
                    'Establish peer mentorship structures for adolescent girls',
                    'Advocate with local authorities for sustained MHM supply',
                ],
                'outputs' => [
                    '50 schools equipped with improved sanitation facilities',
                    '7,500+ girls provided with sanitary products',
                    'Menstrual hygiene education delivered county-wide',
                    'Peer mentorship structures in every school',
                ],
            ],
            [
                'title' => 'Drug Abuse Prevention',
                'icon' => 'shield',
                'color' => 'from-amber-500 to-yellow-400',
                'short' => 'Life-skills training, awareness programs, mentorship and referral pathways for at-risk youth.',
                'goal' => 'Reduce youth vulnerability to substance abuse and promote healthy decision-making.',
                'activities' => [
                    'Awareness campaigns on the dangers of drug & substance abuse',
                    'Life-skills workshops: peer pressure management, goal setting',
                    'Engage parents, mentors and local leaders in prevention',
                    'Establish referral pathways for learners needing support',
                    'Monitor behavioral and knowledge outcomes',
                ],
                'outputs' => [
                    'Awareness sessions in 50 schools and communities',
                    '5,000+ learners trained in life skills',
                    'Quarterly parent & community engagement forums',
                    'Referral pathways established with local health providers',
                ],
            ],
            [
                'title' => 'WASH Advocacy',
                'icon' => 'droplets',
                'color' => 'from-sky-500 to-cyan-400',
                'short' => 'Clean water access, sanitation infrastructure, and hygiene education in schools.',
                'goal' => 'Improve school water and sanitation infrastructure to enhance health, reduce absenteeism and promote learning.',
                'activities' => [
                    'Conduct school WASH assessments',
                    'Construct/rehabilitate water points, boreholes & storage tanks',
                    'Promote handwashing & safe drinking water practices',
                    'Run community WASH engagement campaigns',
                    'Advocate for sustainable county water & sanitation policy',
                ],
                'outputs' => [
                    '50 schools with functional water & sanitation infrastructure',
                    'Hygiene education delivered to all learners & teachers',
                    'Community campaigns reaching 10,000+ households',
                    'Sustained partnerships with local government',
                ],
            ],
            [
                'title' => 'Climate Action',
                'icon' => 'leaf',
                'color' => 'from-emerald-500 to-green-400',
                'short' => 'Climate literacy, student-led tree planting, waste management and community resilience.',
                'goal' => 'Build environmental awareness and resilience among learners to adapt to climate change and promote sustainable practices.',
                'activities' => [
                    'Integrate climate education into curricula & clubs',
                    'Student-led tree planting, waste management & water conservation',
                    'Workshops on sustainable livelihoods & renewable energy',
                    'Partner with local authorities on resilience programs',
                    'Document environmental impact and student engagement',
                ],
                'outputs' => [
                    'Climate education implemented in 50 schools',
                    '5,000+ learners in environmental stewardship projects',
                    'Community campaigns reaching 10,000 households',
                    'Partnerships with local environmental agencies',
                ],
            ],
            [
                'title' => 'Digital Literacy',
                'icon' => 'cpu',
                'color' => 'from-indigo-500 to-blue-400',
                'short' => 'ICT skills, device access, digital pedagogy and innovation clubs for learners.',
                'goal' => 'Equip learners with ICT skills and access to digital learning resources to reduce the digital divide.',
                'activities' => [
                    'Conduct ICT baseline assessments in target schools',
                    'Provide computers, tablets & digital learning devices',
                    'Train learners in ICT skills, research & communication',
                    'Build teacher capacity in digital pedagogy',
                    'Launch digital innovation clubs & competitions',
                ],
                'outputs' => [
                    '50 schools equipped with digital devices where feasible',
                    '10,000+ learners trained in ICT skills',
                    '100 teachers trained in digital pedagogy',
                    'Digital clubs established in every target school',
                ],
            ],
        ];

        foreach ($pillars as $i => $data) {
            Pillar::updateOrCreate(
                ['slug' => Str::slug($data['title'])],
                $data + ['sort_order' => $i]
            );
        }
    }
}

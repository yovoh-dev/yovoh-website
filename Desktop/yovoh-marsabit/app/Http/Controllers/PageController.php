<?php

namespace App\Http\Controllers;

use App\Models\BudgetItem;
use App\Models\ContactMessage;
use App\Models\ImplementationPhase;
use App\Models\Pillar;
use App\Models\Setting;
use App\Models\Stakeholder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * The six strategic pillars, sourced from the database (editable in /admin).
     */
    private function pillars(): array
    {
        return Pillar::orderBy('sort_order')->get()->toArray();
    }

    /**
     * Homepage.
     */
    public function home()
    {
        $stats = [
            ['value' => (int) Setting::get('stat_schools', '50'), 'suffix' => '+', 'label' => 'Schools Targeted'],
            ['value' => (int) Setting::get('stat_learners', '15000'), 'suffix' => '+', 'label' => 'Learners Reached'],
            ['value' => (int) Setting::get('stat_years', '3'), 'suffix' => '', 'label' => 'Year Strategic Horizon'],
            ['value' => Pillar::count(), 'suffix' => '', 'label' => 'Strategic Pillars'],
        ];

        $challenges = [
            ['stat' => '70,961', 'unit' => 'km²', 'label' => 'Kenya\'s largest county, classified Arid & Semi-Arid Land'],
            ['stat' => '63', 'unit' => '%', 'label' => 'of residents live below the national poverty line'],
            ['stat' => '38', 'unit' => '%', 'label' => 'of households have access to safe, reliable water'],
            ['stat' => '30–50', 'unit' => 'days', 'label' => 'school days girls miss yearly due to menstrual insecurity'],
        ];

        $sdgs = [
            ['num' => 3, 'title' => 'Good Health & Well-being'],
            ['num' => 4, 'title' => 'Quality Education'],
            ['num' => 5, 'title' => 'Gender Equality'],
            ['num' => 6, 'title' => 'Clean Water & Sanitation'],
            ['num' => 13, 'title' => 'Climate Action'],
            ['num' => 17, 'title' => 'Partnerships for the Goals'],
        ];

        return view('pages.home', [
            'stats' => $stats,
            'pillars' => $this->pillars(),
            'challenges' => $challenges,
            'sdgs' => $sdgs,
        ]);
    }

    /**
     * About page.
     */
    public function about()
    {
        $values = ['Equity & Inclusion', 'Community Engagement', 'Gender Responsiveness', 'Sustainability'];

        $contextStats = [
            ['value' => 70961, 'suffix' => ' km²', 'label' => 'Largest county in Kenya'],
            ['value' => 500, 'prefix' => '200–', 'suffix' => ' mm', 'label' => 'Erratic annual rainfall'],
            ['value' => 80, 'suffix' => '%', 'label' => 'of households rely on pastoralism'],
            ['value' => 63, 'suffix' => '%', 'label' => 'live below the national poverty line'],
            ['value' => 38, 'suffix' => '%', 'label' => 'have access to safe water sources'],
            ['value' => 8, 'prefix' => '3–', 'suffix' => ' km', 'label' => 'walked daily by learners for water'],
        ];

        $governance = [
            ['role' => 'Program & Partnerships Lead', 'desc' => 'Coordinates mental well-being initiatives, life skills programs, and stakeholder engagement with schools, NGOs and county authorities.'],
            ['role' => 'Health & WASH Lead', 'desc' => 'Oversees menstrual health, hygiene promotion, and clean water access in schools; ensures WASH interventions align with county standards.'],
            ['role' => 'Education & Digital Literacy Lead', 'desc' => 'Leads digital literacy programs, teacher training and ICT access initiatives; ensures technology integration into schools.'],
            ['role' => 'Climate & Environmental Sustainability Lead', 'desc' => 'Oversees climate action, environmental education and community-based sustainability projects.'],
            ['role' => 'Administration & Finance Lead', 'desc' => 'Manages organizational finances, HR, procurement, and policy compliance; ensures operational accountability.'],
        ];

        return view('pages.about', [
            'values' => $values,
            'contextStats' => $contextStats,
            'governance' => $governance,
        ]);
    }

    /**
     * Programs / six pillars detail page.
     */
    public function programs()
    {
        return view('pages.programs', [
            'pillars' => $this->pillars(),
        ]);
    }

    /**
     * Impact, implementation plan & budget page.
     */
    public function impact()
    {
        $phases = ImplementationPhase::orderBy('sort_order')->get()->toArray();

        $budgetItems = BudgetItem::orderBy('sort_order')->get();
        $budget = $budgetItems->toArray();

        $annualBudget = [
            ['year' => 'Year 1 — Foundation & Pilot', 'amount' => 3200000],
            ['year' => 'Year 2 — Scale Up', 'amount' => 3000000],
            ['year' => 'Year 3 — Consolidation', 'amount' => 3000000],
        ];

        $totalBudget = (int) $budgetItems->sum('amount');
        $maxBudgetItem = (int) ($budgetItems->max('amount') ?: 1);

        return view('pages.impact', [
            'phases' => $phases,
            'budget' => $budget,
            'annualBudget' => $annualBudget,
            'totalBudget' => $totalBudget,
            'maxBudgetItem' => $maxBudgetItem,
        ]);
    }

    /**
     * Partners & stakeholders page.
     */
    public function partners()
    {
        $stakeholders = Stakeholder::orderBy('sort_order')->get()->toArray();

        $principles = [
            'Mutual Benefit — partnerships create value for YoVoH and partners alike',
            'Transparency — roles & resource commitments documented in MoUs',
            'Inclusivity — engagement ensures participation of marginalized groups',
            'Sustainability — partnerships build local capacity beyond project timelines',
            'Accountability — partners are jointly accountable for delivery & outcomes',
        ];

        return view('pages.partners', [
            'stakeholders' => $stakeholders,
            'principles' => $principles,
        ]);
    }

    /**
     * Contact page.
     */
    public function contact()
    {
        return view('pages.contact', [
            'contactInfo' => [
                'email' => Setting::get('contact_email', 'info@yovohmarsabit.org'),
                'phone' => Setting::get('contact_phone', '+254 700 000 000'),
                'address' => Setting::get('address', 'Marsabit County, Kenya'),
            ],
        ]);
    }

    /**
     * Handle the contact form submission.
     */
    public function submitContact(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:180'],
            'subject' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'max:3000'],
        ]);

        ContactMessage::create($validated);

        return redirect()
            ->route('contact')
            ->with('status', 'Thank you, '.$validated['name'].'! Your message has been received — our team will respond soon.')
            ->with('contact_success', true);
    }
}

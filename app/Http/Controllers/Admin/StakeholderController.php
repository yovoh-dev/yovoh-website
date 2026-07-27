<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stakeholder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StakeholderController extends Controller
{
    public function index(): View
    {
        return view('admin.stakeholders.index', [
            'stakeholders' => Stakeholder::orderBy('sort_order')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.stakeholders.form', ['stakeholder' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        Stakeholder::create($this->validated($request));

        return redirect()->route('admin.stakeholders.index')->with('status', 'Stakeholder added.');
    }

    public function edit(Stakeholder $stakeholder): View
    {
        return view('admin.stakeholders.form', ['stakeholder' => $stakeholder]);
    }

    public function update(Request $request, Stakeholder $stakeholder): RedirectResponse
    {
        $stakeholder->update($this->validated($request));

        return redirect()->route('admin.stakeholders.index')->with('status', 'Stakeholder updated.');
    }

    public function destroy(Stakeholder $stakeholder): RedirectResponse
    {
        $stakeholder->delete();

        return redirect()->route('admin.stakeholders.index')->with('status', 'Stakeholder removed.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'icon' => ['required', 'string', 'max:60'],
            'name' => ['required', 'string', 'max:150'],
            'role' => ['required', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }
}

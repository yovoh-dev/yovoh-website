<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pillar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PillarController extends Controller
{
    public function index(): View
    {
        return view('admin.pillars.index', [
            'pillars' => Pillar::orderBy('sort_order')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.pillars.form', ['pillar' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        Pillar::create($this->validated($request));

        return redirect()->route('admin.pillars.index')->with('status', 'Pillar created.');
    }

    public function edit(Pillar $pillar): View
    {
        return view('admin.pillars.form', ['pillar' => $pillar]);
    }

    public function update(Request $request, Pillar $pillar): RedirectResponse
    {
        $pillar->update($this->validated($request));

        return redirect()->route('admin.pillars.index')->with('status', 'Pillar updated.');
    }

    public function destroy(Pillar $pillar): RedirectResponse
    {
        $pillar->delete();

        return redirect()->route('admin.pillars.index')->with('status', 'Pillar deleted.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:120'],
            'icon' => ['required', 'string', 'max:60'],
            'color' => ['required', 'string', 'max:120'],
            'short' => ['required', 'string', 'max:255'],
            'goal' => ['required', 'string'],
            'activities' => ['required', 'string'],
            'outputs' => ['required', 'string'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $data['activities'] = $this->linesToArray($data['activities']);
        $data['outputs'] = $this->linesToArray($data['outputs']);
        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }

    private function linesToArray(string $text): array
    {
        return array_values(array_filter(array_map('trim', explode("\n", $text))));
    }
}

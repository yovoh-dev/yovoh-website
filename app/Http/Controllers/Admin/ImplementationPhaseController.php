<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImplementationPhase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ImplementationPhaseController extends Controller
{
    public function index(): View
    {
        return view('admin.phases.index', [
            'phases' => ImplementationPhase::orderBy('sort_order')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.phases.form', ['phase' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        ImplementationPhase::create($this->validated($request));

        return redirect()->route('admin.phases.index')->with('status', 'Phase added.');
    }

    public function edit(ImplementationPhase $phase): View
    {
        return view('admin.phases.form', ['phase' => $phase]);
    }

    public function update(Request $request, ImplementationPhase $phase): RedirectResponse
    {
        $phase->update($this->validated($request));

        return redirect()->route('admin.phases.index')->with('status', 'Phase updated.');
    }

    public function destroy(ImplementationPhase $phase): RedirectResponse
    {
        $phase->delete();

        return redirect()->route('admin.phases.index')->with('status', 'Phase removed.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'phase' => ['required', 'string', 'max:60'],
            'timeline' => ['required', 'string', 'max:60'],
            'focus' => ['required', 'string', 'max:150'],
            'items' => ['required', 'string'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $data['items'] = array_values(array_filter(array_map('trim', explode("\n", $data['items']))));
        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }
}

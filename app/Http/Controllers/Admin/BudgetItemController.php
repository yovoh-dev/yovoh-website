<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BudgetItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BudgetItemController extends Controller
{
    public function index(): View
    {
        return view('admin.budget-items.index', [
            'items' => BudgetItem::orderBy('sort_order')->get(),
            'total' => BudgetItem::sum('amount'),
        ]);
    }

    public function create(): View
    {
        return view('admin.budget-items.form', ['item' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        BudgetItem::create($this->validated($request));

        return redirect()->route('admin.budget-items.index')->with('status', 'Budget line added.');
    }

    public function edit(BudgetItem $budgetItem): View
    {
        return view('admin.budget-items.form', ['item' => $budgetItem]);
    }

    public function update(Request $request, BudgetItem $budgetItem): RedirectResponse
    {
        $budgetItem->update($this->validated($request));

        return redirect()->route('admin.budget-items.index')->with('status', 'Budget line updated.');
    }

    public function destroy(BudgetItem $budgetItem): RedirectResponse
    {
        $budgetItem->delete();

        return redirect()->route('admin.budget-items.index')->with('status', 'Budget line removed.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'area' => ['required', 'string', 'max:150'],
            'amount' => ['required', 'integer', 'min:0'],
            'components' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }
}

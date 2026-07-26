<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BudgetItem;
use App\Models\ContactMessage;
use App\Models\Pillar;
use App\Models\Stakeholder;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'pillarCount' => Pillar::count(),
            'budgetTotal' => BudgetItem::sum('amount'),
            'stakeholderCount' => Stakeholder::count(),
            'unreadCount' => ContactMessage::unread()->count(),
            'messageCount' => ContactMessage::count(),
            'userCount' => User::count(),
            'recentMessages' => ContactMessage::latest()->take(5)->get(),
        ]);
    }
}

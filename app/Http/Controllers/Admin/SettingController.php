<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    private array $keys = [
        'site_name', 'contact_email', 'contact_phone', 'address',
        'mission_statement', 'vision_statement',
        'stat_schools', 'stat_learners', 'stat_years',
    ];

    public function edit(): View
    {
        $settings = collect($this->keys)->mapWithKeys(
            fn (string $key) => [$key => Setting::get($key, '')]
        );

        return view('admin.settings.edit', ['settings' => $settings]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'site_name' => ['required', 'string', 'max:150'],
            'contact_email' => ['required', 'email', 'max:150'],
            'contact_phone' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:150'],
            'mission_statement' => ['required', 'string'],
            'vision_statement' => ['required', 'string'],
            'stat_schools' => ['required', 'integer', 'min:0'],
            'stat_learners' => ['required', 'integer', 'min:0'],
            'stat_years' => ['required', 'integer', 'min:0'],
        ]);

        foreach ($data as $key => $value) {
            Setting::set($key, (string) $value);
        }

        return redirect()->route('admin.settings.edit')->with('status', 'Settings saved.');
    }
}

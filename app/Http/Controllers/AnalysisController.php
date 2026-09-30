<?php

namespace App\Http\Controllers;

use App\Models\Analysis;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AnalysisController extends Controller
{
    public function create(): View
    {
        return view('pages.analyze', ['analysis' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'url' => ['required', 'url', 'max:2048'],
        ]);

        $demoAttributes = Analysis::demoAttributesFor($validated['url']);

        if ($demoAttributes === null) {
            return back()->withInput()->with('demo_message', app()->isLocale('id')
                ? 'Tautan ini belum dapat dianalisis. Periksa alamatnya atau coba tautan lain.'
                : 'This link could not be analyzed. Check the address or try another link.');
        }

        $analysis = $request->user()->analyses()->firstOrCreate(
            ['url' => $validated['url']],
            $demoAttributes,
        );

        return redirect()->route('analyze.result', $analysis);
    }

    public function show(Request $request, Analysis $analysis): View
    {
        abort_unless($analysis->user_id === $request->user()->id, 404);

        return view('pages.analyze', ['analysis' => $analysis]);
    }

    public function history(Request $request): View
    {
        $analyses = $request->user()->analyses()
            ->orderByDesc('is_demo')
            ->orderByDesc('analyzed_at')
            ->orderBy('id')
            ->get();

        return view('pages.history', compact('analyses'));
    }
}

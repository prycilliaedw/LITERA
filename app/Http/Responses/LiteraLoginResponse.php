<?php

namespace App\Http\Responses;

use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\LoginResponse;
use Symfony\Component\HttpFoundation\Response;

class LiteraLoginResponse implements LoginResponse
{
    public function toResponse(mixed $request): Response
    {
        if (! $request instanceof Request) {
            throw new \InvalidArgumentException('A request instance is required.');
        }

        if ($request->wantsJson()) {
            return response()->json(['two_factor' => false]);
        }

        $dashboardPath = route('dashboard', absolute: false);
        $intendedPath = parse_url((string) $request->session()->get('url.intended'), PHP_URL_PATH);

        if ($intendedPath === $dashboardPath) {
            $request->session()->forget('url.intended');

            return redirect()->route('analyze');
        }

        return redirect()->intended(route('analyze'));
    }
}

<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse;

class LiteraLoginResponse implements LoginResponse
{
    public function toResponse($request)
    {
        return redirect('/analyze');
    }
}

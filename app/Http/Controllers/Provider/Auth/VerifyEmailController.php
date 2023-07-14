<?php

namespace App\Http\Controllers\Provider\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated provider's email address as verified.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        if ($request->user('provider')->hasVerifiedEmail()) {
            return redirect()->intended(route('provider.dashboard').'?verified=1');
        }

        if ($request->user('provider')->markEmailAsVerified()) {
            event(new Verified($request->user('provider')));
        }

        return redirect()->intended(route('provider.dashboard').'?verified=1');
    }
}

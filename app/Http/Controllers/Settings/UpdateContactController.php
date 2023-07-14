<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\UpdateContactRequest;
use Illuminate\Http\RedirectResponse;

class UpdateContactController extends Controller
{
    public function update(UpdateContactRequest $request): RedirectResponse
    {
        auth()->user()->update($request->validated());

        return redirect()->route('settings.profile.index');
    }
}

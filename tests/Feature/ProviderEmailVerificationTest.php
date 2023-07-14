<?php

namespace Tests\Feature;

use App\Models\Provider;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class ProviderEmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_email_verification_screen_can_be_rendered()
    {
        $provider = Provider::factory()->create([
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($provider, 'provider')->get('provider/verify-email');

        $response->assertStatus(200);
    }

    public function test_email_can_be_verified()
    {
        Event::fake();

        $provider = Provider::factory()->create([
            'email_verified_at' => null,
        ]);

        $verificationUrl = URL::temporarySignedRoute(
            'provider.verification.verify',
            now()->addMinutes(60),
            ['id' => $provider->id, 'hash' => sha1($provider->email)]
        );

        $response = $this->actingAs($provider, 'provider')->get($verificationUrl);

        Event::assertDispatched(Verified::class);
        $this->assertTrue($provider->fresh()->hasVerifiedEmail());
        $response->assertRedirect(route('provider.dashboard').'?verified=1');
    }

    public function test_email_is_not_verified_with_invalid_hash()
    {
        $provider = Provider::factory()->create([
            'email_verified_at' => null,
        ]);

        $verificationUrl = URL::temporarySignedRoute(
            'provider.verification.verify',
            now()->addMinutes(60),
            ['id' => $provider->id, 'hash' => sha1('wrong-email')]
        );

        $this->actingAs($provider, 'provider')->get($verificationUrl);

        $this->assertFalse($provider->fresh()->hasVerifiedEmail());
    }
}

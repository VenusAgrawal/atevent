<?php

namespace Tests\Feature;

use App\Models\Provider;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class ProviderPasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_reset_password_link_screen_can_be_rendered()
    {
        $response = $this->get('provider/forgot-password');

        $response->assertStatus(200);
    }

    public function test_reset_password_link_can_be_requested()
    {
        Notification::fake();

        $provider = Provider::factory()->create();

        $response = $this->post('provider/forgot-password', [
            'email' => $provider->email,
        ]);

        Notification::assertSentTo($provider, ResetPassword::class);
    }

    public function test_reset_password_screen_can_be_rendered()
    {
        Notification::fake();

        $provider = Provider::factory()->create();

        $response = $this->post('provider/forgot-password', [
            'email' => $provider->email,
        ]);

        Notification::assertSentTo($provider, ResetPassword::class, function ($notification) {
            $response = $this->get('provider/reset-password/'.$notification->token);

            $response->assertStatus(200);

            return true;
        });
    }

    public function test_password_can_be_reset_with_valid_token()
    {
        Notification::fake();

        $provider = Provider::factory()->create();

        $response = $this->post('provider/forgot-password', [
            'email' => $provider->email,
        ]);

        Notification::assertSentTo($provider, ResetPassword::class, function ($notification) use ($provider) {
            $response = $this->post('provider/reset-password', [
                'token' => $notification->token,
                'email' => $provider->email,
                'password' => 'password',
                'password_confirmation' => 'password',
            ]);

            $response->assertSessionHasNoErrors();

            return true;
        });
    }
}

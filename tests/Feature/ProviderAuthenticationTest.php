<?php

namespace Tests\Feature;

use App\Models\Provider;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProviderAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('provider/login');

        $response->assertStatus(200);
    }

    public function test_providers_can_authenticate_using_the_login_screen()
    {
        $provider = Provider::factory()->create();

        $response = $this->post('provider/login', [
            'email' => $provider->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated('provider');
        $response->assertRedirect(route('provider.dashboard'));
    }

    public function test_providers_can_not_authenticate_with_invalid_password()
    {
        $provider = Provider::factory()->create();

        $this->post('provider/login', [
            'email' => $provider->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest('provider');
    }
}

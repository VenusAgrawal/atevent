<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProviderRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('provider/register');

        $response->assertStatus(200);
    }

    public function test_new_providers_can_register()
    {
        $response = $this->post('provider/register', [
            'name' => 'Test Provider',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated('provider');
        $response->assertRedirect(route('provider.dashboard'));
    }
}

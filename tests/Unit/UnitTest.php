<?php

namespace Tests\Unit;

use Tests\TestCase;

class UnitTest extends TestCase
{
    /**
     * Welcome page test.
     */
    public function test_welcome_page_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Login page test.
     */
    public function test_login_page(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('Login');
        $response->assertSee('Email');
        $response->assertSee('Password');
    }
    
}

<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User; 
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Str;


class FeaturesTest extends TestCase
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

    /**
     * User login test.
     */
    public function test_user_login()
    {
        $user = User::factory()->create([
            'password' => bcrypt('pardinho')
        ]);

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'pardinho',
        ]);

        $this->assertAuthenticatedAs($user);

    }

    /**
     * Post form test.
     */
    public function test_post_form_page(): void
    {
        $response = $this->get('/post/form');
        
        $response->assertStatus(302);
        $response->assertRedirect(env('APP_URL') . '/login');
    }

    /**
     * Post creation test.
     */
    public function test_post_create(): void
    {
        $user = User::factory()->create([]);
        $this->actingAs($user);

        $title = $user->name .' post number: ' . rand(1000, 9999);
        $description = Str::random(3) . ' this is the post content.';

        $response = $this->post('/post/create', [
            'title' => $title,
            'description' => $description,
            'age' => 18
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('posts', [
            'title' => $title,
            'description' => $description
        ]);
    }

    /**
     * Return all posts test.
     */
    public function test_all_posts_return(): void
    {
        $user = User::factory()->create([]);
        $this->actingAs($user);

        $response = $this->get('/posts/all');
        $response->assertStatus(200); 
    }

    /**
     * User creation test.
     */
    public function test_user_creation(): void
    {
        $user = User::factory()->create([]);
        $this->actingAs($user);

        $response = $this->post('/api/user/new', [
            'name' => $user->name,
            'email' => $user->email,
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('users', [
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }
}

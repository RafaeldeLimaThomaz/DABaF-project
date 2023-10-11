<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;


class FeaturesTest extends TestCase
{
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

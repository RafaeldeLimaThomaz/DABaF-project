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
        $response->assertRedirect('http://localhost:8989/login');
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

    public function test_create_post_with_tags(): void
    {
        $postTitle = Str::random(10);
        $postDescription = Str::random(10);

        $post = Post::factory()->create([
            'title' => $postTitle,
            'description' => $postDescription,
        ]);
        
        $tag1 = Tag::factory()->create(['name' => 'DABaf']);
        $tag2 = Tag::factory()->create(['name' => 'Laravel']);

        $post->tags()->save($tag1);
        $post->tags()->save($tag2);

        $this->assertDatabaseHas('posts', [
            'title' =>  $postTitle,
            'description' => $postDescription,
        ]);

        $post = Post::where('title', $postTitle)->first();
        $this->assertNotNull($post);

        $this->assertTrue($post->tags->contains($tag1));
        $this->assertTrue($post->tags->contains($tag2));

    }
}

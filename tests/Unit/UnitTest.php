<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Str;

class UnitTest extends TestCase
{
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

    public function test_user_creation(): void
    {
        $user = User::factory()->create([]);
        
        $this->assertDatabaseHas('users', [
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }
    
}

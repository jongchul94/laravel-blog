<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_authenticated_user_can_create_post()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/posts', [
            'title' => '테스트 글',
            'content' => '내용입니다',
        ]);

        $response->assertRedirect('/posts');
        $this->assertDatabaseHas('posts', ['title' => '테스트 글']);
    }
}

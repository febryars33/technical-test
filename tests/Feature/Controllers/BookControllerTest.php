<?php

namespace Tests\Feature\Controllers;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_get_all_data(): void
    {
        $response = $this->getJson('/api/books');

        $response->assertStatus(200);
    }

    public function test_get_all_data_with_search_parameter(): void
    {
        $response = $this->getJson('/api/books', [
            'search' => 'Nesciunt',
        ]);

        $response->assertStatus(200);
    }

    public function test_storing_data(): void
    {
        $response = $this->postJson('/api/books', [
            'author_id' => 1,
            'title' => '__UNIT_TESTING '.fake()->sentence(),
            'description' => '__UNIT_TESTING '.fake()->paragraph(),
            'publish_date' => now()->toDateTimeString(),
        ]);

        $response->assertStatus(200);
    }

    public function test_showing_data(): void
    {
        $response = $this->getJson('/api/books/1');

        $response->assertStatus(200);
    }

    public function test_update_data_with_success_response(): void
    {
        $response = $this->putJson('/api/books/1', [
            'author_id' => 1,
            'title' => '__UNIT_TESTING '.fake()->sentence(),
            'description' => '__UNIT_TESTING '.fake()->paragraph(),
            'publish_date' => now()->toDateTimeString(),
        ]);

        $response->assertStatus(200);
    }

    public function test_update_data_with_failed_response(): void
    {
        $response = $this->putJson('/api/books/5000', [
            'author_id' => 1,
            'title' => '__UNIT_TESTING '.fake()->sentence(),
            'description' => '__UNIT_TESTING '.fake()->paragraph(),
            'publish_date' => now()->toDateTimeString(),
        ]);

        $response->assertStatus(404);
    }

    public function test_delete_data_with_success_response(): void
    {
        $last = Book::latest()->first()->id;

        $response = $this->deleteJson('/api/books/'.$last);

        $response->assertStatus(200);
    }

    public function test_delete_data_with_failed_response(): void
    {
        $response = $this->deleteJson('/api/books/3262263');

        $response->assertStatus(404);
    }
}

<?php

namespace Tests\Feature\Controllers;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @return void
     */
    public function test_get_all_data(): void
    {
        $response = $this->getJson('/api/authors');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_get_all_data_with_search_parameter(): void
    {
        $response = $this->getJson('/api/authors', [
            'search'    =>  'Nesciunt'
        ]);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_storing_data(): void
    {
        $response = $this->postJson('/api/authors', [
            'name'     =>  '__UNIT_TESTING ' . fake()->name(),
            'bio'     =>  '__UNIT_TESTING ' . fake()->paragraph(2),
            'birth_date'     =>  now()->toDateTimeString()
        ]);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_showing_data(): void
    {
        $response = $this->getJson('/api/authors/1');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_update_data_with_success_response(): void
    {
        $response = $this->putJson('/api/authors/1', [
            'name'     =>  '__UNIT_TESTING ' . fake()->name(),
            'bio'     =>  '__UNIT_TESTING ' . fake()->paragraph(2),
            'birth_date'     =>  now()->toDateTimeString()
        ]);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_update_data_with_failed_response(): void
    {
        $response = $this->putJson('/api/authors/5000', [
            'name'     =>  '__UNIT_TESTING ' . fake()->name(),
            'bio'     =>  '__UNIT_TESTING ' . fake()->paragraph(),
            'birth_date'     =>  now()->toDateTimeString()
        ]);

        $response->assertStatus(404);
    }

    /**
     * @return void
     */
    public function test_delete_data_with_success_response(): void
    {
        $last = Book::latest()->first()->id;

        $response = $this->deleteJson('/api/authors/' . $last);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_delete_data_with_failed_response(): void
    {
        $response = $this->deleteJson('/api/authors/3262263');

        $response->assertStatus(404);
    }
}

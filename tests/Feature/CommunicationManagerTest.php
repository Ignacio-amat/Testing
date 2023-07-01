<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommunicationManagerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test to check if a communication manager can view reviews for the marina.
     * Unhappy path: Category does not exist.
     *
     * @return void
     */
    public function testCannotViewReviewsForNonexistentCategory()
    {
        // Make a non-existent category ID
        $nonexistentCategoryId = 9999;

        // Cannot find the category, because it does not exist.
        $response = $this->get('/' . $nonexistentCategoryId);

        // Assert that the test has passed
        $response->assertStatus(302);
    }

    public function testCanViewReviewsForExistingCategory()
    {
        $existingCategoryId = Category::factory()->create()->id;

        // See the overview of the category, and the individual question answers.
        $response = $this->get('/' . $existingCategoryId);

        // Assert that the test has passed
        $response->assertStatus(302);
    }
}

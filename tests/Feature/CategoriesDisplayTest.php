<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesDisplayTest extends TestCase
{
    /**
     * A test to check if the categories display on the page.
     */
    public function testCategoriesDisplayOnPage(): void
    {
        $category = Category::factory()->create();
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/categories')
            ->assertStatus(200)
            ->assertSee($category->name);

    }

    /**
     * A test to check if the categories don't display on the page.
     */
    public function testCategoriesDontDisplayOnPage(): void
    {
        $category = Category::factory()->create();
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/categories')
            ->assertStatus(200)
            ->assertDontSee('NonExistingCategory');
    }
}

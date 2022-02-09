<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Tag;

class TagControllerTest extends TestCase
{
    use refreshDatabase;
    public function testStore()
    {
        $this->post('tags', ['name'=>'PHP'])
        ->assertRedirect('/');

        $this->assertDatabaseHas('tags', ['name'=>'PHP']);
    }

    public function testDestroy(){
        $tag = Tag::Factory()->create();
        $this->delete("tags/$tag->id")
        ->assertRedirect('/');

        $this->assertDatabaseMissing('tags', ['name'=>'PHP']);
    }

    public function testValidate() {
        $this->post('tags', ['name'=>''])
        ->assertSessionHasErrors('name');
    }
}

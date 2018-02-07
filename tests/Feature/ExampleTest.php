<?php

namespace Tests\Feature;

use App\Thread;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
//    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testeReplies(){
        $this->seed('ReplysTableSeeder');
        $response = $this->get('/threads/1');
        $response->assertStatus(200);

        $response = $this->get('/threads/2');
        $response->assertStatus(200);

        $response = $this->get('/threads/a');
        $response->assertStatus(404);


    }

    public function testeThreadVisualization(){
        $this->seed('ThreadsTableSeeder');
        $thread = Thread::find(1);
        $response = $this->get('/threads/1');
        $response->assertSee($thread->title);
        $response->assertSee($thread->body);
    }
}

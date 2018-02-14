<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReplyTest extends TestCase
{
//    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testListagemDeRespostasPorTopico()
    {
        $user = factory(\App\User::class)->create();
        $this->seed('ReplysTableSeeder');
        $replies = \App\Reply::where('thread_id', 2)->get();

        $response = $this->actingAs($user)
            ->json('GET', '/replies/2');

        $response->assertStatus(200)
            ->assertJson($replies->toArray());
    }

    public function testInclusaoDeNovaResposta(){
        $user = factory(\App\User::class)->create();
        $thread = factory(\App\Thread::class)->create();

        $response = $this->actingAs($user)
            ->json('POST', '/replies',[
                'body'=> 'Eu sou uma resposta no forum',
                'thread_id'=>$thread->id]);

        $response->assertStatus(200);
    }
}

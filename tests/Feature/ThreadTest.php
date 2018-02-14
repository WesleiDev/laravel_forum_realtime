<?php

namespace Tests\Feature;

use App\Thread;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ThreadTest extends TestCase
{

    public function testActionIndexOnController()
    {
        $user = factory(\App\User::class)->create();
        $this->seed('ThreadsTableSeeder');
        $threds = Thread::orderBy('updated_at', 'desc')
            ->paginate();

        //Verifica a URL passando um usuário para autenticar
        $response = $this
            ->actingAs($user)
            ->json('GET','/threads');

        //Verifica o status
        $response->assertStatus(200);

        //Verifica se o json foi enviado corretamente
        //com o assertJsonFragment estou verificando somente uma parte do json
        $response->assertStatus(200)
            ->assertJsonFragment([$threds->toArray()['data']]);
    }

    public function testeActionStore(){

        $user = factory(\App\User::class)->create();

        //Verifica a URL passando um usuário para autenticar
        $response = $this
            ->actingAs($user)
            ->json('POST','/threads', [
                'title'=> 'Meu primeiro tópico',
                'body'=> 'Este é um exemplo de tópico']);

        //Verifica o status
        $response->assertStatus(200);

        //Verifica se o json foi enviado corretamente
        //com o assertJsonFragment estou verificando somente uma parte do json
        $response->assertStatus(200)
            ->assertJsonFragment(['created' => 'success']);
    }

    public function testeActionsUpdateController(){
        $user = factory(\App\User::class)->create();
        $thread = factory(\App\Thread::class)->create(
            ['body'=> 'BARA BARA BAR',
            'title'=> "TITULO",
            'user_id'=> $user->id]
        );

        //Verifica a URL passando um usuário para autenticar
        $response = $this
            ->actingAs($user)
            ->json('PUT','/threads/'.$thread->id, [
                'title'=> 'Meu primeiro tópico atualizado',
                'body'=> 'Este é um exemplo de tópico atualizado']);
//
//        var_dump('Erro');
//        var_dump($response);
        //Verifica o status

        $thread->title = "Meu primeiro tópico atualizado";
        $thread->body = "Este é um exemplo de tópico atualizado";

        //Verifica se o json foi enviado corretamente
        //com o assertJsonFragment estou verificando somente uma parte do json
        $response->assertStatus(302);
    }
}

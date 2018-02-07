<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class localeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRoute(){
        $response = $this->get('/locale/en');
        $response->assertStatus(302);
    }

    public function testeTranslate(){
        $response =  $this->withSession(['locale'=> 'pt-br'])->get('/');
        $response->assertSee('Meus tópicos recentes.');
    }
}

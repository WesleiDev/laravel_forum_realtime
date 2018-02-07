<?php

use Illuminate\Database\Seeder;

class ReplysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $threads = factory(\App\Thread::class, 50)->create();
        $threads = factory(\App\Thread::class, 2)->create();


        foreach($threads as $thread){
            var_dump('Resposta Criada');
            factory(\App\Reply::class, rand(5, 10))->create([
                'thread_id'=> $thread->id
            ]);
        }




    }
}

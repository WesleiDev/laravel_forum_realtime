<?php

namespace App\Http\Controllers;

use App\Events\NewReply;
use App\Http\Requests\ReplyRequest;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function show($id){

        $replies = Reply::where('thread_id', $id)
            ->with('user')
            ->get();
        return response()->json($replies);

    }

    public function store(ReplyRequest $request){
        try{

            $reply = new Reply();
            $reply->body = $request->input('body');
            $reply->thread_id = $request->input('thread_id');
            $reply->user_id = Auth::user()->id;
            $reply->save();

            broadcast(new NewReply($reply));

        }catch(\Exception $e){
            return response()->json('Erro ao salvar registro', 500);
        }

        return response()->json('Reply criado com sucesso', 200);
    }
}

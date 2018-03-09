<?php

namespace App\Http\Controllers;

use App\Events\NewThread;
use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ThreadsRequest;
use Illuminate\Support\Facades\Storage;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threds = Thread::orderBy('updated_at', 'desc')
            ->paginate();

        return response()->json($threds);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThreadsRequest $request)
    {
        try{
            $thread = new Thread;
            $thread->title = $request->input('title');
            $thread->body = $request->input('body');
            $thread->user_id = Auth::user()->id;
            $thread->save();
            broadcast(new NewThread($thread));
        }catch (\Exception $e){
            return response()->json('Erro'.$e->getMessage());
        }


        return response()->json(['created'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(ThreadsRequest $request,  $id)
    {
        try{

            $thread = Thread::find($id);
            $this->authorize('update', $thread);
            $thread->title = $request->input('title');
            $thread->body = $request->input('body');
            $thread->save();

            broadcast(new NewThread($thread));
        }catch (\Exception $e){
            return response()->json('Erro'.$e->getMessage());
        }


        return redirect('/threads/'.$id);
    }

    public function testeGcs(Request $request){
//        $file = $request->file('photo');
        $arq = Storage::disk('gcs')->put('/testes','teste.txt');
        dd($arq);
        return "OLA MUNDO";

    }
}

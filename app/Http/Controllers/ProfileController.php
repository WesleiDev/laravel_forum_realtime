<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit(){
        $user = Auth::user();
        return view('profile.form', compact('user'));
    }

    public function update(Request $request){

//        $this->validate($request, [
//          'name' => 'required|string|max:255'
//        ]);
        $imagem = $request->file('foto');
//        $user = Auth::user();
//        $user->name = $request->input('name');
//        $user->email = $request->input('email');
//        $user->foto = $request->file('foto');
//
//        if($request->input('password')){
//            $user->password = bcrypt($request->input('password'));
//        }
//        $user->save();

//        $arq = Storage::disk('gcs')->put('/imagem',$imagem);
        $arq = Storage::disk('gcs')->url('/imagem/uZ3mKg4q0AxnHHd8xsEt2ly4iZz7bslTqNlvPZz7.jpeg');
        dd($arq);

    }
}

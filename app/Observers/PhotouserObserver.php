<?php
/**
 * Created by PhpStorm.
 * User: weslei
 * Date: 19/02/2018
 * Time: 21:29
 */

namespace App\Observers;


use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PhotouserObserver
{
    public function creating(User $user){
        if(is_a($user->foto, UploadedFile::class) and $user->foto->isValid()){
            $this->upload($user);
        }

    }

    public function delete(User $user){

        Storage::delete($user->foto);
    }

    public function updating(User $user){
        if(is_a($user->foto, UploadedFile::class) and $user->foto->isValid()){
            $previous_image = $user->getOriginal('foto');
            $this->upload($user);
            Storage::delete($previous_image);

        }

    }

    protected function upload(User $user){

        $allower_extensions = ['png', 'gif', 'jpeg', 'jpg', 'png'];
        $extension = $user->foto->extension();

        if(!in_array($extension, $allower_extensions)){
            throw new \Exception('Extension not allowed');
        }
        $name = bin2hex(openssl_random_pseudo_bytes(8));
        $name = $name.'.'.$extension;
        $name = 'avatars/'.$name;
        $user->foto->storeAs('', $name);
        $user->foto = $name;

    }
}
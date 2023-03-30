<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Mot_cle;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use File;

class PostController extends Controller
{
//////////////////////////////////////// function auth//////////////////////

    public function new_post(Request $request){
        if($request->has('image')){
            $file = $request->image;
            $image_name = time()."-".$file->getClientOriginalName();
            $file ->move(public_path("images"),$image_name);
            $url = url('/images/'.$image_name);
           // DB::beginTransaction();
           // try {
              $post = new Post;
              $post->user_id=auth()->user()->id;
              $post->image=$url;
              $post->title=$request->title;
               $post->desc=$request->desc;
               $post->save();
               $mot_cles =json_decode($request->mot_cle);
               foreach ($mot_cles as $mot) {
                   $mot_cle = Mot_cle::where('mot_cle', $mot)->first();
                   if ($mot_cle) {
                       $post->motCles()->attach($mot_cle->id);
                   } else {
                       $m_c = new Mot_cle;
                       $m_c->mot_cle = $mot;
                       $m_c->save();
                       $post->motCles()->attach($m_c->id);
                   }
            }
               return "image est post";

        } else {
            return "No file uploaded or invalid file.";
        }

    }

//////////////////////////


    public function delete_post($id){
       $post=Post::find($id);
       if (auth()->user()->id == $post->user_id) {
        $post->delete();
        return "post delete";
       }
       return "post ne delete pas";
    }


 ////////////////////////////

    public function post_user(){
       $post=Post::where("user_id",auth()->user()->id);
       return $post;
    }

//////////////////////////////////// function public /////////////////////////////////


    public function recherche_post_mot_cle(){
        $mot=Mot_cle::find(3);
        return $mot->posts()->get();
    }
























}

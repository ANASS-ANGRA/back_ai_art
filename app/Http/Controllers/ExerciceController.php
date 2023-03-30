<?php

namespace App\Http\Controllers;

use App\Models\Exercice;
use App\Http\Requests\StoreExerciceRequest;
use App\Http\Requests\UpdateExerciceRequest;
use Illuminate\Http\Request;

class ExerciceController extends Controller
{
   public function new_post(Request $request){
       $post= new Exercice;
       $post->nom=$request->nom;
       $post->numero=$request->numero;
       $post->save();
   }
   public function tous_post(){
     $post=Exercice::all();
     return $post;
   }
}

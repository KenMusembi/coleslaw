<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\User;
use Auth;

class QuestionController extends Controller
{
    //
    public function index(){
      $questions = Question::all();
      $answers = Answer::all();
      return view('home', compact('questions'), compact('answers'));
      //return view('home');
    }

    public function create(){
        return view('create');
    }

    public function storeQuestion(){

        $question = new Question();

        $question->question = request('question');
        $question->level = request('level');
        $question->user_id = Auth::user()->id;

        $question->save();

        return redirect('/home');

    }
}

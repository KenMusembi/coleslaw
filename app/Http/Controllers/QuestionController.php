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
      //$questions = Question::all();
      $answers = Answer::all();
      //return view('home');
      $qna = Question::leftjoin('answers','questions.id','=','answers.question_id')->
      select('questions.id', 'answers.answer','questions.question')->get();
      return view('home', compact('qna'));
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

      public function storeAnswer(){

        $answer = new Answer();

        $answer->answer = request('answer');
        $answer->question_id = request('question_id');
        $answer->user_id = Auth::user()->id;

        $answer->save();

        return redirect('/home');

    }
}

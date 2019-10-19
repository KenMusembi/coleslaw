<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\User;
use App\Spaces;
use Auth;

class QuestionController extends Controller
{
    //
    public function index(){
      //$questions = Question::all();
      $answers = Answer::all();
      //return view('home');
      $qna = Question::leftjoin('answers','questions.id','=','answers.question_id')->
      select('questions.id', 'answers.answer','questions.question')->groupby('questions.id')->orderby('questions.id')->get();
      return view('home', compact('qna'));
    }

    public function create(){
        return view('create');
    }

    public function answer(){
      $qna = Question::leftjoin('answers','questions.id','=','answers.question_id')->
      get();
      return view('answer', compact('qna'));
    }

    public function welcome(){
      $qna = Question::leftjoin('answers','questions.id','=','answers.question_id')->
      select('questions.id', 'answers.answer','questions.question')->groupby('questions.id')->orderby('questions.id')->get();
      return view('welcome', compact('qna'));
    }

    public function spaces(){
      $qna = Question::leftjoin('answers','questions.id','=','answers.question_id')->
      select('questions.id', 'answers.answer','questions.question')->groupby('questions.id')->orderby('questions.id')->get();
      $space = Spaces::all();
      return view('spaces', compact('space','qna'));
    }

    public function notifications(){
        return view('notifications');
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

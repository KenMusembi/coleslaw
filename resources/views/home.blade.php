@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Questions</div>
        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          <h1>Questions this week</h1>

          @foreach ($qna as $qa)
          <div class="card"  style="width:48rem;">
            {{ $qa->id}}
            {{ $qa->question}}
            <br>
            {{ $qa->answer}}<br>


            <ul class="nav nav-tabs">
              <li class="nav-item">
                <i class="fas fa-edit">example</i>
                <a  class="nav-link fas fa-edit" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Answer</a>&nbsp
                <li class="nav-item"><a  class="nav-link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample  ">Follow</a>
                  <li class="nav-item dropdown" align="right">
                    <a class="nav-link dropdown-toggle"  data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">...</a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#">Answer Anonymously</a>
                      <a class="dropdown-item" href="#">Comment</a>
                      <a class="dropdown-item" href="#">Report</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Save To List</a>
                    </div>
                  </li>
                </ul>

                <div class="collapse" id="collapseExample" style="width: 36rem;">
                  <div class="card card-body">
                    <h5 class="card-title">{{ Auth::user()->name}}, {{ Auth::user()->email}}</h5>
                    <div class="container">
                      <form method="POST" action="action">
                        {{ csrf_field() }}
                        <div>
                          <textarea name="answer" rows="8 " cols="70" placeholder="write answer here"></textarea>
                          <input type="text" name="question_id" value="{{$qa->id}}" hidden="true" placeholder="Type question here">
                        </div>
                        <div>
                          <input class="btn btn-success" type="submit" value="Submit">
                        </div>
                      </form>
                    </div>

                  </div>
                </div>
                <br><br>
              </div>
              @endforeach
              <br>

            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection

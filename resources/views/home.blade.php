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

{{ $qa->id}}
 {{ $qa->question}}
 <br>
 {{ $qa->answer}}<br>
 <p>
<a  data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Answer</a>&nbsp
<a  data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample  ">Follow</a>
</p>
<div class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Separated link</a>
  </div>
</div>
  
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

@endforeach
<br>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

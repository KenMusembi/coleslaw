@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
<div class="col-md-2" align="left">
  <div class="card" style="background-color:false;">
    <div class="card-body">
      Questions
      <br>
      Questions for you
      Answer Requests
      Answer Later
    </div>
  </div>
</div>


    <div class="col-md-7">

          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif


          @foreach ($qna as $qa)
          <div class="card"  style="width:36rem;">
            <br>
            {{ $qa->id}}
            {{ $qa->question}}
            <br>
            {{ $qa->answer}}<br>


                        <ul class="nav nav-tabs">
                          <li class="nav-item">
                            <i class="fas fa-edit"></i>
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

                          </div>
                          @endforeach
                          <br>

                        </div>

                  </div>
                </div>

                <!-- Large modal -->
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="myclubs_ModalLabel">Add Question</h5>
                  <button type="button" class="close" id="myclubs_Modalclose" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                  <form method="POST" action="qaction">

                      {{ csrf_field() }}


                           <div class="form-group">
                             <textarea class="form-control" id="question" name="question" placeholder="type question here"></textarea>
                           </div>
                           <div class="form-group">
                             <label for="level" name="level" placeholder="Beginner" class="col-form-label">Level:</label>
                             <input type="dropdown" class="form-control" id="message-text">
                           </div>
                         </form>

                <div class="modal-footer">
                  <button type="button" id="myclubs_Modalclose" class="btn btn-primary close_view" data-dismiss="modal">Close</button>
                  <input class="btn btn-danger" type="submit" value="Add Question">
                </div>
                    </div>
              </div>
            </div>


                @endsection

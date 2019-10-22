@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-2.8" align="left">
      <div class="card" style="background-color:false;">
        <div class="card-body">
          <i class="" style="font-size:18px;color:#DC2800;"></i>  Spaces <br>
          @foreach ($space as $qa)
          @if ($qa->name == "Family")
          <a class="fa fa-users" href="#trial" style="font-size:16px;color:#DC2800;"> Family</a><br>
          @elseif ($qa->name == "Religion")
          <a class="fa fa-book    " href="#trial" style="font-size:16px;color:#DC2800;">    Religion</a><br>
          @elseif ($qa->name == "Computer Science")
          <a class="fa fa-laptop   " href="#trial" style="font-size:16px;color:#DC2800;">    Computer Science</a><br>
          @endif
          @endforeach
        </div>
      </div>
    </div>

    <div class="col-md-7">

      @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
      @endif

<div class="card trial"  id="trial" style="width:36rem; padding:24px;">
  @foreach ($qna as $qa)

    {{ $qa->question}}
    <br>
    {{ $qa->answer}}<br>
        <br>
        @endforeach

</div>
    </div>
  </div>
</div>
@endsection

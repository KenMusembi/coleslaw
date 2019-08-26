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

 {{ $qna}}
<br>

@endforeach

<input type="button" value="Edit">
<br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

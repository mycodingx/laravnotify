@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><i class="fas fa-comment fa-fw"></i> Messages</div>

                    <div class="card-body">
                        <p><label>Name : </label>{{$message->name}}</p>
                        <p><label>Subject : </label>{{$message->subject}}</p>
                        <p><label>Message : </label>{{$message->message}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

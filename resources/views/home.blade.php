@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><i class="fas fa-comment fa-fw"></i> Messages</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <ul class="list-group">
                            @foreach($messages as $message)
                                <li class="list-group-item">
                                    <a href="{{route('message.show',$message->id)}}">
                                        <i class="fas fa-comment-medical fa-fw text-success"></i>
                                        {{$message->name}} - {{$message->subject}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="cus-page">
                            {{ $messages->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

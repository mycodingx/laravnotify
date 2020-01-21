<a class="dropdown-item" href="{{route('message.show',$notification->data['message']['id'])}}">
    {{$notification->data['message']['name'].' sent a new message.'}}
</a>
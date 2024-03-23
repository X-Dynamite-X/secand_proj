{{-- @foreach ($contacted_users as $room) --}}
{{-- @if ($room->sender->id == Auth::user()->id) --}}
    {{-- <a
        href="{{ route('chat', ['room_id' =>  $room->id]) }}"> --}}
        {{-- <li class="active"> --}}
        {{-- <li>
            <div class="d-flex bd-highlight">
                <div class="img_cont">
                    <img  src='{{ asset('image/avatars/'.$room->user_avatar) }}'
                        class="rounded-circle user_img" />
                    <span class="online_icon"></span>
                </div>
                <div class="user_info">
                    <span>{{ $room->name }}</span>
                    <p>{{ $room->name }} is online</p>
                    <p>{{$room}}</p>
                </div>
            </div>
        </li>
    </a> --}}

{{-- @endif --}}
{{-- @endforeach --}}


<a>
{{-- <li class="active"> --}}
<li>
    <div class="d-flex bd-highlight">
        <div class="img_cont">
            <img  src='{{ asset('image/avatars/1710970107.jpg') }}'
                class="rounded-circle user_img" />
            <span class="online_icon"></span>
        </div>
        <div class="user_info">
            <span>test</span>
            <p>test is online</p>
            {{-- <p>{{$room}}</p> --}}
        </div>
    </div>
</li>
</a>

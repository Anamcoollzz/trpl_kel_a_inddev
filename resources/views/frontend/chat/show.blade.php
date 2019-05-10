<html>
<head>
  <link href="{{asset('b4/css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <link href="{{asset('plugins/font-awesome/4.7.0/css/font-awesome.min.css')}}" type="text/css" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/chat-style.css')}}">
</head>
<body>
  <div class="container">
    <h3 class="text-center">
      <a href="{{ url('') }}">Beranda</a>
    </h3>
    <div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Terbaru</h4>
            </div>
          </div>
          <div class="inbox_chat">
            {{-- @foreach ($users as $chat) --}}
            {{-- @if($chat->id_member != Auth::id()) --}}
            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> 
                  <img src="{{asset('img/user-profile.png')}}" alt=""> 
                </div>
                <div class="chat_ib">
                  <h5>
                    <a href="{{ route('chat.id',[$chat->id]) }}">
                      {{$chat->id_member == Auth::id() ? $chat->developer->nama : $chat->member->nama}}
                    </a>
                    {{-- <span class="chat_date">{{$chat->created_at}}</span> --}}
                  </h5>
                  {{-- <p>Test, which is a new approach to have all solutions 
                  astrology under one roof.</p> --}}
                </div>
              </div>
            </div>
            <br>
            <center>
              <a href="{{ url('chat') }}">Semua Chat</a>
            </center>
            {{-- @endforeach --}}
          </div>
        </div>
        <div class="mesgs">
          <div class="msg_history">
            @foreach ($chat->detail as $d)
            @if($d->id_user != Auth::id())
            <div class="incoming_msg">
              <div class="incoming_msg_img"> 
                <a href="{{ url('developer/'.$d->user->email) }}">
                  <img src="{{asset('img/user-profile.png')}}" alt="sunil"> 
                </a>
              </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>{{$d->isi}}</p>
                  <span class="time_date"> {{$d->created_at}}</span>
                </div>
              </div>
            </div>
            @else
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>{{$d->isi}}</p>
                <span class="time_date"> {{$d->created_at}}</span> 
              </div>
            </div>
            @endif
            @endforeach
          </div>
          <form action="{{ route('input-chat',[$chat->id]) }}" method="post">
            @csrf
            <div class="type_msg">
              <div class="input_msg_write">
                <input name="pesan" required="required" type="text" class="write_msg" placeholder="Kirim pesan" />
                <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
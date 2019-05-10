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
            {{-- <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                  <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> 
              </div>
            </div> --}}
          </div>
          <div class="inbox_chat">
            @foreach ($chat as $c)
            {{-- @if($c->id_member != Auth::id()) --}}
            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> 
                  <img src="{{asset('img/user-profile.png')}}" alt=""> 
                </div>
                <div class="chat_ib">
                  <h5>
                    <a href="{{ route('chat.id',[$c->id]) }}">
                      @if($c->id_member != Auth::id())
                      {{$c->member->nama}}
                      @else
                      {{$c->developer->nama}}
                      @endif
                      @if($c->detail_count > 0)
                      <span class="badge badge-danger" style="float: right;">
                        {{$c->detail_count}}
                      </span>
                      @endif
                    </a>
                    {{-- <span class="chat_date">{{$c->created_at}}</span> --}}
                  </h5>
                  {{-- <p>Test, which is a new approach to have all solutions 
                  astrology under one roof.</p> --}}
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <div class="mesgs">
          <div class="msg_history">
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
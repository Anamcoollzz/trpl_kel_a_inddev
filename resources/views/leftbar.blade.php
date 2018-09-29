<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ Auth::user()->avatar }}" class="img-circle" alt="{{Auth::user()->nama}}">
      </div>
      <div class="pull-left info">
        <p class="text-capitalize">
          {{ Auth::user()->nama }}
        </p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      {{-- <li @if($active == 'dasbor') class="active" @endif>
        <a href="{{ route('dasbor') }}">
          <i class="fa fa-dashboard"></i> <span>Dasbor</span>
        </a>
      </li> --}}
      <li @if($active == 'lihatweb') class="active" @endif>
        <a href="{{ url('/') }}" target="_blank">
          <i class="fa fa-globe"></i> <span>Web</span>
        </a>
      </li>
      <li @if($active == 'member.index') class="active" @endif>
        <a href="{{ route('member.index') }}">
          <i class="fa fa-user-plus"></i> <span>Member</span>
        </a>
      </li>
      <li @if($active == 'developer.index') class="active" @endif>
        <a href="{{ route('developer.index') }}">
          <i class="fa fa-laptop"></i> <span>Developer</span>
        </a>
      </li>
      <li @if($active == 'admin.index') class="active" @endif>
        <a href="{{ route('admin.index') }}">
          <i class="fa fa-group"></i> <span>Admin</span>
        </a>
      </li>
      <li class="treeview @if(in_array($active, ['kategori.index','kategori.create'])) active @endif ">
        <a href="#">
          <i class="fa fa-cubes"></i>
          <span>Kategori</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li @if(in_array($active, ['kategori.create'])) class="active" @endif>
            <a href="{{ route('kategori.create') }}"><i class="fa fa-circle-o"></i> Tambah Kategori</a>
          </li>
          <li @if(in_array($active, ['kategori.index'])) class="active" @endif>
            <a href="{{ route('kategori.index') }}"><i class="fa fa-circle-o"></i> Data Kategori</a>
          </li>
        </ul>
      </li>
    </ul>
  </section>
</aside>
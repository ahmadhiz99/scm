<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">UMKM Gerabah Kasongan</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SCA</a>
        </div>
        
        @foreach($menu as $key => $data)
        @if(isset($data['item']))
          <ul class="sidebar-menu">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <!-- <i class="{{$data['icon']}}"></i> -->
                    <i class="{{$data['icon']}}"></i>
                    <span>{{$data['name']}}</span>

                </a>
                    
                <ul class="dropdown-menu">
                    @foreach($data['item'] as $key2 => $item)
                    <li><a class="nav-link" href="{{$key2}}">{{$item['name']}}</a></li>
                    @endforeach
                </ul>
            </li>
        @else
        <ul class="sidebar-menu">
            <li class="">
                <a href="{{$data['ref']}}" class="nav-link">
                    <i class="{{$data['icon']}}"></i>
                    <span>{{$data['name']}}</span>
                </a>
            </li>
        @endif
        @endforeach

        <!-- <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Menu</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Menu 1</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="#">Sub Menu 1</a></li>
                    <li><a class="nav-link" href="#">Sub Menu 2</a></li>
                    <li><a class="nav-link" href="#">Sub Menu 3</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-th"></i>
                    <span>Menu 2</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="#">Sub Menu 1</a></li>
                    <li><a class="nav-link" href="#">Sub Menu 2</a></li>
                    <li><a class="nav-link" href="#">Sub Menu 3</a></li>
                </ul>
            </li>
        </ul> -->

        <!-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Logout
            </a>
        </div> -->
    </aside>
</div>
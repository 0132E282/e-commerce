<!-- Brand Logo -->
<a href="index3.html" class="brand-link">
    <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            @foreach($menuList as $key => $value)
            @if(!isset($value['children']))
            <li class="nav-item">
                <a href="{{$value['path']}}" class="nav-link">
                    <i class="nav-icon {{$value['icon']}}"></i>
                    <p>
                        {{$value['title']}}
                        <!-- <span class="badge badge-info right">2</span> -->
                    </p>
                </a>
            </li>
            @else
            <li class="nav-item">
                <a href="{{$value['path']}}" class="nav-link">
                    <i class="{{$value['icon']}}"></i>
                    <p>
                        {{$value['title']}}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @foreach($value['children'] as $key => $childrenValue)
                    <li class="nav-item">
                        <a href="{{$childrenValue['path']}}" class="nav-link">
                            <i class="{{$childrenValue['icon']}}"></i>
                            <p>{{$childrenValue['title']}}</p>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endif

            @endforeach
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
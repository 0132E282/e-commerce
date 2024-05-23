<!-- Brand Logo -->
<a href="index3.html" class="brand-link">
    <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ $user->avatar }}" onerror="this.src='https://tse3.mm.bing.net/th?id=OIP.R97hFhAyScVK0EsD5seM6wHaHa&pid=Api&P=0&h=180';" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{ route('admin.users.update', ['id' => $user->id]) }}" class="d-block">{{ $user->name }}</a>
        </div>
    </div>

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
            @foreach ($menuList as $key => $value)
                @can($value['key_code'])
                    @if (!isset($value['children']))
                        <li class="nav-item">
                            @if (isset($value['method']))
                                <x-button action="{{ $value['path'] }}" method="{{ $value['method'] }}" class="nav-link bg-transparent">
                                    <i class="nav-icon {{ $value['icon'] }}"></i>
                                    <p>
                                        {{ $value['title'] }}
                                        <!-- <span class="badge badge-info right">2</span> -->
                                    </p>
                                </x-button>
                            @else
                                <a href="{{ $value['path'] }}" class="nav-link">
                                    <i class="nav-icon {{ $value['icon'] }}"></i>
                                    <p>
                                        {{ $value['title'] }}
                                        <!-- <span class="badge badge-info right">2</span> -->
                                    </p>
                                </a>
                            @endif
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ $value['path'] }}" class="nav-link">
                                <i class="{{ $value['icon'] }}"></i>
                                <p>
                                    {{ $value['title'] }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @foreach ($value['children'] as $key => $childrenValue)
                                    <li class="nav-item">
                                        <a href="{{ $childrenValue['path'] }}" class="nav-link">
                                            <i class="{{ $childrenValue['icon'] }}"></i>
                                            <p>{{ $childrenValue['title'] }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endcan
            @endforeach
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->

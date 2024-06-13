@php
    $InvoicePaid = $notifications->groupBy('type')['App\Notifications\InvoicePaid'] ?? null;
    $reivewsNotifications = $notifications->groupBy('type')['App\Notifications\AdminReviewsNotifications'] ?? null;

@endphp
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('client.site.home') }}" class="nav-link">Trang chủ </a>
    </li>

</ul>

<ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                    <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                            Brad Diesel
                            <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">Call me whenever you can...</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                </div>
                <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                    <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                            John Pierce
                            <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">I got your message bro</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                </div>
                <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                    <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                            Nora Silvester
                            <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">The subject goes here</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                </div>
                <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
    </li>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">{{ $notifications->count() }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">{{ $notifications->count() }} Thông báo</span>
            <div class="dropdown-divider"></div>
            @if (!empty($InvoicePaid) && $InvoicePaid->count() > 0)
                <a href="{{ route('notification.index', ['type' => 'InvoicePaid']) }}" class="dropdown-item">
                    <i class="bi bi-clipboard2-fill mr-2"></i> {{ $InvoicePaid->count() ?? 0 }} Đơn hàng mới
                    {{-- <span class="float-right text-muted text-sm">3 mins</span> --}}
                </a>
                <div class="dropdown-divider"></div>
            @endif
            @if (!empty($reivewsNotifications) && $reivewsNotifications->count() > 0)
                <a href="{{ route('notification.index', ['type' => 'AdminReviewsNotifications']) }}" class="dropdown-item">
                    <i class="bi bi-clipboard2-fill mr-2"></i> {{ $reivewsNotifications->count() ?? 0 }} Bài dánh giá
                    {{-- <span class="float-right text-muted text-sm">3 mins</span> --}}
                </a>
                <div class="dropdown-divider"></div>
            @endif
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
        </a>
    </li>
</ul>

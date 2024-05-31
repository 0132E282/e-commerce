<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="logo pull-left">
                <a href="{{ route('client.site.home') }}"><img src="{{ session('setting_system')['logo'] ?? '/web/assets/images/home/logo.png' }}" alt="" /></a>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="shop-menu pull-right">
                <ul class="nav navbar-nav">
                    <li><a href="#"><i class="fa fa-star"></i> Đã thích</a></li>
                    <li>
                        <a href="{{ route('client.shop.cart') }}">
                            <i class="fa fa-shopping-cart"></i>
                            Giỏ hàng
                            <span class="badge quantity-cart">{{ !empty(session('cart_product')) ? count(session('cart_product')) : 0 }}</span>
                        </a>
                    </li>
                    <li><a href="#"><i class="fa fa-user"></i> Tài khoản</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

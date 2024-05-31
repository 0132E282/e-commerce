@foreach ($quantityList as $quantity)
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box {{ $quantity['fill'] }}">
            <div class="inner">
                <h3>{{ $quantity['quantity'] }}</h3>
                <p>{{ $quantity['title'] }}</p>
            </div>
            <div class="icon">
                <i class="{{ $quantity['icon'] }}"></i>
            </div>
            <a href="{{ $quantity['route'] }}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
@endforeach

<div class="container">
    <div class="row">
        <div class="col-sm-12">

        </div>
        <div id="slider-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($slider as $key => $item)
                    <li data-target="#slider-carousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach ($slider as $key => $item)
                    <div class="item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ $item->image_url }} " class="girl img-responsive" alt="{{ $item->name_slider }}" />
                        <div class="carousel-content">
                            <h1>{{ $item->title }}</h1>
                            {{-- <h2>{{ $item->title }}</h2> --}}
                            <p>{{ $item->content }} </p>
                            @if (!empty($item->links))
                                <x-button link="{{ $item->links ?? '' }}" class="btn btn-default get">Xem thêm </x-button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
</div>

@push('scripts')
@endpush

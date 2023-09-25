@extends('/include/layouts/admin-layout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @if (session()->has('message'))
                    @php $message = session()->get('message'); @endphp
                    <x-Alert message="{{ $message['content'] }}" type="{{ $message['type'] }}" />
                @endif
            </div>
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="slider-tab" data-bs-toggle="tab" data-bs-target="#slider-tab-pane" type="button" role="tab" aria-controls="slider-tab-pane" aria-selected="true">slider</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">demo</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="slider-tab-pane" role="tabpanel" aria-labelledby="slider-tab" tabindex="0">
                            <x-TableSlider :data="$slider" />
                        </div>
                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <iframe width="100%" height="400px" src="{{ route('demo-slider') }}" title="description"></iframe>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

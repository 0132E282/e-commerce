@extends('/include/layouts/admin-layout')
@section('content')
    <section class="content ">
        <div class="container-fluid d-flex flex-column">
            @if (session()->has('message'))
                @php $message = session()->get('message'); @endphp
                <x-alert message="{{ $message['content'] }}" type="{{ $message['type'] }}" />
            @endif
            <div class="card ">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="m-0">Thông báo </h5>
                    <div class="ms-auto">
                        <x-Button action="{{ route('notification.real-all') }}" method="patch">
                            <i class="bi bi-eye"></i>
                            <span class="ms-2"> xem tất cả</span>
                        </x-Button>
                        <x-Button class="btn-danger" action="{{ route('notification.delete-all') }}" method="delete">
                            <i class="bi bi-trash"></i>
                            <span class="ms-2"> xóa tất cả</span>
                        </x-Button>
                    </div>
                </div>
                <div class="card-body ">
                    @if ($notifications->count() > 0)
                        @foreach ($notifications as $notification)
                            <div class=" border p-2 d-flex justify-content-between align-items-center mb-3 {{ empty($notification->read_at) ? 'bg-primary' : '' }}" style="border-radius: 8px;">
                                <a href="{{ $notification->data['url'] . '?id_notify=' . $notification->id }}" class="media color-black" href="">
                                    <i class="bi bi-bell mr-2" style="font-size: 40px;"></i>
                                    <div class="media-body">
                                        <h5 class="mt-0">{{ $notification->data['title'] }}</b></h5>
                                        <p>{{ $notification->data['content'] }}</p>
                                    </div>
                                </a>
                                <div class="pe-4">
                                    <x-Button class="btn-danger" action="{{ route('notification.delete', ['id' => $notification->id]) }}" method="delete">
                                        <i class="bi bi-trash"></i>
                                    </x-Button>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center">Không có Thông báo</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

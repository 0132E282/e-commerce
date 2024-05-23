@extends('/include/layouts/admin-layout')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @if (session()->has('message'))
                    @php $message = session()->get('message'); @endphp
                    <x-alert message="{{ $message['content'] }}" type="{{ $message['type'] }}" />
                @endif
            </div>
            <div class="card shadow ">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center ">
                        <div>
                        </div>
                        <div>
                            <x-button :link="route('admin.roles.create')">
                                Tạo mới
                            </x-button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <x-table.table-roles :roles="$roles" />
                </div>
            </div>
        </div>
    </section>
@endsection

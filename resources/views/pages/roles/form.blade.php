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
            <div class="card p-4 ">
                <x-form.form-roles :action="empty($role) ? route('admin.roles.create') : route('admin.roles.update', ['id' => $role->id])" :role="$role" :method="empty($role) ? 'POST' : 'PUT'" />
            </div>
        </div>
    </section>
@endsection

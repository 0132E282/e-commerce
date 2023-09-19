@extends('/include/layouts/admin-layout')
@section('content')

<!-- Main content -->
<section class="content">
    @if(session()->has('message'))
    @php $message = session()->get('message'); @endphp
    <x-alert message="{{$message['content'] }}" type="{{$message['type']}}" />
    @endif
    <div class="container-fluid">
        <x-FormCategory action="{{$detailCategory ? route('update-category' ,$detailCategory->id_category ) : route('create-category')}}" method="{{ $detailCategory ? 'put' : 'post'}}" :detailCategory="$detailCategory" />
    </div>
</section>
<!-- /.content -->
@endsection
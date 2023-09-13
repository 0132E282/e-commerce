@extends('/include/layouts/admin-layout')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="/vendor/ckeditor5/ckeditor.js"></script>
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <x-BreadcrumbAdmin :value="$detailProduct" />
</div>
<section class="content">
    @if(session()->has('message'))
    @php $message = session()->get('message'); @endphp
    <x-alert message="{{$message['content'] }}" type="{{$message['type']}}" />
    @endif
    <div class="form">
        <x-FormProducts route="{{$detailProduct ? route('update-product',$detailProduct->id_product):route('create-product')}}" method="{{$detailProduct ? 'put' : 'post'}}" :dataForm="$detailProduct " />
    </div>
</section>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(".tagSl-2").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    })
</script>
@endsection
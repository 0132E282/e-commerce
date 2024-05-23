@props(['valueDefault' => '', 'id' => ''])
@php
    $exTypeList = [
        [
            'title' => 'XLSX',
            'type' => 'xlsx-XLSX',
        ],
        [
            'title' => 'CSV',
            'type' => 'csv-CSV',
        ],
        [
            'title' => 'TSV',
            'type' => 'tsv-TSV',
        ],
        [
            'title' => 'ODS',
            'type' => 'ods-ODS',
        ],
        [
            'title' => 'XLS',
            'type' => 'xls-XLS',
        ],
        [
            'title' => 'HTML',
            'type' => 'html-HTML',
        ],
        [
            'title' => 'MPDF',
            'type' => 'pdf-MPDF',
        ],
        [
            'title' => 'DOMPDF',
            'type' => 'pdf-DOMPDF',
        ],
        [
            'title' => 'TCPDF',
            'type' => 'pdf-TCPDF',
        ],
    ];
@endphp

<x-modal.index id="{{ $id }}" size="lg">
    <x-slot:header>
        Xuất File
    </x-slot:header>
    <x-slot:body>
        <x-form :action="route('admin.category.export')" method="POST" custom="true" id="form-export">
            <div class="row">
                <div class="col-8">
                    <input type="text" class="form-control" value="{{ $valueDefault ?? 'danh-muc-san-phẩm' }} " name="name_file">
                </div>
                <div class="col-4">
                    <select class="custom-select" name="type_file">
                        @foreach ($exTypeList as $exType)
                            <option value="{{ $exType['type'] }}">{{ $exType['title'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </x-form>
    </x-slot:body>
    <x-slot:action>
        <button type="submit" class="btn btn-primary btn-save" form="form-export">Xuất</button>
    </x-slot:action>
</x-modal.index>
@push('scripts')
    <script>
        $(document).ready(function() {
            const idModal = $('#{{ $id }}');
            idModal.on('shown.bs.modal', function(e) {
                const route = $(e.relatedTarget).data('route');
                idModal.find('form').attr('action', route);
            })
        })
    </script>
@endpush

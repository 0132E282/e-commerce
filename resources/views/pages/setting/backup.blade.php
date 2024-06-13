@extends('include.layouts.admin-layout')

@section('content')
    <section class="content">
        <div class="container-fluid d-flex flex-column" style="min-height: 90vh;">
            <div class="card shadow p-4 " style="flex: 1;">
                <div class="mb-4">
                    <x-Button :link="route('admin.file.create-backup')">Tạo backup <i class="bi bi-plus ms-2"></i></x-Button>
                </div>
                <x-Table :tableHead="['tên file', 'đuôi', 'kích thước', 'ngày tạo', '']">
                    @foreach ($filesBackup as $file)
                        <tr>
                            <td>{{ $file->getBasename('.' . $file->getExtension()) }}</td>
                            <td>{{ $file->getExtension() }}</td>
                            <td>{{ number_format($file->getSize() / 1048576, 2) }} MB</td>
                            <td>{{ date('Y-m-d H:i:s', $file->getCTime()) }}</td>

                            <td class="text-end">
                                <x-button :link="route('admin.file.download-backup', ['filename' => $file->getFilename()])"><i class="bi bi-arrow-bar-down"></i></x-button>
                                {{-- <x-button>
                                    <i class="bi bi-trash-fill"></i>
                                </x-button> --}}
                            </td>
                        </tr>
                    @endforeach
                </x-Table>
            </div>
        </div>
    </section>
@endsection

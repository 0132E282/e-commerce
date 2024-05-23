@props(['name', 'value', 'label' => '', 'height' => 100])
<label for="{{ $name . '_id' }}" class="form-label">{{ $label }}</label>
<textarea class="summernote-editor" id="{{ $name . '_id' }}" name="{{ $name }}" {{ $attributes->class(['form-control']) }} id="editor" style="height: 200px;"></textarea>
@push('scripts')
    <script src="{{ asset('bootstrap/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function() {
            const summernote = $('textarea[name].summernote-editor').summernote()
            summernote.summernote('destroy');
            summernote.html('{!! $value !!}');
            summernote.summernote({
                height: {{ $height }},
            });
        });
    </script>
@endpush

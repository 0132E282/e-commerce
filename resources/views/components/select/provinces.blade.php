@props(['address' => ''])
<div class="row" style="margin-bottom: 20px; ">
    <div class="col-sm-4">
        <x-select name="address[provinces]" class="show-select-provinces">
            <option value="" selected>Tỉnh/Thành phố</option>
        </x-select>
    </div>
    <div class="col-sm-4">
        <x-select name="address[district]" class="show-select-district">
            <option value="" selected>Quận/Huyện</option>
        </x-select>
    </div>
    <div class="col-sm-4">
        <x-select name="address[wards]" class="show-select-wards">
            <option value="" selected>Phường/xã</option>
        </x-select>
    </div>
</div>
<div style="margin-bottom: 20px;">
    <x-input name="address[details]" value="{{ $address['details'] ?? '' }}" placeholder="địa chỉ cụ thể" />
</div>
@push('scripts')
    <script>
        const currentAddres = @js($address);

        function renderOptionsProvincesHtml(data, title, currentAddresName = null) {
            const html = [`<option value="" selected>${title}</option>`];

            html.push(data.map(function(rel) {
                return `<option value="${rel.name}" data-id="${rel.id}" ${rel.name === currentAddresName ? 'selected' : ''}>${rel.name} </option>`;
            }));
            return html.join('');
        }

        function initAddressForm(currentAddres) {
            const api = 'https://esgoo.net/api-tinhthanh/';
            const provinces = $('.show-select-provinces');
            const district = $('.show-select-district');
            const wards = $('.show-select-wards');
            $.get(api + '1/0.htm', function(res) {
                const html = renderOptionsProvincesHtml(res.data, 'Tỉnh/Thành phố', currentAddres.provinces);
                provinces.html(html);
                if (currentAddres.provinces) provinces.change();
            })
            provinces.on('change', function() {
                const id = $(this).find('option:selected').data('id');
                $.get(api + `2/${id}.htm`, function(res) {
                    const html = renderOptionsProvincesHtml(res.data, 'Quận/Huyện', currentAddres.district);
                    district.html(html)
                    district.change();
                })

            })

            district.on('change', function() {
                const id = $(this).find('option:selected').data('id');
                $.get(api + `3/${id}.htm`, function(res) {
                    const html = renderOptionsProvincesHtml(res.data, 'Phường/xã', currentAddres.wards);
                    wards.html(html)
                })
            })
        }
        $(document).ready(function() {
            initAddressForm(currentAddres);
        });
    </script>
@endpush

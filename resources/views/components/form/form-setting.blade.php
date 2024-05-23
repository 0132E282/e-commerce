<x-form :aciton="route('admin.settings.create-system')" :custom="true">
    <div class="row gap-5 ">
        <div class="col-4 ">
            <div class="row mb-3">
                <div class="col-3 d-flex justify-content-strat align-items-center ">
                    <label class="m-0 form-label" for="">Logo</label>
                </div>
                <div class="col">
                    <x-input.images name="logo" :valueImage="$settingSystem['logo'] ?? ''" />
                </div>
            </div>
            <div class="row  mb-5">
                <div class="col-3 d-flex justify-content-strat align-items-center ">
                    <label class="m-0 form-label" for="">Tiêu đề website</label>
                </div>
                <div class="col">
                    <x-input name="title_website" :value="$settingSystem['title_website'] ?? ''" />
                </div>
            </div>
            <div class="row  mb-5">
                <div class="col-3 d-flex justify-content-strat align-items-center ">
                    <label class="m-0 form-label" for="">Icon title</label>
                </div>
                <div class="col">
                    <x-input.images name="icon_title_website" :valueImage="$settingSystem['icon_title_website'] ?? ''" />
                </div>
            </div>
            <div class="row  mb-5">
                <div class="col-3 d-flex justify-content-strat align-items-center ">
                    <label class="m-0 form-label" for="">Ngôn ngữ</label>
                </div>
                <div class="col">
                    <x-select name="language">
                        <option value="em">Tiếng việt</option>
                        <option value="ev">Tiếng anh</option>
                    </x-select>
                </div>
            </div>
            <div class="row  mb-5">
                <div class="col-3 d-flex justify-content-strat align-items-center ">
                    <label class="m-0 form-label" for="">Thời gian</label>
                </div>
                <div class="col">
                    <x-select name="timezone">
                        <option value="vn">Tiếng việt</option>
                        <option value="en">Tiếng anh</option>
                    </x-select>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <x-button type="submit">Lưu cài đặt</x-button>
    </div>
</x-form>

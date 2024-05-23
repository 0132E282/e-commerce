<?php

namespace App\View\Components\header;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeaderTop extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $infoSetting = json_decode((new Setting())->where('key', '=', 'info_contact')->first()->value, true);
        $infoContactLeft  =  collect($infoSetting)->filter(fn ($info) => $info['location'] == 'left');
        $infoContactRight = collect($infoSetting)->filter(fn ($info) => $info['location'] == 'right');
        return view('components.header.header-top', ['infoContactLeft' => $infoContactLeft, 'infoContactRight' => $infoContactRight]);
    }
}

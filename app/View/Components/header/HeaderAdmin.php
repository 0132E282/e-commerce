<?php

namespace App\View\Components\header;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class HeaderAdmin extends Component
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
        $notifications =  Auth::user()->notifications->whereNull('read_at');
        return view('components.header.header-admin', ['notifications' => $notifications]);
    }
}

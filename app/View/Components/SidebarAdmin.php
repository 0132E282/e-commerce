<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarAdmin extends Component
{
    public $menuList = [];
    public function __construct()
    {
        $this->menuList = [
            [
                'title' => 'home',
                'icon' => ' far bi bi-house',
                'path' => route('admin-home'),
            ],
            [
                'title' => 'Category',
                'icon' => ' far bi bi-bookmark',
                'path' => route('table-category'),
                'children' => [
                    [
                        'title' => 'Category',
                        'icon' => 'far fa-circle ',
                        'path' => route('table-category'),
                    ],
                    [
                        'title' => 'create',
                        'icon' => 'far fa-circle nav-icon',
                        'path' => route('create-category'),
                    ],
                    [
                        'title' => 'trash',
                        'icon' => 'far fa-circle nav-icon',
                        'path' => route('trash-category'),
                    ]
                ]
            ],
            [
                'title' => 'menus',
                'icon' => ' bi bi-list',
                'path' => route('table-menus'),
                'children' => [
                    [
                        'title' => 'menus',
                        'icon' => 'far fa-circle ',
                        'path' => route('table-menus'),
                    ],
                    [
                        'title' => 'create',
                        'icon' => 'far fa-circle ',
                        'path' => route('create-menus'),
                    ],
                    [
                        'title' => 'trash',
                        'icon' => 'far fa-circle ',
                        'path' => route('trash-menus'),
                    ]
                ]
            ],
            [
                'title' => 'e-commerce',
                'icon' => ' far bi bi-box2',
                'path' => '',
                'children' => [
                    [
                        'title' => 'products',
                        'icon' => 'far fa-circle ',
                        'path' => route('product-page'),
                    ],
                    [
                        'title' => 'create',
                        'icon' => 'far fa-circle ',
                        'path' => route('create-product'),
                    ],
                    [
                        'title' => 'trash',
                        'icon' => 'far fa-circle ',
                        'path' => route('trash-product'),
                    ]
                ]
            ],
            [
                'title' => 'Mail',
                'icon' => ' far bi bi-envelope',
                'path' => route('mail'),
                'children' => [
                    [
                        'title' => 'inbox',
                        'icon' => 'far fa-circle ',
                        'path' => route('mail'),
                    ]
                ]
            ],
            [
                'title' => 'slider',
                'icon' => ' far bi bi-sliders',
                'path' => route('slider'),
                'children' => [
                    [
                        'title' => 'slider',
                        'icon' => 'far fa-circle ',
                        'path' => route('slider'),
                    ],
                    [
                        'title' => 'create',
                        'icon' => 'far fa-circle ',
                        'path' => route('create-slider'),
                    ]
                ]
            ]
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components/sidebar/sidebar-admin');
    }
}

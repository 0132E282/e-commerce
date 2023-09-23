<?php

namespace App\View\Components\sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class SidebarAdmin extends Component
{
    public $menuList = [];
    protected $access;
    public function __construct()
    {
        $this->access = config('permissions.access');
        $this->menuList = [
            [
                'title' => 'home',
                'icon' => 'far bi bi-house',
                'path' => route('admin-home'),
                'key_code' => 'MANAGER_ADMIN',
            ],
            [
                'title' => 'Category',
                'icon' => ' far bi bi-bookmark',
                'path' => route('table-category'),
                'key_code' => 'VIEW_CATEGORY',
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
                'key_code' => 'VIEW_MENUS',
                'children' => [
                    [
                        'title' => 'menus',
                        'icon' => 'far fa-circle ',
                        'key_code' => 'VIEW_MENUS',
                        'path' => route('table-menus'),
                    ],
                    [
                        'title' => 'create',
                        'icon' => 'far fa-circle ',
                        'path' => route('create-menus'),
                        'key_code' => 'CREATE_MENUS',
                    ],
                    [
                        'title' => 'trash',
                        'icon' => 'far fa-circle ',
                        'path' => route('trash-menus'),
                        'key_code' => 'VIEW_TRASH_MENUS',
                    ]
                ]
            ],
            [
                'title' => 'e-commerce',
                'icon' => ' far bi bi-box2',
                'path' => '',
                'key_code' => 'VIEW_PRODUCT',
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
                        'title' => 'order',
                        'icon' => 'far fa-circle ',
                        'path' => route('orders'),
                    ],
                    [
                        'title' => 'trash',
                        'icon' => 'far fa-circle ',
                        'path' => route('trash-product'),
                    ],

                ]
            ],
            [
                'title' => 'Mail',
                'icon' => ' far bi bi-envelope',
                'path' => route('mail'),
                'key_code' => 'VIEW_MAIL',
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
                'key_code' => 'VIEW_SLIDER',
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
                    ],
                    [
                        'title' => 'trash',
                        'icon' => 'far fa-circle ',
                        'path' => route('trash-slider'),
                    ]
                ]
            ],
            [
                'title' => 'user',
                'icon' => 'far bi bi-person-fill',
                'path' => route('slider'),
                'key_code' => 'VIEW_USER',
                'children' => [
                    [
                        'title' => 'user',
                        'icon' => 'far fa-circle ',
                        'path' => route('user'),
                    ],
                    [
                        'title' => 'create',
                        'icon' => 'far fa-circle ',
                        'path' => route('create-user'),
                    ], [
                        'title' => 'profile',
                        'icon' => 'far fa-circle ',
                        'path' => route('update-user', ['id' => Auth::id()]),
                    ],
                    [
                        'title' => 'trash',
                        'icon' => 'far fa-circle ',
                        'path' => route('trash-user'),
                    ]

                ]
            ],
            [
                'title' => 'roles',
                'icon' => ' far bi bi-person-lines-fill',
                'path' => route('roles'),
                'key_code' => 'VIEW_ROLES',
                'children' => [
                    [
                        'title' => 'roles',
                        'icon' => 'far fa-circle ',
                        'path' => route('roles'),
                    ],
                    [
                        'title' => 'create',
                        'icon' => 'far fa-circle ',
                        'path' => route('create-role'),
                    ], [
                        'title' => 'permissions',
                        'icon' => 'far fa-circle ',
                        'path' => route('create-permissions'),
                    ],
                    [
                        'title' => 'trash',
                        'icon' => 'far fa-circle ',
                        'path' => route('trash-role'),
                    ],
                ]
            ],
            [
                'title' => 'settings',
                'icon' => ' far bi bi-gear-fill',
                'path' => route('slider'),
                'key_code' => 'MANAGER_ADMIN',
                'children' => [
                    [
                        'title' => 'settings',
                        'icon' => 'far fa-circle ',
                        'path' => route('setting'),
                    ],
                ]
            ],
            [
                'title' => 'logout',
                'icon' => 'bi bi-box-arrow-left',
                'method' => 'post',
                'key_code' => 'MANAGER_ADMIN',
                'path' => route('logout')
            ]
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $user = Auth::user();
        return view('components/sidebar/sidebar-admin', ['user' => $user]);
    }
}

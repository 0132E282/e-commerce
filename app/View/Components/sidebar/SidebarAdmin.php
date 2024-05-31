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
                'title' => 'Thống kê',
                'icon' => 'bi bi-house',
                'path' => route('admin-home'),
                'key_code' => 'VIEW_ADMIN',
            ],
            [
                'title' => 'Bán hàng',
                'icon' => 'bi bi-bag-plus',
                'path' => route('admin.order.index'),
                'key_code' => 'VIEW_ORDERS',
                'children' => [
                    [
                        'title' => 'Đơn hàng',
                        'icon' => 'far fa-circle ',
                        'key_code' => 'VIEW_ORDERS',
                        'path' => route('admin.order.index'),
                    ],

                ]
            ],
            [
                'title' => 'Giao diện',
                'icon' => 'bi bi-brush',
                'path' => route('admin.menus.index'),
                'key_code' => 'VIEW_MENUS',
                'children' => [
                    [
                        'title' => 'menus',
                        'icon' => 'far fa-circle ',
                        'key_code' => 'VIEW_MENUS',
                        'path' => route('admin.menus.index'),
                    ],
                    [
                        'title' => 'slider',
                        'icon' => 'far fa-circle ',
                        'path' => route('admin.slider.index'),
                    ],
                ]
            ],
            [
                'title' => 'Sản phẩm',
                'icon' => ' far bi bi-box2',
                'path' => '',
                'key_code' => 'VIEW_PRODUCT',
                'children' => [
                    [
                        'title' => 'Tất cả',
                        'icon' => 'far fa-circle ',
                        'path' => route('admin.products.index'),
                    ],
                    [
                        'title' => 'Tảo mới',
                        'icon' => 'far fa-circle ',
                        'path' => route('admin.products.create'),
                    ],
                    [
                        'title' => 'Danh mục',
                        'icon' => 'far fa-circle ',
                        'path' => route('admin.category.table'),
                        'key_code' => 'VIEW_CATEGORY',
                    ],
                    [
                        'title' => 'Đánh giá ',
                        'icon' => 'far fa-circle ',
                        'path' => route('admin.reviews.index'),
                        'key_code' => 'VIEW_CATEGORY',
                    ],
                    [
                        'title' => 'Nhản hiệu',
                        'icon' => 'far fa-circle ',
                        'path' => route('admin.brands.index'),
                        'key_code' => 'VIEW_CATEGORY',
                    ],
                ]
            ],
            [
                'title' => 'Người dùng',
                'icon' => 'far bi bi-person-fill',
                'path' => '',
                'key_code' => 'VIEW_USER',
                'children' => [
                    [
                        'title' => 'Tài khoản',
                        'icon' => 'far fa-circle ',
                        'path' => route('admin.users.index'),
                    ],
                    [
                        'title' => 'Quyền người dùng',
                        'icon' => 'far fa-circle ',
                        'path' => route('admin.roles.index'),
                    ],
                ]
            ],
            [
                'title' => 'Thiết lập',
                'icon' => ' far bi bi-gear-fill',
                'path' => '',
                'key_code' => 'VIEW_ANY_SETTING',
                'children' => [
                    [
                        'title' => 'Hệ thống',
                        'icon' => 'far fa-circle ',
                        'path' => route('admin.settings.system'),
                    ],
                    [
                        'title' => 'Thông tin liên hệ',
                        'icon' => 'far fa-circle ',
                        'path' => route('admin.settings.info'),
                    ],
                    [
                        'title' => 'Vai trò',
                        'icon' => 'far fa-circle ',
                        'path' => route('admin.permissions.create'),
                    ],
                    [
                        'title' => 'Thanh toán',
                        'icon' => 'far fa-circle ',
                        'path' => route('admin.settings.payment'),
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

<?php
return [
    'access' => [
        'product' => [
            'policy' => 'App\Policies\ProductPolicy',
            'config' => [
                'CREATE_PRODUCT' => [
                    'name' =>  'CREATE_PRODUCT',
                    'key_code' => 'create_product',
                    'action' => 'create',
                ],
                'UPDATE_PRODUCT' => [
                    'name' => 'UPDATE_PRODUCT',
                    'key_code' => 'update_product',
                    'action' => 'update',
                ],
                'DELETE_PRODUCT' => [
                    'name' => 'DELETE_PRODUCT',
                    'key_code' => 'delete_product',
                    'action' => 'delete',
                ],
                'VIEW_PRODUCT' => [
                    'name' => 'VIEW_PRODUCT',
                    'key_code' => 'show_product',
                    'action' => 'view',
                ],
                'RESTORE_PRODUCT' => [
                    'name' => 'RESTORE_PRODUCT',
                    'key_code' => 'restore_product',
                    'action' => 'restore',
                ],
                'DESTROY_PRODUCT' => [
                    'name' => 'DESTROY_PRODUCT',
                    'key_code' => 'destroy_product',
                    'action' => 'forceDelete',
                ],
                'VIEW_TRASH_PRODUCT' => [
                    'name' =>  'VIEW_TRASH_PRODUCT',
                    'key_code' => 'view_trash_product',
                    'action' => 'viewTrash',
                ],
            ]
        ],
        'brands' => [
            'policy' => 'App\Policies\BrandsPolicy',
            'config' => [
                'CREATE_BRANDS' => [
                    'name' =>  'CREATE_BRANDS',
                    'key_code' => 'create_brands',
                    'action' => 'create',
                ],
                'UPDATE_BRANDS' => [
                    'name' => 'UPDATE_BRANDS',
                    'key_code' => 'update_brands',
                    'action' => 'update',
                ],
                'DELETE_BRANDS' => [
                    'name' => 'DELETE_BRANDS',
                    'key_code' => 'delete_brands',
                    'action' => 'delete',
                ],
                'VIEW_BRANDS' => [
                    'name' => 'VIEW_BRANDS',
                    'key_code' => 'show_brands',
                    'action' => 'view',
                ],
                'RESTORE_BRANDS' => [
                    'name' => 'RESTORE_BRANDS',
                    'key_code' => 'restore_brands',
                    'action' => 'restore',
                ],
                'DESTROY_BRANDS' => [
                    'name' => 'DESTROY_BRANDS',
                    'key_code' => 'destroy_brands',
                    'action' => 'forceDelete',
                ],
                'VIEW_TRASH_BRANDS' => [
                    'name' =>  'VIEW_TRASH_BRANDS',
                    'key_code' => 'view_trash_brands',
                    'action' => 'viewTrash',
                ],
            ]
        ],
        'user' => [
            'policy' => 'App\Policies\UsersPolicy',
            'config' => [
                'CREATE_USER' => [
                    'name' =>  'CREATE_USER',
                    'key_code' => 'create_users',
                    'action' => 'create',
                ],
                'UPDATE_USER' => [
                    'name' => 'UPDATE_USER',
                    'key_code' => 'update_users',
                    'action' => 'update',
                ],
                'DELETE_USER' => [
                    'name' => 'DELETE_USER',
                    'key_code' => 'delete_users',
                    'action' => 'delete',
                ],
                'VIEW_USER' => [
                    'name' => 'VIEW_USER',
                    'key_code' => 'show_users',
                    'action' => 'view',
                ],
                'RESTORE_USER' => [
                    'name' => 'RESTORE_USER',
                    'key_code' => 'restore_users',
                    'action' => 'restore',
                ],
                'DESTROY_USER' => [
                    'name' => 'DESTROY_USER',
                    'key_code' => 'destroy_users',
                    'action' => 'forceDelete',
                ],
                'VIEW_TRASH_USER' => [
                    'name' =>  'VIEW_TRASH_USER',
                    'key_code' => 'view_trash_users',
                    'action' => 'viewTrash',
                ]
            ]
        ],
        'tags' => [
            'policy' => 'App\Policies\UsersPolicy',
            'config' => [
                'CREATE_TAGS' => [
                    'name' =>  'CREATE_TAGS',
                    'key_code' => 'create_tags',
                    'action' => 'create',
                ],
                'UPDATE_TAGS' => [
                    'name' => 'UPDATE_TAGS',
                    'key_code' => 'update_tags',
                    'action' => 'update',
                ],
                'DELETE_TAGS' => [
                    'name' => 'DELETE_TAGS',
                    'key_code' => 'delete_tags',
                    'action' => 'delete',
                ],
                'VIEW_TAGS' => [
                    'name' => 'VIEW_TAGS',
                    'key_code' => 'show_tags',
                    'action' => 'view',
                ],
                'RESTORE_TAGS' => [
                    'name' => 'RESTORE_TAGS',
                    'key_code' => 'restore_tags',
                    'action' => 'restore',
                ],
                'DESTROY_TAGS' => [
                    'name' => 'DESTROY_TAGS',
                    'key_code' => 'destroy_tags',
                    'action' => 'forceDelete',
                ],
                'VIEW_TRASH_TAGS' => [
                    'name' =>  'VIEW_TRASH_TAGS',
                    'key_code' => 'view_trash_tags',
                    'action' => 'viewTrash',
                ],
            ]
        ],
        'category' => [
            'policy' => 'App\Policies\CategoryPolicy',
            'config' => [
                'CREATE_CATEGORY' => [
                    'name' => 'CREATE_CATEGORY',
                    'key_code' => 'create_category',
                    'action' => 'create',
                ],
                'UPDATE_CATEGORY' => [
                    'name' => 'UPDATE_CATEGORY',
                    'key_code' => 'update_category',
                    'action' => 'update',
                ],
                'DELETE_CATEGORY' => [
                    'name' => 'DELETE_CATEGORY',
                    'key_code' => 'delete_category',
                    'action' => 'delete',
                ],
                'VIEW_CATEGORY' => [
                    'name' => 'VIEW_CATEGORY',
                    'key_code' => 'show_category',
                    'action' => 'view',
                ],
                'RESTORE_CATEGORY' => [
                    'name' => 'RESTORE_CATEGORY',
                    'key_code' => 'restore_category',
                    'action' => 'restore',
                ],
                'DESTROY_CATEGORY' => [
                    'name' => 'DESTROY_CATEGORY',
                    'key_code' => 'destroy_category',
                    'action' => 'forceDelete',
                ],
                'VIEW_TRASH_CATEGORY' => [
                    'name' =>  'VIEW_TRASH_CATEGORY',
                    'key_code' => 'view_trash_category',
                    'action' => 'viewTrash',
                ],
            ]
        ],
        'roles' => [
            'policy' => 'App\Policies\RolesPolicy',
            'config' => [
                'CREATE_ROLES' => [
                    'name' => 'CREATE_ROLES',
                    'key_code' => 'create_role',
                    'action' => 'create',
                ],
                'UPDATE_ROLES' => [
                    'name' => 'UPDATE_ROLES',
                    'key_code' => 'update_role',
                    'action' => 'update',
                ],
                'DELETE_ROLES' => [
                    'name' => 'DELETE_ROLES',
                    'key_code' => 'delete_role',
                    'action' => 'delete',
                ],
                'VIEW_ROLES' => [
                    'name' => 'VIEW_ROLES',
                    'key_code' => 'show_role',
                    'action' => 'view',
                ],
                'RESTORE_ROLES' => [
                    'name' => 'RESTORE_ROLES',
                    'key_code' => 'restore_role',
                    'action' => 'restore',
                ],
                'DESTROY_ROLES' => [
                    'name' => 'DESTROY_ROLES',
                    'key_code' => 'destroy_role',
                    'action' => 'forceDelete',
                ],
                'VIEW_TRASH_ROLES' => [
                    'name' =>  'VIEW_TRASH_ROLES',
                    'key_code' => 'view_trash_role',
                    'action' => 'viewTrash',
                ],
            ]
        ],
        'slider' => [
            'policy' => 'App\Policies\SliderPolicy',
            'config' => [
                'CREATE_SLIDER' => [
                    'name' => 'CREATE_SLIDER',
                    'key_code' => 'create_sliders',
                    'action' => 'create',
                ],
                'UPDATE_SLIDER' => [
                    'name' => 'UPDATE_SLIDER',
                    'key_code' => 'update_sliders',
                    'action' => 'update',
                ],
                'DELETE_SLIDER' => [
                    'name' => 'DELETE_SLIDER',
                    'key_code' => 'delete_sliders',
                    'action' => 'delete',
                ],
                'VIEW_SLIDER' => [
                    'name' => 'VIEW_SLIDER',
                    'key_code' => 'show_sliders',
                    'action' => 'view',
                ],
                'RESTORE_SLIDER' => [
                    'name' => 'RESTORE_SLIDER',
                    'key_code' => 'restore_sliders',
                    'action' => 'restore',
                ],
                'DESTROY_SLIDER' => [
                    'name' => 'DESTROY_SLIDER',
                    'key_code' => 'destroy_sliders',
                    'action' => 'forceDelete',
                ],
                'VIEW_TRASH_SLIDER' => [
                    'name' =>  'VIEW_TRASH_SLIDER',
                    'key_code' => 'view_trash_sliders',
                    'action' => 'viewTrash',
                ],
            ]
        ],
        'menus' => [
            'policy' => 'App\Policies\MenusPolicy',
            'config' => [
                'CREATE_MENUS' => [
                    'name' => 'CREATE_MENUS',
                    'key_code' => 'create_menu',
                    'action' => 'create',
                ],
                'UPDATE_MENUS' => [
                    'name' => 'UPDATE_MENUS',
                    'key_code' => 'update_menu',
                    'action' => 'update',
                ],
                'DELETE_MENUS' => [
                    'name' => 'DELETE_MENUS',
                    'key_code' => 'delete_menu',
                    'action' => 'delete',
                ],
                'VIEW_MENUS' => [
                    'name' => 'VIEW_MENUS',
                    'key_code' => 'show_menu',
                    'action' => 'view',
                ],
                'RESTORE_MENUS' => [
                    'name' => 'RESTORE_MENUS',
                    'key_code' => 'restore_menu',
                    'action' => 'restore',
                ],
                'DESTROY_MENUS' => [
                    'name' => 'DESTROY_MENUS',
                    'key_code' => 'destroy_menu',
                    'action' => 'forceDelete',
                ],
                'VIEW_TRASH_MENUS' => [
                    'name' =>  'VIEW_TRASH_MENUS',
                    'key_code' => 'view_trash_menu',
                    'action' => 'viewTrash',
                ],
            ]
        ],
        'orders' => [
            'policy' => 'App\Policies\OrdersPolicy',
            'config' => [
                'CREATE_ORDERS' => [
                    'name' => 'CREATE_ORDERS',
                    'key_code' => 'create_orders',
                    'action' => 'create',
                ],
                'UPDATE_ORDERS' => [
                    'name' => 'UPDATE_ORDERS',
                    'key_code' => 'update_orders',
                    'action' => 'update',
                ],
                'DELETE_ORDERS' => [
                    'name' => 'DELETE_ORDERS',
                    'key_code' => 'delete_orders',
                    'action' => 'delete',
                ],
                'VIEW_ORDERS' => [
                    'name' => 'VIEW_ORDERS',
                    'key_code' => 'show_orders',
                    'action' => 'view',
                ],
                'RESTORE_ORDERS' => [
                    'name' => 'RESTORE_ORDERS',
                    'key_code' => 'restore_orders',
                    'action' => 'restore',
                ],
                'DESTROY_ORDERS' => [
                    'name' => 'DESTROY_ORDERS',
                    'key_code' => 'destroy_orders',
                    'action' => 'forceDelete',
                ],
                'VIEW_TRASH_ORDERS' => [
                    'name' =>  'VIEW_TRASH_ORDERS',
                    'key_code' => 'view_trash_orders',
                    'action' => 'viewTrash',
                ],
            ]
        ],
        'setting' => [
            'policy' => 'App\Policies\SettingPolicy',
            'config' => [
                'VIEW_ANY_SETTING' => [
                    'name' => 'VIEW_ANY_SETTING',
                    'key_code' => 'view_any_setting',
                    'action' => 'viewAny',
                ],
                'PAYMENT_SETTING' => [
                    'name' => 'PAYMENT_SETTING',
                    'key_code' => 'payment_setting',
                    'action' => 'payment',
                ],
                'PERMISSIONS_SETTING' => [
                    'name' => 'PERMISSIONS_SETTING',
                    'key_code' => 'permissions_setting',
                    'action' => 'permissions',
                ],
                'CONTACT_SETTING' => [
                    'name' => 'CONTACT_SETTING',
                    'key_code' => 'contact_setting',
                    'action' => 'contact',
                ],
                'SYSTEM_SETTING' => [
                    'name' => 'SYSTEM_SETTING',
                    'key_code' => 'system_setting',
                    'action' => 'system',
                ],
            ]
        ],
        'admin' => [
            'policy' => 'App\Policies\AdminPolicy',
            'config' => [
                'VIEW_ADMIN' => [
                    'name' => 'VIEW_ADMIN',
                    'key_code' => 'show_admin',
                    'action' => 'view',
                ],
            ]
        ],
        'reviews' => [
            'policy' => 'App\Policies\ReviewsPolicy',
            'config' => [
                'VIEW_REVIEWS' => [
                    'name' => 'VIEW_REVIEWS',
                    'key_code' => 'show_admin',
                    'action' => 'view',
                ],
                'REPLY_REVIEWS' => [
                    'name' => 'REPLY_REVIEWS',
                    'key_code' => 'reply_reviews',
                    'action' => 'reply',
                ],
                'DELETE_REVIEWS' => [
                    'name' => 'DELETE_REVIEWS',
                    'key_code' => 'delete_reviews',
                    'action' => 'delete',
                ],
            ]
        ],
    ],
];

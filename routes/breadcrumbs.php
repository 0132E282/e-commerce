<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Illuminate\Routing\Route;

// Home

Breadcrumbs::for('admin-home', function (BreadcrumbTrail $trail) {
    $trail->push('Admin', route('admin-home'));
});
// category
Breadcrumbs::for('admin.category.table', function (BreadcrumbTrail $trail) {
    $trail->parent('admin-home');
    $trail->push('category', route('admin.category.table'));
});

Breadcrumbs::for('admin.category.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.category.table');
    $trail->push('create', route('admin.category.create'));
});

Breadcrumbs::for('admin.category.trash', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.category.table');
    $trail->push('trash', route('admin.category.trash'));
});

Breadcrumbs::for('admin.category.update', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('admin.category.table');
    $trail->push($category->slug_category ?? "Update", route('admin.category.update', ['id' => $category->id_category ?? 0]));
});
// end category

Breadcrumbs::for('table-menus', function (BreadcrumbTrail $trail) {
    $trail->parent('admin-home');
    $trail->push('menus', route('table-menus'));
});
Breadcrumbs::for('create-menus', function (BreadcrumbTrail $trail) {
    $trail->parent('table-menus');
    $trail->push('create', route('create-menus'));
});
Breadcrumbs::for('trash-menus', function (BreadcrumbTrail $trail) {
    $trail->parent('table-menus');
    $trail->push('trash', route('trash-menus'));
});
Breadcrumbs::for('update-menus', function (BreadcrumbTrail $trail, $menus) {
    $trail->parent('table-menus');
    $trail->push($menus->name_menus ?? "Update", route('update-menus', ['id' => $$menus->id_menus ?? 0]));
});
// end menu

// product
Breadcrumbs::for('admin.products.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin-home');
    $trail->push('product', route('admin.products.index'));
});

Breadcrumbs::for('admin.products.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.products.index');
    $trail->push('create', route('admin.products.create'));
});
Breadcrumbs::for('order.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.products.index');
    $trail->push('tất cả đơn hàng ', route('order.index'));
});
Breadcrumbs::for('product.trash', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.products.index');
    $trail->push('trash', route('product.trash'));
});
Breadcrumbs::for('product.update', function (BreadcrumbTrail $trail, $product) {
    $trail->parent('table-menus');
    $trail->push("cập nhập :", route('product.update', ['id' => $product->id_product ?? 0]));
});
// slider
Breadcrumbs::for('slider', function (BreadcrumbTrail $trail) {
    $trail->parent('admin-home');
    $trail->push('slider', route('slider'));
});
Breadcrumbs::for('trash-slider', function (BreadcrumbTrail $trail) {
    $trail->parent('admin-home');
    $trail->push('trash', route('trash-slider'));
});
Breadcrumbs::for('create-slider', function (BreadcrumbTrail $trail) {
    $trail->parent('admin-home');
    $trail->push('create slider', route('create-slider'));
});
Breadcrumbs::for('update-slider', function (BreadcrumbTrail $trail, $slider) {
    $trail->parent('table-menus');
    $trail->push($slider->name_slider ?? "Update", route('update-slider', ['id' => $slider->id_slider ?? 0]));
});
// setting
Breadcrumbs::for('setting', function (BreadcrumbTrail $trail) {
    $trail->parent('admin-home');
    $trail->push('setting', route('setting'));
});

// user
Breadcrumbs::for('user', function (BreadcrumbTrail $trail) {
    $trail->parent('admin-home');
    $trail->push('user', route('user'));
});
Breadcrumbs::for('create-user', function (BreadcrumbTrail $trail) {
    $trail->parent('user');
    $trail->push('create user', route('create-user'));
});
Breadcrumbs::for('update-user', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('user');
    $trail->push($user->name ?? "Update", route('update-user', ['id' => $user->name ?? 0]));
});
Breadcrumbs::for('trash-user', function (BreadcrumbTrail $trail) {
    $trail->parent('user');
    $trail->push('trash', route('trash-user'));
});
// roles 
Breadcrumbs::for('roles', function (BreadcrumbTrail $trail) {
    $trail->parent('admin-home');
    $trail->push('roles', route('roles'));
});
Breadcrumbs::for('create-role', function (BreadcrumbTrail $trail) {
    $trail->parent('roles');
    $trail->push('create role', route('create-role'));
});
Breadcrumbs::for('update-role', function (BreadcrumbTrail $trail, $role) {
    $trail->parent('roles');
    $trail->push('update role', route('update-role', ['id' => $role]));
});
Breadcrumbs::for('trash-role', function (BreadcrumbTrail $trail) {
    $trail->parent('roles');
    $trail->push('trash role', route('trash-role'));
});
// permission
Breadcrumbs::for('create-permissions', function (BreadcrumbTrail $trail) {
    $trail->parent('roles');
    $trail->push('create permission', route('create-permissions'));
});
Breadcrumbs::for('update-permissions', function (BreadcrumbTrail $trail, $permissions) {
    $trail->parent('roles');
    $trail->push('update permissions', route('update-permissions', ['id' => $permissions]));
});

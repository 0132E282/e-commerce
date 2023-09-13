<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
// Home

Breadcrumbs::for('admin-home', function (BreadcrumbTrail $trail) {
    $trail->push('Admin', route('admin-home'));
});
// category
Breadcrumbs::for('table-category', function (BreadcrumbTrail $trail) {
    $trail->parent('admin-home');
    $trail->push('category', route('table-category'));
});

Breadcrumbs::for('create-category', function (BreadcrumbTrail $trail) {
    $trail->parent('table-category');
    $trail->push('create', route('create-category'));
});

Breadcrumbs::for('trash-category', function (BreadcrumbTrail $trail) {
    $trail->parent('table-category');
    $trail->push('trash', route('trash-category'));
});

Breadcrumbs::for('update-category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('table-category');
    $trail->push($category->slug_category ?? "Update", route('update-category', ['id' => $category->id_category ?? 0]));
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
Breadcrumbs::for('product-page', function (BreadcrumbTrail $trail) {
    $trail->parent('admin-home');
    $trail->push('product', route('product-page'));
});

Breadcrumbs::for('create-product', function (BreadcrumbTrail $trail) {
    $trail->parent('product-page');
    $trail->push('create', route('create-product'));
});
Breadcrumbs::for('trash-product', function (BreadcrumbTrail $trail) {
    $trail->parent('product-page');
    $trail->push('trash', route('trash-product'));
});
Breadcrumbs::for('update-product', function (BreadcrumbTrail $trail, $product) {
    $trail->parent('table-menus');
    $trail->push($product->slug_product ?? "Update", route('update-product', ['id' => $product->id_product ?? 0]));
});
// slider
Breadcrumbs::for('create-slider', function (BreadcrumbTrail $trail) {
    $trail->parent('admin-home');
    $trail->push('create slider', route('create-slider'));
});

<?php

use App\Models\Admin\Region;
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

//Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('home'));
});

Breadcrumbs::for('login', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Вход', route('login'));
});

Breadcrumbs::for('register', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Регистрация', route('register'));
});

// Dashboard
Breadcrumbs::for('admin.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push(__('app.Dashboard'), route('admin.dashboard'));
});

Breadcrumbs::for('profile.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('app.Profile'), route('profile.edit'));
});

// Users

Breadcrumbs::for('admin.users.index', function (BreadcrumbTrail $crumbs) {
    $crumbs->parent('admin.dashboard');
    $crumbs->push('Пользователи', route('admin.users.index'));
});

Breadcrumbs::for('admin.users.create', function (BreadcrumbTrail $crumbs) {
    $crumbs->parent('admin.users.index');
    $crumbs->push('Добавить пользователя', route('admin.users.create'));
});

Breadcrumbs::for('admin.users.show', function (BreadcrumbTrail $crumbs, User $user) {
    $crumbs->parent('admin.users.index');
    $crumbs->push($user->name, route('admin.users.show', $user));
});

Breadcrumbs::for('admin.users.edit', function (BreadcrumbTrail $crumbs, User $user) {
    $crumbs->parent('admin.users.show', $user);
    $crumbs->push('Редактировать', route('admin.users.edit', $user));
});

// Regions

Breadcrumbs::for('admin.regions.index', function (BreadcrumbTrail $crumbs) {
    $crumbs->parent('admin.dashboard');
    $crumbs->push('Регионы', route('admin.regions.index'));
});

Breadcrumbs::for('admin.regions.create', function (BreadcrumbTrail $crumbs) {
    $crumbs->parent('admin.regions.index');
    $crumbs->push('Создать', route('admin.regions.create'));
});

Breadcrumbs::for('admin.regions.show', function (BreadcrumbTrail $crumbs, Region $region) {
    if ($parent = $region->parent) {
        $crumbs->parent('admin.regions.show', $parent);
    } else {
        $crumbs->parent('admin.regions.index');
    }
    $crumbs->push($region->name, route('admin.regions.show', $region));
});

Breadcrumbs::for('admin.regions.edit', function (BreadcrumbTrail $crumbs, Region $region) {
    $crumbs->parent('admin.regions.show', $region);
    $crumbs->push('Редактировать', route('admin.regions.edit', $region));
});

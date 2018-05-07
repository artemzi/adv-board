<?php

Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});

Breadcrumbs::register('login', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Login', route('login'));
});

Breadcrumbs::register('register', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Register', route('register'));
});

Breadcrumbs::register('password.request', function ($breadcrumbs) {
    $breadcrumbs->parent('login');
    $breadcrumbs->push('Reset Password', route('password.request'));
});

Breadcrumbs::register('password.reset', function ($breadcrumbs) {
    $breadcrumbs->parent('password.request');
    $breadcrumbs->push('Change', route('password.reset'));
});

Breadcrumbs::register('cabinet', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Cabinet', route('cabinet'));
});

Breadcrumbs::register('admin.home', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Admin', route('admin.home'));
});

Breadcrumbs::register('admin.users.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');
    $breadcrumbs->push('Users', route('admin.users.index'));
});

Breadcrumbs::register('admin.users.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.users.index');
    $breadcrumbs->push('Create', route('admin.users.create'));
});

Breadcrumbs::register('admin.users.show', function ($breadcrumbs, \Board\User $user) {
    $breadcrumbs->parent('admin.users.index');
    $breadcrumbs->push($user->name, route('admin.users.show'));
});

Breadcrumbs::register('admin.users.edit', function ($breadcrumbs, \Board\User $user) {
    $breadcrumbs->parent('admin.users.show', $user);
    $breadcrumbs->push('Edit', route('admin.users.edit', $user));
});
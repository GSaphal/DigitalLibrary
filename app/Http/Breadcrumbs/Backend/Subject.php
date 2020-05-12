<?php

Breadcrumbs::register('admin.subjects.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.subjects.management'), route('admin.subjects.index'));
});

Breadcrumbs::register('admin.subjects.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.subjects.index');
    $breadcrumbs->push(trans('menus.backend.subjects.create'), route('admin.subjects.create'));
});

Breadcrumbs::register('admin.subjects.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.subjects.index');
    $breadcrumbs->push(trans('menus.backend.subjects.edit'), route('admin.subjects.edit', $id));
});

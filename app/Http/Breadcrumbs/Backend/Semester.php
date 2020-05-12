<?php

Breadcrumbs::register('admin.semesters.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.semesters.management'), route('admin.semesters.index'));
});

Breadcrumbs::register('admin.semesters.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.semesters.index');
    $breadcrumbs->push(trans('menus.backend.semesters.create'), route('admin.semesters.create'));
});

Breadcrumbs::register('admin.semesters.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.semesters.index');
    $breadcrumbs->push(trans('menus.backend.semesters.edit'), route('admin.semesters.edit', $id));
});

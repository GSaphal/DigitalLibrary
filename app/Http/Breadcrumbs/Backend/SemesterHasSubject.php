<?php

Breadcrumbs::register('admin.semesterhassubjects.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.semesterhassubjects.management'), route('admin.semesterhassubjects.index'));
});

Breadcrumbs::register('admin.semesterhassubjects.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.semesterhassubjects.index');
    $breadcrumbs->push(trans('menus.backend.semesterhassubjects.create'), route('admin.semesterhassubjects.create'));
});

Breadcrumbs::register('admin.semesterhassubjects.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.semesterhassubjects.index');
    $breadcrumbs->push(trans('menus.backend.semesterhassubjects.edit'), route('admin.semesterhassubjects.edit', $id));
});

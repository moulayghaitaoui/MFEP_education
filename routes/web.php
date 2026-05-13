<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');



Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/institutes', function () {
    return view('admin.institutes');
})->name('admin.institutes');

Route::get('/admin/analytics', function () {
    return view('admin.analytics');
})->name('admin.analytics');

Route::get('/admin/activity', function () {
    return view('admin.activity');
})->name('admin.activity');

Route::get('/direction', function () {
    return view('direction.dashboard');
})->name('direction.dashboard');

Route::get('/direction/performance', function () {
    return view('direction.performance');
})->name('direction.performance');

Route::get('/direction/institutes', function () {
    return view('direction.institutes');
})->name('direction.institutes');

Route::get('/direction/teachers', function () {
    return view('direction.teachers');
})->name('direction.teachers');

Route::get('/direction/groups', function () {
    return view('direction.groups');
})->name('direction.groups');

Route::get('/direction/schedules', function () {
    return view('direction.schedules');
})->name('direction.schedules');

Route::get('/direction/attendance', function () {
    return view('direction.attendance');
})->name('direction.attendance');

Route::get('/direction/exams', function () {
    return view('direction.exams');
})->name('direction.exams');

Route::get('/direction/reports', function () {
    return view('direction.reports');
})->name('direction.reports');

Route::get('/direction/institutes', function () {
    return view('direction.institutes');
})->name('direction.institutes');

Route::get('/direction/notifications', function () {
    return view('direction.notifications');
})->name('direction.notifications');

Route::get('/teacher', function () {
    return view('teacher.dashboard');
})->name('teacher.dashboard');

Route::get('/teacher/lessons', function () {
    return view('teacher.lessons.index');
})->name('teacher.lessons');

Route::get('/teacher/lessons/builder', function () {
    return view('teacher.lessons.builder');
})->name('teacher.lessons.builder');

Route::get('/teacher/create-lesson', function () {
    return view('teacher.create-lesson');
})->name('teacher.create-lesson');

Route::get('/teacher/sessions', function () {
    return view('teacher.sessions');
})->name('teacher.sessions');

Route::get('/teacher/quizzes', function () {
    return view('teacher.quizzes.index');
})->name('teacher.quizzes');

Route::get('/teacher/quizzes/create', function () {
    return view('teacher.quizzes.create');
})->name('teacher.quizzes.create');

Route::get('/teacher/quizzes/preview', function () {
    return view('teacher.quizzes.preview');
})->name('teacher.quizzes.preview');

Route::get('/teacher/students', function () {
    return view('teacher.students');
})->name('teacher.students');

Route::get('/teacher/results', function () {
    return view('teacher.results');
})->name('teacher.results');

Route::get('/teacher/notifications', function () {
    return view('teacher.notifications');
})->name('teacher.notifications');

Route::get('/teacher/resources', function () {
    return view('teacher.resources');
})->name('teacher.resources');

Route::get('/student', function () {
    return view('student.dashboard');
})->name('student.dashboard');

Route::get('/student/lesson/interactive/{id}', function ($id) {
    return view('student.interactive-lesson');
})->name('student.interactive-lesson');

Route::get('/student/progress', function () {
    return view('student.progress');
})->name('student.progress');

Route::get('/student/results', function () {
    return view('student.results');
})->name('student.results');

Route::get('/student/certificates', function () {
    return view('student.certificates');
})->name('student.certificates');

Route::get('/student/courses', function () {
    return view('student.courses');
})->name('student.courses');

Route::get('/student/lesson/{id}', function ($id) {
    return view('student.lesson');
})->name('student.lesson');

Route::get('/student/quizzes/{id}', function ($id) {
    return view('student.quizzes');
})->name('student.quizzes');

Route::get('/', function () {
    return view('public.index');
})->name('public.index');

Route::get('/about', function () {
    return view('public.about');
})->name('public.about');

Route::get('/contact', function () {
    return view('public.contact');
})->name('public.contact');

Route::get('/courses', function () {
    return view('public.courses');
})->name('public.courses');

Route::get('/reports', function () {
    return view('admin.reports');
})->name('admin.reports');

Route::get('/settings', function () {
    return view('admin.settings');
})->name('admin.settings');

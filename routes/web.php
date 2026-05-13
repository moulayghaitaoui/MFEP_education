<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/direction', function () {
    return view('direction.dashboard');
})->name('direction.dashboard');

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

Route::get('/teacher/sessions', function () {
    return view('teacher.sessions');
})->name('teacher.sessions');

Route::get('/teacher/lessons', function () {
    return view('teacher.lessons');
})->name('teacher.lessons');

Route::get('/teacher/quizzes', function () {
    return view('teacher.quizzes');
})->name('teacher.quizzes');

Route::get('/teacher/students', function () {
    return view('teacher.students');
})->name('teacher.students');

Route::get('/teacher/results', function () {
    return view('teacher.results');
})->name('teacher.results');

Route::get('/student', function () {
    return view('student.dashboard');
})->name('student.dashboard');

Route::get('/student/courses', function () {
    return view('student.courses');
})->name('student.courses');

Route::get('/student/learning/{id}', function ($id) {
    return view('student.learning');
})->name('student.learning');

Route::get('/student/quiz/{id}', function ($id) {
    return view('student.quiz');
})->name('student.quiz');

Route::get('/student/results', function () {
    return view('student.results');
})->name('student.results');

Route::get('/student/certificates', function () {
    return view('student.certificates');
})->name('student.certificates');

Route::get('/public', function () {
    return view('public.index');
})->name('public.index');

Route::get('/reports', function () {
    return view('admin.reports');
})->name('admin.reports');

Route::get('/settings', function () {
    return view('admin.settings');
})->name('admin.settings');

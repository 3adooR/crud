<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link href="@yield('css', mix('css/app.css'))" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
</head>
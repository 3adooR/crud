@extends('layouts.main')

@section('content')
    <div id="app">
        <index-page/>
    </div>
@endsection

{{--@section('css', mix('css/home.css'))--}}

@section('js')
    @parent
    <script src="{{ mix('js/app.js') }}"></script>
@endsection

@extends('layouts.default')
@section('content')
<div class="container">
    <h3> @lang('My recents threads')</h3>
{{--    <h3> @lang('teste')</h3>--}}
    <threads threads="@lang('Threads')"
             title="@lang('Threads')"
             reply="@lang('Reply')"
             open="@lang('open')"
             new-thread="@lang('New Thread')"
             thread-title="@lang('Title')"
             thread-body="@lang('Body')">
        @include('layouts.default.preloader')
    </threads>
</div>
@endsection

@section('scripts')
    <script src="/js/threads.js"></script>
@endsection

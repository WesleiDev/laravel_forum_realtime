@extends('layouts.default')
@section('content')
    <div class="container">
        <h3> {{$thread->title}}</h3>

        <div class="card grey lighten-4">
            <div class="card-content">
                <form action="/threads/{{$thread->id}}" method="post" >
                    {{csrf_field()}}
                    {{method_field('put')}}
                    <div class="input-field">
                        <input type="text" placeholder="@lang('Title')" name="title" value="{{$thread->title}}"/>
                    </div>
                    <div class="input-field">
                        <textarea class="materialize-textarea"
                                  placeholder="@lang('Body')"
                                name="body">{{$thread->body}}</textarea>
                    </div>
                    <button type="submit" class="btn red accent-2">@lang('send')</button>
                </form>
            </div>

            <div class="card-action">
                <a href="/threads/{{$thread->id}}">@lang('Back')</a>
            </div>
        </div>

    </div>


@endsection

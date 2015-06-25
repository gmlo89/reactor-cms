@extends('CMS::master')

@section('content')
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
    </section>
    <section class="content">
        {!! Alert::render() !!}
        @lang('CMS::core.welcome') {{ Auth::user()->name }}

    </section>
@endsection
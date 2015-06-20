@extends('CMS::master')

@section('content')
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
    </section>
    <section class="content">
        Bienvenido {{ Auth::user()->name }}
    </section>
@endsection
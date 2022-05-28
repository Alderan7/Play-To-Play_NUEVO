@extends('layouts.header')

@section('content')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<div class="container margen">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}

                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                    <div><a href="/user" class="enlace">Ir a mi Biblioteca</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

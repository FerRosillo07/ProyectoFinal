@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <a class="btn" style="background-color:orange; color: white"  href="{{ route('spotify.login') }}" role="button">Ir</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

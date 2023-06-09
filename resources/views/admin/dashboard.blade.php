@extends('layouts.admin.dashboard')

@section('page_title', 'Dashboard')

@section('content')
    <div class="container">
        <h1 class="fs-1 text-dark my-4">
            {{ __('Dashboard') }}
        </h1>
        <div class="row justify-content-start g-4">
            <div class="col-12">
                <div class="alert alert-light text-dark rounded-0 border-dark p-5" role="alert">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::user())
                        <h2 class="text-capitalize fw-semibold mb-0 pb-0">{{ __('Welcome ' . Auth::user()->name) }}</h2>
                    @endif
                    {{-- {{ __('You are logged in!') }} --}}
                </div>
            </div>

            <div class="col-12 py-3">
                <h3>Views</h3>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <a class="text-decoration-none" href="{{ route('admin.projects.index') }}">
                    <div class="card text-start rounded-0 border-dark h-100">
                        <div class="card-header border-0 bg-light d-flex align-items-center justify-content-center py-5">
                            <i class="fa-regular fa-file-code fs-1"></i>
                        </div>
                        <div class="card-body bg-light">
                            <h4 class="card-title text-center">Projects</h4>
                            {{-- <p class="card-text">Body</p> --}}
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <a class="text-decoration-none" href="{{ route('admin.types.index') }}">
                    <div class="card text-start rounded-0 border-dark h-100">
                        <div class="card-header border-0 bg-light d-flex align-items-center justify-content-center py-5">
                            <i class="fa-solid fa-i-cursor fs-1"></i>
                        </div>
                        <div class="card-body bg-light">
                            <h4 class="card-title text-center">Types</h4>
                            {{-- <p class="card-text">Body</p> --}}
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <a class="text-decoration-none" href="{{ route('admin.technologies.index') }}">
                    <div class="card text-start rounded-0 border-dark h-100">
                        <div class="card-header border-0 bg-light d-flex align-items-center justify-content-center py-5 gap-3">
                            <i class="fa-brands fa-vuejs fs-1"></i>
                            <i class="fa-brands fa-sass fs-1"></i>
                            <i class="fa-brands fa-laravel fs-1"></i>
                        </div>
                        <div class="card-body bg-light">
                            <h4 class="card-title text-center">Technologies</h4>
                            
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection

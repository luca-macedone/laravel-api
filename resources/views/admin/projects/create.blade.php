@extends('layouts.admin.dashboard')

@section('page_title', 'Projects')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Create a new project') }}
        </h2>
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                <strong>{{ __('Error:') }}</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.projects.store') }}" method="post">
            @csrf
            {{-- title --}}
            <div class="mb-3">
                <label for="title" class="form-label">{{ __('Title') }}</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                    aria-describedby="titleHelpId" placeholder="Type the title here">
                <small id="titleHelpId" class="form-text text-muted">{{ __('Required') }}</small>
            </div>
            {{-- image --}}
            <div class="mb-3">
                <label for="image" class="form-label">{{ __('Image') }}</label>
                <input type="text" class="form-control @error('image') is-invalid @enderror" name="image"
                    id="image" aria-describedby="imageHelpId" placeholder="http:://lorem.picsum/random">
                <small id="imageHelpId" class="form-text text-muted">{{ __('Place the image URL here') }}</small>
            </div>
            {{-- description --}}
            <div class="mb-3">
                <label for="description" class="form-label">{{ __('Description') }}</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                    rows="5">{{ __('Lorem ipsum...') }}</textarea>
            </div>
            {{-- year --}}
            <div class="mb-3">
                <label for="year_of_development" class="form-label">{{ __('Date of development') }}</label>
                <input type="text" class="form-control @error('year_of_development') is-invalid @enderror"
                    name="year_of_development" id="year_of_development" aria-describedby="yearHelpId">
                <small id="yearHelpId" class="form-text text-muted">{{ __('Set the year of development') }}</small>
            </div>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-dark" role="button">
				<i class="fa-solid fa-arrow-left me-1"></i>
                {{ __('Back') }}
            </a>
            <button type="reset" class="btn btn-outline-secondary">
                {{ __('Reset') }}
            </button>
            <button type="submit" class="btn btn-outline-primary px-5">
                <i class="fa-solid fa-plus me-1"></i>
                {{ __('Add') }}
            </button>
        </form>

    </div>
@endsection

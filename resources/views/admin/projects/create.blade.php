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
            {{-- type --}}
            <div class="mb-3">
                <label for="type_id" class="form-label">Type</label>
                <select class="form-select" name="type_id" id="type_id">
                    <option>Select one type</option>
                    @forelse ($types as $type)
                        <option value="{{ $type->id }}" {{ $type->id  == old('type_id', '') ? 'selected' : '' }}>{{ $type->name }}</option>
                    @empty
                        <option value="">{{ __('Nothing here yet') }}</option>
                    @endforelse
                </select>
            </div>
            {{-- technologies --}}
            <p class="mb-2">Technologies</p>
            <div class="d-flex align-items-center gap-3 mb-3">
                @forelse ($technologies as $technology)
                    <div class="form-check @error('technologies') is-invalid @enderror">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="technologies[]" value="{{ $technology->id }}" {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                            {{ $technology->name }}
                        </label>
                    </div>
                @empty
                @endforelse
            </div>
            {{-- image --}}
            <div class="mb-3">
                <label for="image" class="form-label">{{ __('Image') }}</label>
                <input type="text" class="form-control @error('image') is-invalid @enderror" name="image"
                    id="image" aria-describedby="imageHelpId" placeholder="http:://lorem.picsum/random">
                <small id="imageHelpId" class="form-text text-muted">{{ __('Place the image URL here') }}</small>
            </div>
            {{-- repository_url --}}
            <div class="mb-3">
                <label for="repository_url" class="form-label">{{ __('Repository URL') }}</label>
                <input type="text" class="form-control @error('repository_url') is-invalid @enderror" name="repository_url" id="repository_url"
                    aria-describedby="repositoryHelpId" placeholder="Type the URL here">
                {{-- <small id="repositoryHelpId" class="form-text text-muted">{{ __('Required') }}</small> --}}
            </div>
            {{-- website_url --}}
            <div class="mb-3">
                <label for="website_url" class="form-label">{{ __('Website URL') }}</label>
                <input type="text" class="form-control @error('website_url') is-invalid @enderror" name="website_url" id="website_url"
                    aria-describedby="websiteHelpId" placeholder="Type the URL here">
                {{-- <small id="websiteHelpId" class="form-text text-muted">{{ __('Required') }}</small> --}}
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

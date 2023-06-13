@extends('layouts.admin.dashboard')

@section('page_title', 'Projects')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Edit a project') }}
        </h2>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <strong>{{ __('Error:') }}</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.projects.update', $project) }}" method="post">
            @csrf
            @method('PUT')
            {{-- title --}}
            <div class="mb-3">
                <label for="title" class="form-label">{{ __('Title') }}</label>
                <input type="text" class="form-control rounded-0 @error('title') is-invalid @enderror" name="title" id="title"
                    aria-describedby="titleHelpId" placeholder="Type the title here"
                    value="{{ old('title', $project->title) }}">
                <small id="titleHelpId" class="form-text text-muted">{{ __('Required') }}</small>
            </div>
            {{-- type --}}
            @if($types)
            <div class="mb-3">
                <label for="type_id" class="form-label">Type</label>
                <select class="form-select rounded-0" name="type_id" id="type_id">
                    <option>Select one type</option>
                    @forelse ($types as $type)
                    <option value="{{ $type->id }}" {{ $type->id  == old('type_id', $project->type?->id) ? 'selected' : '' }}>{{$type->name}}</option>
                    @empty     
                    <option value="">{{__('Nothing here yet')}}</option>
                    @endforelse
                </select>
            </div>
            @endif
            {{-- technologies --}}
            <p class="mb-2">Technologies</p>
            <div class="d-flex align-items-center gap-3 mb-3">
                @forelse ($technologies as $technology)
                    <div class="form-check @error('technologies') is-invalid @enderror">
                        <label class="form-check-label">
                            @if($errors->any())
                            <input class="form-check-input" type="checkbox" name="technologies[]" value="{{ $technology->id }}" {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                            @else
                            <input class="form-check-input rounded-0" type="checkbox" name="technologies[]" value="{{ $technology->id }}" {{ $project->technologies->contains($technology) ? 'checked' : '' }}>
                            @endif
                            {{ $technology->name }}
                        </label>
                    </div>
                @empty
                @endforelse
            </div>
            {{-- image --}}
            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between gap-3">
                    <div class="w-25 overflow-hidden my-3">
                        @if($project->image)
                        <img src="{{ asset("storage/$project->image") }}" class="img-fluid object-fit-cover"   alt="{{ $project->slung . " cover image" }}"/>
                        @else
                        <div class="border px-3 py-5 text-center">{{ __('No image')}}</div>
                        @endif
                    </div>
                    <div class="w-75">
                        <label for="image" class="form-label">{{ __('Image') }}</label>
                        <input type="file" class="form-control rounded-0 @error('image') is-invalid @enderror" name="image"
                            id="image" aria-describedby="imageHelpId">
                        <small id="imageHelpId" class="form-text text-muted">{{ __('Please select an image from your device') }}</small>
                    </div>
                </div>
            </div>
            {{-- description --}}
            <div class="mb-3">
                <label for="description" class="form-label">{{ __('Description') }}</label>
                <textarea class="form-control rounded-0 @error('description') is-invalid @enderror" name="description" id="description"
                    rows="5">{{ old('description', $project->description) }}</textarea>
            </div>
            {{-- year --}}
            <div class="mb-3">
                <label for="year_of_development" class="form-label">{{ __('Year of development') }}</label>
                <input type="text" class="form-control rounded-0 @error('year_of_development') is-invalid @enderror"
                    name="year_of_development" id="year_of_development" aria-describedby="yearHelpId"
                    value="{{ old('year_of_development', $project->year_of_development) }}">
                <small id="yearHelpId" class="form-text text-muted">{{ __('Set the year of development') }}</small>
            </div>
            <a href="{{ route('admin.projects.index') }}" class="rounded-0 btn btn-outline-dark" role="button">
                <i class="fa-solid fa-arrow-left me-1"></i>
                {{ __('Back') }}
            </a>
            <button type="reset" class="rounded-0 btn btn-outline-secondary">
                {{ __('Reset') }}
            </button>
            <button type="submit" class="rounded-0 btn btn-outline-primary px-5">
                <i class="fa-solid fa-pencil me-1"></i>
                {{ __('Edit') }}
            </button>
        </form>

    </div>
@endsection

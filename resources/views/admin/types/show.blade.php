@extends('layouts.admin.dashboard')

@section('page_title', 'Projects')

@section('content')
    <div class="container">
        <div class="d-flex flex-col flex-lg-row justify-content-between align-items-center">
            <a href="{{ route('admin.types.index') }}" class="btn btn-outline-dark px-5 mt-4" role="button">
                <i class="fa-solid fa-arrow-left me-1"></i>
                {{ __('Back') }}
            </a>
        </div>
        <div class="row justify-content-center g-4 mt-0">
            @forelse ($projects as $project)
                <div class="col">
                    <div class="card rounded-0 border-dark h-100">
                        <div class="card-header border-0 rounded-0 bg-dark d-flex justify-content-end align-items-center gap-3">
                            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-light px-3"
                                role="button">
                                <i class="fa-solid fa-eye me-1"></i>
                                {{ __('Watch in projects') }}
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                                <img src="{{ $project->image }}" height="150" width="150" class=""
                                    alt="{{ $project->title }}">
                                <div class="card-body d-flex flex-column gap-2">
                                    <div class="d-flex justify-content-between align-items-start w-100">
                                        <strong class="me-3">ID:</strong>
                                        {{ $project->id }}
                                    </div>
                                    <div class="d-flex justify-content-between align-items-start w-100">
                                        <strong class="me-3">Title:</strong>
                                        {{ $project->title }}
                                    </div>
                                    <div class="d-flex justify-content-between align-items-start w-100">
                                        <strong class="me-3">Type:</strong>
                                        {{ $project->type?->name }}
                                    </div>
                                    <div class="d-flex justify-content-between align-items-start w-100">
                                        <strong class="me-3">Year of development:</strong>
                                        {{ $project->year_of_development }}
                                    </div>
                                    <div class="d-flex justify-content-between align-items-start w-100 text-nowrap overflow-hidden">
                                        <strong class="me-3">Website:</strong>
                                        {{ $project->website_url }}
                                    </div>
                                    <div class="d-flex justify-content-between align-items-start w-100 text-nowrap overflow-hidden">
                                        <strong class="me-3">Repository:</strong>
                                        {{ $project->repository_url }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="py-5 text-center">{{ __('Nothing here yet!') }}</div>
            @endforelse
        </div>
    </div>
@endsection

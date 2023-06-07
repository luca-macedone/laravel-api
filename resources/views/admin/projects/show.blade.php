@extends('layouts.admin.dashboard')

@section('page_title', 'Projects')

@section('content')
    <div class="container">
        <div class="d-flex flex-col flex-lg-row justify-content-between align-items-center">
            <h2 class="fs-4 text-secondary my-4">
                {{ __("Project '$project->title'") }}
            </h2>
            <div>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-dark px-5" role="button">
                    <i class="fa-solid fa-arrow-left me-1"></i>
                    Back
                </a>
                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-outline-dark px-5">
                    <i class="fa-solid fa-pencil me-1"></i>
                    Edit
                </a>
                <button type="button" class="btn btn-outline-danger px-3" data-bs-toggle="modal"
                    data-bs-target="{{ '#modal' . $project->id }}">
                    <i class="fa-solid fa-trash me-1"></i>
                    Delete project
                </button>
                <div class="modal fade" id="{{ 'modal' . $project->id }}" tabindex="-1" data-bs-backdrop="static"
                    data-bs-keyboard="false" role="dialog" aria-labelledby="{{ 'modalTitle' . $project->id }}"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger" id="{{ 'modalTitle' . $project->id }}">Danger Zone</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                This operation is irreversible, are you sure?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Delete permanently</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-5">
            <div class="card rounded-0 border-0">
                <div class="d-flex align-items-center gap-3">
                    <img src="{{ $project->image }}" height="300" width="300" class=""
                        alt="{{ $project->title }}">
                    <div class="card-body d-flex flex-column gap-3">
                        <div class="d-flex align-items-start"><strong class="me-3">ID: </strong>{{ $project->id }}</div>
                        <div class="d-flex align-items-start"><strong class="me-3">Title: </strong>{{ $project->title }}
                        </div>
                        <div class="d-flex align-items-start"><strong class="me-3">Year of development:
                            </strong>{{ $project->year_of_development }}</div>
                        <div class="d-flex align-items-start"><strong class="me-3">Website:
                            </strong>{{ $project->website_url }}</div>
                        <div class="d-flex align-items-start"><strong class="me-3">Repository:
                            </strong>{{ $project->repository_url }}</div>
                        <div class="d-flex align-items-start"><strong class="me-3">Description:
                            </strong>{{ $project->description }}</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

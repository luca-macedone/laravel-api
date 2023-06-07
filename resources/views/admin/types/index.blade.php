@extends('layouts.admin.dashboard')

@section('page_title', 'Projects')

@section('content')
    <div class="container">
        <div class="d-flex flex-col flex-lg-row justify-content-between align-items-center">
            <h2 class="fs-4 text-secondary my-4">
                {{ __('Projects') }}
            </h2>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-outline-dark" role="button">
                <i class="fa-solid fa-plus me-1"></i>
                {{ __('New Project') }}
            </a>
        </div>
        @if (session('message'))
            <div class="alert alert-info" role="alert">
                <strong>{{ __('Info:') }}</strong> {{ session('message') }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-hover	table-white align-middle">
                <thead class="">
                    <tr>
                        <th>{{ __('ID') }}</th>
                        {{-- <th>{{ __('Year') }}</th> --}}
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Slug') }}</th>
                        {{-- <th>{{ __('Website URL') }}</th> --}}
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($types as $type)
                        <tr class="">
                            <td scope="row">{{ $type->id }}</td>
                            {{-- <td>{{ $type->year_of_development }}</td> --}}
                            <td>{{ $type->name }}</td>
                            <td>{{ $type->slug }}</td>
                            {{-- <td>{{ $type->website_url }}</td> --}}
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <a href="{{ route('admin.types.show', $type) }}"
                                        class="btn btn-outline-dark d-flex align-items-center gap-1"
                                        title="{{ __('View') }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.types.edit', $type) }}"
                                        class="btn btn-outline-dark d-flex align-items-center gap-1"
                                        title="{{ __('Edit') }}">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn btn-outline-danger d-flex align-items-center gap-1"
                                        data-bs-toggle="modal" data-bs-target="{{ '#modal' . $type->id }}"
                                        title="{{ __('Delete') }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                    <div class="modal fade" id="{{ 'modal' . $type->id }}" tabindex="-1"
                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                        aria-labelledby="{{ 'modalTitle' . $type->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-danger"
                                                        id="{{ 'modalTitle' . $type->id }}">{{ __('Danger Zone') }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div>{{ __("This operation is irreversible.") }}</div>
                                                    <div class="fw-semibold">{{ __("Are you sure?") }}</div>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-between">
                                                    <button type="button" class="btn btn-outline-dark"
                                                        data-bs-dismiss="modal">{{ __('Close') }}</button>
                                                    <form action="{{ route('admin.types.destroy', $type) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger">
                                                            <i class="fa-solid fa-trash me-1"></i>
                                                            {{ __('Delete permanently') }}
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    @empty

                        <tr class="">
                            <td>{{ __('Nothing here yet.') }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforelse

                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>

    </div>
@endsection

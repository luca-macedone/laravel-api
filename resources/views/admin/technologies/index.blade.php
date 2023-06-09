@extends('layouts.admin.dashboard')

@section('page_title', 'Technologies')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger mt-4" role="alert">
                <strong>{{ __('Error:') }}</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="d-flex flex-col flex-lg-row justify-content-between align-items-center">
            <h2 class="fs-4 text-secondary my-4">
                {{ __('Technologies List') }}
            </h2>
            <div class="d-flex flex-col flex-lg-row justify-content-between align-items-center">
                <form action="{{ route('admin.technologies.store') }}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" placeholder="Vue 9.x" value="{{ old('name') }}">
                        <button type="submit" class="btn btn-outline-dark">
                            <i class="fa-solid fa-plus me-1"></i>
                            {{ __('New Technology') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @if (session('message'))
            <div class="alert alert-info" role="alert">
                <strong>{{ __('Info:') }}</strong> {{ session('message') }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-hover	table-light align-middle">
                <thead class="">
                    <tr>
                        <th class="">{{ __('ID') }}</th>
                        <th class="">{{ __('Name') }}</th>
                        <th class="">{{ __('Slug') }}</th>
                        <th class="text-center">{{ __('Linked Projects') }}</th>
                        <th class="text-center">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($technologies as $technology)
                        <tr class="">
                            <td class="ms-w-5" scope="row">{{ $technology->id }}</td>
                            <td class="ms-overflow-x-hidden ms-w-20">{{ $technology->name }}</td>
                            <td class="ms-overflow-x-hidden">{{ $technology->slug }}</td>
                            <td class="text-center">{{ $technology->projects->count() }}</td>
                            <td class="">
                                <div class="d-flex align-items-center gap-2">
                                    <form action="{{ route('admin.technologies.update', $technology) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="input-group">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" id="name"
                                                value="{{ old('name'), $technology->name }}">
                                            <button type="submit" class="btn btn-outline-dark">
                                                <i class="fa-solid fa-pencil me-1"></i>
                                                {{ __('Edit') }}
                                            </button>
                                        </div>
                                    </form>
                                    <a href="{{ route('admin.technologies.show', $technology) }}"
                                        class="btn btn-outline-dark d-flex align-items-center gap-2"
                                        title="{{ __('Show related projects') }}">
                                        <i class="fa-solid fa-eye"></i>
                                        {{__('Show')}}
                                    </a>
                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn btn-outline-danger d-flex align-items-center gap-2 px-4"
                                        data-bs-toggle="modal" data-bs-target="{{ '#modal' . $technology->id }}"
                                        title="{{ __('Delete type') }}">
                                        <i class="fa-solid fa-trash"></i>
                                        {{__('Delete')}}
                                    </button>
                                    <div class="modal fade" id="{{ 'modal' . $technology->id }}" tabindex="-1"
                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                        aria-labelledby="{{ 'modalTitle' . $technology->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-danger"
                                                        id="{{ 'modalTitle' . $technology->id }}">
                                                        {{ __('Danger Zone') }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div>{{ __('This operation is irreversible.') }}</div>
                                                    <div class="fw-semibold">{{ __('Are you sure?') }}</div>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-between">
                                                    <button type="button" class="btn btn-outline-dark"
                                                        data-bs-dismiss="modal">{{ __('Close') }}</button>
                                                    <form action="{{ route('admin.technologies.destroy', $technology) }}"
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

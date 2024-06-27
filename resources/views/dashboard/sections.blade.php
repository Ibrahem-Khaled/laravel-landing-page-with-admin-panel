@extends('layouts.dashboard')

@section('content')
    <div class="mt-4">
        <div class="d-flex justify-content-between">
            <h2>Sections</h2>
            <button class="btn btn-primary" data-toggle="modal" data-target="#sectionModal">Create New Section</button>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered mt-2">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name (EN)</th>
                    <th>Description (EN)</th>
                    <th>Name (AR)</th>
                    <th>Description (AR)</th>
                    <th>Image</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sections as $section)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $section->name_en }}</td>
                        <td>{{ $section->description_en }}</td>
                        <td>{{ $section->name_ar }}</td>
                        <td>{{ $section->description_ar }}</td>
                        <td>
                            @if ($section->image)
                                <img src="{{ asset($section->image) }}" width="100" alt="Section Image">
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-info" data-toggle="modal"
                                data-target="#editSectionModal{{ $section->id }}">Edit</button>
                            <form action="{{ route('sections.destroy', $section->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <div class="modal fade" id="editSectionModal{{ $section->id }}" tabindex="-1"
                                aria-labelledby="editSectionModalLabel{{ $section->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editSectionModalLabel{{ $section->id }}">Edit
                                                Section</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('sections.update', $section->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="name_en{{ $section->id }}">Name (EN)</label>
                                                    <input type="text" class="form-control"
                                                        id="name_en{{ $section->id }}" name="name_en"
                                                        value="{{ $section->name_en }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description_en{{ $section->id }}">Description (EN)</label>
                                                    <input type="text" class="form-control"
                                                        id="description_en{{ $section->id }}" name="description_en"
                                                        value="{{ $section->description_en }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name_ar{{ $section->id }}">Name (AR)</label>
                                                    <input type="text" class="form-control"
                                                        id="name_ar{{ $section->id }}" name="name_ar"
                                                        value="{{ $section->name_ar }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description_ar{{ $section->id }}">Description (AR)</label>
                                                    <input type="text" class="form-control"
                                                        id="description_ar{{ $section->id }}" name="description_ar"
                                                        value="{{ $section->description_ar }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="image{{ $section->id }}">Image</label>
                                                    <input type="file" class="form-control"
                                                        id="image{{ $section->id }}" name="image">
                                                    @if ($section->image)
                                                        <img src="{{ asset($section->image) }}" width="100"
                                                            alt="Current Image">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- resources/views/dashboard/sections/partials/create_modal.blade.php -->
    <div class="modal fade" id="sectionModal" tabindex="-1" aria-labelledby="sectionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sectionModalLabel">Create New Section</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('sections.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name_en">Name (EN)</label>
                            <input type="text" class="form-control" id="name_en" name="name_en" required>
                        </div>
                        <div class="form-group">
                            <label for="description_en">Description (EN)</label>
                            <input type="text" class="form-control" id="description_en" name="description_en">
                        </div>
                        <div class="form-group">
                            <label for="name_ar">Name (AR)</label>
                            <input type="text" class="form-control" id="name_ar" name="name_ar" required>
                        </div>
                        <div class="form-group">
                            <label for="description_ar">Description (AR)</label>
                            <input type="text" class="form-control" id="description_ar" name="description_ar">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

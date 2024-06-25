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
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($sections as $section)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $section->name }}</td>
                    <td>{{ $section->description }}</td>
                    <td>{{ $section->image }}</td>
                    <td>
                        <button class="btn btn-info" data-toggle="modal"
                            data-target="#editSectionModal{{ $section->id }}">Edit</button>
                        <form action="{{ route('sections.destroy', $section->id) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>

                <!-- Edit Section Modal -->
                <div class="modal fade" id="editSectionModal{{ $section->id }}" tabindex="-1"
                    aria-labelledby="editSectionModalLabel{{ $section->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editSectionModalLabel{{ $section->id }}">Edit Section</h5>
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
                                        <label for="name{{ $section->id }}">Name</label>
                                        <input type="text" class="form-control" id="name{{ $section->id }}"
                                            name="name" value="{{ $section->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description{{ $section->id }}">Description</label>
                                        <input type="text" class="form-control" id="description{{ $section->id }}"
                                            name="description" value="{{ $section->description }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="image{{ $section->id }}">Image</label>
                                        <input type="file" class="form-control" id="image{{ $section->id }}"
                                            name="image">
                                        @if ($section->image)
                                            <img src="{{ asset('storage/' . $section->image) }}" width="100"
                                                alt="Current Image">
                                        @endif
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
            @endforeach
        </table>
    </div>

    <!-- Create Section Modal -->
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
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description">
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

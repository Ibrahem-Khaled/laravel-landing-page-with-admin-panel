@extends('layouts.dashboard')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-4">Gallery List</h2>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createModal">
                    Add New Gallery
                </button>
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($galleries as $gallery)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if ($gallery->image)
                                    <img src="{{ asset('images/' . $gallery->image) }}" alt="{{ $gallery->name }}"
                                        class="img-fluid rounded mb-4" style="border-radius: 10px;">
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#editModal{{ $gallery->id }}">
                                        Edit
                                    </button>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $gallery->id }}" tabindex="-1"
                            aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Edit Gallery</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('galleries.update', $gallery->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="image">Image</label>
                                                <input type="file" name="image" class="form-control">
                                                @if ($gallery->image)
                                                    <img src="{{ Storage::url('images/' . $gallery->image) }}"
                                                        width="100px" class="mt-2">
                                                @endif
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Add New Gallery</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Gallery</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop

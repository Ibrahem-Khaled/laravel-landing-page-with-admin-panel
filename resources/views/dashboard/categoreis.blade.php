@extends('layouts.dashboard')

@section('content')
    <div class="container mt-5">
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#sectionModal">
            إضافة قسم
        </button>

        <!-- Add Section Modal -->
        <div class="modal fade" id="sectionModal" tabindex="-1" aria-labelledby="sectionModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="sectionModalLabel">إضافة قسم</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('sections.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">اسم القسم</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="description">الوصف</label>
                                <input type="text" class="form-control" id="description" name="description">
                            </div>
                            <div class="form-group">
                                <label for="image">الصورة</label>
                                <input type="text" class="form-control" id="image" name="image">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                            <button type="submit" class="btn btn-primary">حفظ القسم</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sections Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>رقم التعريف</th>
                    <th>الاسم</th>
                    <th>الوصف</th>
                    <th>الصورة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sections as $section)
                    <tr>
                        <td>{{ $section->id }}</td>
                        <td>{{ $section->name }}</td>
                        <td>{{ $section->description }}</td>
                        <td>{{ $section->image }}</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#editSectionModal{{ $section->id }}">
                                تعديل
                            </button>
                            <form action="{{ route('sections.destroy', $section->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Section Modal -->
                    <div class="modal fade" id="editSectionModal{{ $section->id }}" tabindex="-1"
                        aria-labelledby="editSectionModalLabel{{ $section->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editSectionModalLabel{{ $section->id }}">تعديل القسم
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('sections.update', $section->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name{{ $section->id }}">اسم القسم</label>
                                            <input type="text" class="form-control" id="name{{ $section->id }}"
                                                name="name" value="{{ $section->name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description{{ $section->id }}">الوصف</label>
                                            <input type="text" class="form-control" id="description{{ $section->id }}"
                                                name="description" value="{{ $section->description }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="image{{ $section->id }}">الصورة</label>
                                            <input type="text" class="form-control" id="image{{ $section->id }}"
                                                name="image" value="{{ $section->image }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                                        <button type="submit" class="btn btn-primary">تحديث القسم</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
@stop

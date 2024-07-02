@extends('layouts.dashboard')

@section('content')
    <div class="container mt-5">
        <!-- Button to trigger Add Site Setting Modal -->
        @if (count($siteSettings) == 0)
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#siteSettingModal">
                إضافة إعداد موقع
            </button>
        @endif

        <!-- Add Site Setting Modal -->
        <div class="modal fade" id="siteSettingModal" tabindex="-1" aria-labelledby="siteSettingModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="siteSettingModalLabel">إضافة إعداد موقع</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('site-settings.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="image">صورة</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="form-group">
                                <label for="title">العنوان</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="description">الوصف</label>
                                <input type="text" class="form-control" id="description" name="description" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                            <button type="submit" class="btn btn-primary">حفظ إعداد الموقع</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Site Settings Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>رقم التعريف</th>
                    <th>الصورة</th>
                    <th>العنوان</th>
                    <th>الوصف</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siteSettings as $setting)
                    <tr>
                        <td>{{ $setting->id }}</td>
                        <td>
                            @if ($setting->image)
                                <img src="{{ asset($setting->image) }}" alt="image" width="50">
                            @endif
                        </td>
                        <td>{{ $setting->title }}</td>
                        <td>{{ $setting->description }}</td>
                        <td>
                            <!-- Edit Button to trigger Edit Modal -->
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#editSiteSettingModal{{ $setting->id }}">
                                تعديل
                            </button>

                            <!-- Delete Form -->
                            <form action="{{ route('site-settings.destroy', $setting->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Site Setting Modal -->
                    <div class="modal fade" id="editSiteSettingModal{{ $setting->id }}" tabindex="-1"
                        aria-labelledby="editSiteSettingModalLabel{{ $setting->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editSiteSettingModalLabel{{ $setting->id }}">تعديل إعداد
                                        الموقع</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('site-settings.update', $setting->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="image{{ $setting->id }}">صورة</label>
                                            <input type="file" class="form-control" id="image{{ $setting->id }}"
                                                name="image">
                                            @if ($setting->image)
                                                <img src="{{ asset($setting->image) }}" alt="image" width="50"
                                                    class="mt-2">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="title{{ $setting->id }}">العنوان</label>
                                            <input type="text" class="form-control" id="title{{ $setting->id }}"
                                                name="title" value="{{ $setting->title }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description{{ $setting->id }}">الوصف</label>
                                            <input type="text" class="form-control"
                                                id="description{{ $setting->id }}" name="description"
                                                value="{{ $setting->description }}" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">إغلاق</button>
                                        <button type="submit" class="btn btn-primary">تحديث إعداد الموقع</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

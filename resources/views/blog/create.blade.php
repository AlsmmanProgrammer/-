@extends('layouts.main')

@section('title')
Blog_Create
@endsection


@section('half')
    <br><br>
    <br><br>
    <div class="max-w-67xl mx-auto sm:px-6 lg:p-8">
        <h1 class="text-center pt-8 fs-1">إنشاء منشور جديد</h1>
    </div>
    <br>

    <div class="container">
        <form action="/blog" method="POST" enctype="multipart/form-data">
            @csrf
            <fieldset class="border p-4 rounded shadow">
                <legend class="w-auto px-2">إنشاء منشور جديد</legend>

                <div class="mb-3">
                    <label for="title" class="form-label">العنوان</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="العنوان" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">الوصف</label>
                    <textarea class="form-control" name="description" id="description" placeholder="الوصف" cols="30" rows="10"
                        required></textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">اختر صورة للتحميل</label>
                    <input type="file" class="form-control" name="image" id="image" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-outline-primary">إنشاء</button>
                </div>
            </fieldset>
        </form>
    </div>
    <br><br>
@endsection

@extends('dashboard')

@section('title')
    Post_Edit
@endsection

@section('cot')
    <div class="max-w-67xl mx-auto sm:px-6 lg:p-8 text-center">
        <h1 class="pt-8 fs-1">تعديل المنشور</h1>
    </div>
    <div class="flex justify-center items-center min-h-screen">



        <div class="container mx-auto">
            <form action="/post/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <fieldset class="border p-4 rounded shadow">
                    <legend class="w-auto px-2">تعديل المنشور</legend>

                    <div class="mb-3">
                        <label for="title" class="form-label">العنوان</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">الوصف</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10" required>{{ $post->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">اختر صورة لتحديثها</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-primary">تعديل</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <br><br>
@endsection

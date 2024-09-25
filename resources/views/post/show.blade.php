@extends('dashboard')

@section('title')
    Post_Show
@endsection


@section('cot')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="max-w-67xl mx-auto sm:px-6 lg:p-8 border border-secondary rounded p-4">
            <h1 class="text-center pt-8 fs-1">{{ $post->title }}</h1>

            <div class="text-center mb-4">
                <span>بواسطة: <strong>{{ $post->user->name }}</strong></span>
            </div>

            <div class="d-flex justify-content-center mb-4">
                <img class="rounded shadow" src="/images/{{ $post->image_path }}" alt="{{ $post->title }}"
                    style="max-height: 400px; max-width: 100%;">
            </div>

            <div class="container">
                <p class="mb-4">{{ $post->description }}</p>
                <div class="d-grid gap-2 mb-3">
                    <a href="/post/{{ $post->slug }}/edit" class="btn btn-outline-primary">تعديل المنشور</a>
                </div>
                <form action="/post/{{ $post->slug }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-outline-danger">حذف المنشور</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br>
@endsection

@extends('layouts.main')

@section('title')
    BLog_Show
@endsection


@section('half')
    <br><br>
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif





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




                @if (Auth::check() && ((Auth::user()->User_Type == 'ADMIN') || (Auth::user()->User_Type == 'USER_EDIT_AND_DELETE')))
                    <div class="d-grid gap-2 mb-3">
                        <a href="/blog/{{ $post->slug }}/edit" class="btn btn-outline-primary">تعديل المنشور</a>
                    </div>
                    <form action="/blog/{{ $post->slug }}" method="POST">
                        @csrf
                        @method('delete')
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-outline-danger">حذف المنشور</button>
                        </div>
                    </form>
                @endif




            </div>
        </div>
    </div>
    <br><br>
@endsection

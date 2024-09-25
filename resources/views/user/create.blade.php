@extends('dashboard')


@section('title')
    User_Create
@endsection


@section('cot')
    <div class="max-w-67xl mx-auto sm:px-6 lg:p-8">
        <h1 class="text-center pt-8 fs-1">New User</h1>
    </div>
    <br>
    <x-guest-layout>
        <form method="POST" enctype="multipart/form-data" action="{{route('user.store')}}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- USER TYPE -->
            <div>
                <x-input-label for="user_type" :value="__('User Type')" />

                <select id="user_type" class="block mt-1 w-full" name="user_type">
                    <option value="ADMIN">ADMIN</option>
                    <option value="USER_CREATE">USER_CREATE</option>
                    <option value="USER_EDIT_AND_DELETE">USER_EDIT_AND_DELETE</option>
                </select>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>

                {{--
                    <div class="text-center mx-2">
                        <button type="submit" class="btn btn-outline-primary">Create</button>
                    </div>
                <a class="text-center mx-2">
                    <a  class="btn btn-outline-primary" href="{{route('user.index')}}">Back</a>
                </a> --}}
            </div>

        </form>

    </x-guest-layout>


    {{-- <div class="container">
        <form action="/blog" method="POST" enctype="multipart/form-data">
            @csrf
            <fieldset class="border p-4 rounded shadow">
                <legend class="w-auto px-2">New User</legend>
                <div class="mb-3">
                    <label for="title" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="العنوان" required>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="العنوان" required>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="العنوان" required>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="العنوان" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-outline-primary">إنشاء</button>
                </div>
            </fieldset>
        </form>
    </div> --}}
@endsection

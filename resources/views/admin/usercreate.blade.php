@extends('admin.master')

@section('title', 'User Account Create')

@section('content')
    <div class="profile-section">
        <section class="sec-profile">
            <div class="sec-profile-header">
                <h2 class="font32">User Account Create</h2>
            </div>
            <form action="{{ route('admin.create.user.account') }}" method="POST" class="profile-form">
                @csrf
                <div class="input-form">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="name" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-danger validation-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-form">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="name@example.com"
                        value="{{ old('email') }}">
                    @error('email')
                        <span class="text-danger validation-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-form">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="********">
                    @error('password')
                        <span class="text-danger validation-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="sec-profile-btn mt-3">
                    <a href="{{ route('admin.userList') }}">
                        <button class="back-btn" type="button">
                            Back
                        </button>
                    </a>
                    <button type="submit" class="update-btn">Create</button>
                </div>
            </form>
        </section>
    </div>
@endsection

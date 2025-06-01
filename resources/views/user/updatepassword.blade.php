@extends('user.master')

@section('title', 'Update Password')

@section('content')
    <div class="profile-section">
        <section class="sec-profile">
            <div class="sec-profile-header">
                <h2 class="font32">Update Password</h2>
            </div>
            <form action="{{ route('user.password.update') }}" method="POST" class="profile-form">
                @csrf
                <div class="input-form mb-3">
                    <label for="oldPassword">Old Password</label>
                    <input type="password" id="oldPassword" name="oldPassword" placeholder="********">
                    @error('oldPassword')
                        <span class="text-danger validation-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-form mb-3">
                    <label for="newPassword">New Password</label>
                    <input type="password" id="newPassword" name="newPassword" placeholder="********">
                    @error('newPassword')
                        <span class="text-danger validation-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="sec-profile-btn mt-3">
                    <a href="{{ route('user.list') }}">
                        <button class="back-btn" type="button">
                            Back
                        </button>
                    </a>
                    <button type="submit" class="update-btn">Update</button>
                </div>
            </form>
        </section>
    </div>
@endsection

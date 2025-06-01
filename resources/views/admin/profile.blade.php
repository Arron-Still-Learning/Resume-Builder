@extends('admin.master')

@section('title', 'Profile')

@section('content')
    <div class="profile-section">
        <section class="sec-profile">
            <div class="sec-profile-header">
                <h2 class="font32">My Profile Setting</h2>
            </div>
            <form action="{{ route('admin.profile.update', Auth::guard('admin')->user()->id) }}" method="POST"
                class="profile-form" enctype="multipart/form-data">
                @csrf
                <div class="profile-picture">
                    @if (Auth::guard('admin')->user()->image)
                        <img src="{{ asset('storage/profile_image/' . Auth::guard('admin')->user()->image) }}"
                            id="imagePreview" alt="Profile Picture">
                    @else
                        <img src="{{ asset('images/img-profile.png') }}" id="imagePreview" alt="Profile Picture">
                    @endif
                    <label for="upload" class="upload-btn">Choose file</label>
                    <input type="file" name="image" id="upload" hidden>
                </div>
                @error('image')
                    <span class="text-danger validation-message ">{{ $message }}</span>
                @enderror
                <div class="input-form mb-3">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="name"
                        value="{{ old('name', Auth::guard('admin')->user()->name) }}">
                    @error('name')
                        <span class="text-danger validation-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-form mb-3">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="name@gmail.com"
                        value="{{ old('email', Auth::guard('admin')->user()->email) }}">
                    @error('email')
                        <span class="text-danger validation-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="sec-profile-btn mt-3">
                    <a href="{{ url()->previous() }}">
                        <button class="back-btn" type="button">
                            Back
                        </button>
                    </a>
                    <button type="submit" class="update-btn">Update</button>
                </div>
            </form>
        </section>
    </div>
    <script src="{{ asset('js/profile.js') }}"></script>
@endsection

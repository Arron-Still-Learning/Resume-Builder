@extends('user.master')

@section('title', 'Contact Us')

@section('content')
    <div class="profile-section">
        <section class="sec-profile contact">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show border border-0" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="sec-profile-header">
                <h2 class="font32">Contact Us</h2>
            </div>
            <form action="{{ route('user.contact') }}" method="POST" class="profile-form">
                @csrf
                <div class="contact-form">
                    <div class="contact-right-side">
                        <div class="input-form">
                            <label for="sentMail">From:</label>
                            <input type="text" id="sentMail" name="mail" placeholder="Enter your email....." value="{{ old('mail') }}">
                            @error('mail')
                                <span class="text-danger validation-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-form">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" placeholder="Username" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger validation-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-form">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email....." value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger validation-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-form">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="********" value="{{ old('password') }}">
                            @error('password')
                                <span class="text-danger validation-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="contact-left-side">
                        <div class="input-form">
                            <label for="subject">Subject</label>
                            <input type="text" id="subject" name="subject" placeholder="subject" value="{{ old('subject') }}">
                            @error('subject')
                                <span class="text-danger validation-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-form">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="40" rows="7" class="form-control">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="sec-profile-btn contact-btn">
                    <a href="{{ route('welcome.page') }}">Back</a>
                    <button type="submit" class="update-btn">Send Mail</button>
                </div>
            </form>
        </section>
    </div>
@endsection

@extends('user.master')

@section('title', 'Welcome')

@section('content')
    <section class="sec-resume">
        <div class="l-inner d-flex">
            <div class="sec-resume-txt">
                <span class="font15">Online Resume Builder</span>
                <h2 class="font36">Build a new CV step-by-step for free</h2>
                <p class="font14">Use professional field-tested resume templates that follow the exact ‘resume
                    rules’ employers look for. Easy to use and done within minutes - try now for<span> free!</span>
                </p>
                <a href="{{ route('user.resume.create') }}"><button class="btn-resume">Create my resume</button></a>
            </div>
            <div class="sec-resume-img">
                <img src="{{ asset('images/bg-image.jpg') }}" alt="Stores">
            </div>
        </div>
    </section>
    <!-- create resume -->
    <div class="resume-tamplate">
        <div class="l-inner d-flex box-space-around">
            <div class="template">
                <a href="#">
                    <img src="{{ asset('images/resume1.png') }}" alt="Template">
                </a>
            </div>
            <div class="template">
                <a href="#">
                    <img src="{{ asset('images/resume2.png') }}" alt="Template">
                </a>
            </div>
            <div class="template">
                <a href="#">
                    <img src="{{ asset('images/resume3.png') }}" alt="Template">
                </a>
            </div>
        </div>
    </div>
    <!-- resume-template -->
    <section class="sec-resume-guide">
        <div class="l-inner d-flex">
            <div class="sec-resume-guide-txt">
                <div class="guide-container">
                    <span class="font12">START BUILDING YOUR CAREER</span>
                    <h2 class="font36">Professional resumes<br>
                        for effective job <br>interviews</h2>
                    <p>A great job application leads to a good interview. An amazing resume is what makes it all
                        possible. Start off strong with the hiring manager by creating a positive professional
                        image. A job interview can be much easier if they have a favorable view of your resume and
                        cover letter.</p>
                    <a href="{{ route('user.resume.create') }}"><button class="btn-resume">Get Started Now</button></a>
                </div>
            </div>
            <div class="sec-resume-guide-img">
                <img src="{{ asset('images/img-resume-guide.webp') }}" alt="Resume">
            </div>
        </div>
    </section>
    <!-- sec-resume-guide -->
    <footer class="bg-dark p-2">
        <div class="footer-content">
            <p class="text-white text-center">&copy; 2024 Resume Builder. All rights reserved.</p>
        </div>
    </footer>
    <!-- end footer -->
@endsection

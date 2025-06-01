<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="{{ asset('css/template2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
</head>

<body>
    <div class="button-container">
        <div class="">
            <a href="{{ route('user.resume.change') }}" class="change-button">Change Template</a>
        </div>
        <div class="">
            <a href="{{ route('user.resume.generatepdf', 2) }}" class="change-button">Download</a>
        </div>
    </div>

    <main class="main-content">
        <section class="left-section">
            <div class="profile sect">
                <div class="image">
                    <img src="{{ isset($personalDetail->photo_path) ? asset('storage/' . $personalDetail->photo_path) : asset('images/resume1.webp') }}"
                        alt="Resume Photo">
                </div>
                <h2 class="name">{{ $personalDetail->full_name }}</h2>
                @if(!empty($personalDetail->designations->first()->designation))
                <p class="career">{{ $personalDetail->designations->first()->designation }}</p>
            @endif
                <div class="personal-info">
                    <h3 class="main-title">Personal Information</h3>
                    <ul>
                        <li style="list-style-type: none">
                            {{-- <i class="fa fa-calendar"></i> --}}
                            <img class="personal-logo" src="{{ asset('images/calendar.svg') }}" alt="Description of Image" >
                            Date of Birth: {{ $personalDetail->date_of_birth }}
                        </li>
                        <li style="list-style-type: none">
                            <img class="personal-logo" src="{{ asset('images/location.svg') }}" alt="Description of Image" >
                            {{-- <i class="fa fa-map-marker"></i> --}}
                            Address: {{ $personalDetail->address }}
                        </li>
                        <li style="list-style-type: none">
                            <img class="personal-logo" src="{{ asset('images/email.png') }}" alt="Description of Image" >
                            {{-- <i class="fa fa-envelope"></i> --}}
                            Email: {{ $personalDetail->email }}
                        </li>
                        <li style="list-style-type: none">
                            <img class="personal-logo" src="{{ asset('images/phone.png') }}" alt="Description of Image" >
                            {{-- <i class="fa fa-phone"></i> --}}
                            Phone: {{ $personalDetail->phone_number }}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="skills-section sect">
                @if($personalDetail->skills->contains(function ($skill) {
                    return !empty($skill->skill_name);
                }))
                    <h3 class="main-title">Skills</h3>
                    <ul id="skills-list">
                        @foreach($personalDetail->skills as $skill)
                            @if(!empty($skill->skill_name))
                                <li style="list-style-type: none">
                                    <p class="skill-title">{{ $skill->skill_name }}:
                                        <span class="skill-level" data-skill="{{ $skill->skill_name }}">{{ $skill->skill_level }}</span>
                                    </p>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="languages sect">
                @if($personalDetail->languages->contains(function ($language) {
                    return !empty($language->language_name);
                }))
                    <h3 class="main-title">Languages</h3>
                    <ul id="languages-list">
                        @foreach($personalDetail->languages as $language)
                            @if(!empty($language->language_name))
                                <li style="list-style-type: none">
                                    <p class="skill-title">{{ $language->language_name }}:
                                        <span class="skill-level" data-skill="{{ $language->language_name }}">{{ $language->proficiency }}</span>
                                    </p>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @endif
            </div>


            <div class="projects sect">
                @if($personalDetail->projects->contains(function ($project) {
                    return !empty($project->project_name);
                }))
                    <h2 class="right-title">Projects</h2>
                    @foreach($personalDetail->projects as $project)
                        <div class="project">
                            <h3 class="tl-title">{{ $project->project_name }}</h3>
                            <p class="para">{{ $project->description }}</p>
                        </div>
                    @endforeach
                @endif
        </section>
        <section class="right-section">
            <div class="right-main-content">
                <section class="about sect">
                    @if(!empty($personalDetail->objectives->first()->objective))
                    <h2 class="right-title">Objective</h2>
                    <p class="para">{{ $personalDetail->objectives->first()->objective }}</p>
                @endif
                </section>
                <section class="experience sect">
                    @if($personalDetail->experiences->contains(function ($experience) {
                        return !empty($experience->company);
                    }))
                        <h2 class="right-title">Experience</h2>
                        @foreach($personalDetail->experiences as $experience)
                            <div class="timeline">
                                <div class="left-tl-content">
                                    <h5 class="tl-title">{{ $experience->company }}</h5>
                                    <p class="para">{{ $experience->start_date }} - {{ $experience->end_date }}</p>
                                </div>
                                <div class="right-tl-content">
                                    <div class="tl-content">
                                        <h5 class="tl-title-2">{{ $experience->position }}</h5>
                                        <p class="para">{{ $experience->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </section>

                <section class="education sect">
                    @if($personalDetail->educations->contains(function ($edu) {
                        return !empty($edu->institution);
                    }))
                        <h2 class="right-title">Education</h2>
                        @foreach($personalDetail->educations as $edu)
                            <div class="timeline">
                                <div class="left-tl-content">
                                    <h5 class="tl-title">{{ $edu->institution }}</h5>
                                    <p class="para">{{ $edu->start_date }} - {{ $edu->end_date }}</p>
                                </div>
                                <div class="right-tl-content">
                                    <div class="tl-content">
                                        <h5 class="tl-title-2">{{ $edu->degree }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </section>
            </div>
        </section>
    </main>

</body>

</html>

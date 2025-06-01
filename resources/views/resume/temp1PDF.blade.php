<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="{{ public_path('css/template.css') }}">
    <style>
        .right-section {
            width: 69.2%;
            height: 99.3%
        }

        .left-section {
            width: 25%;
            height: 99.3%;
        }
    </style>
</head>

<body>
    <main class="main-content">
        <section class="left-section">
            <div class="profile">
                <div class="image">
                    <img src="{{ isset($personalDetail->photo_path) ? public_path('storage/' . $personalDetail->photo_path) : public_path('images/resume1.webp') }}"
                        alt="Resume Photo">
                </div>
                <h2 class="name">{{ $personalDetail->full_name }}</h2>
                <p class="career">{{ $personalDetail->designations->first()->designation }}</p>
            </div>
            <div class="personal-info">
                <h3 class="main-title">Personal Information</h3>
                <ul>
                    <li>
                        <i class="fa fa-calendar"></i>
                        Date of Birth: {{ $personalDetail->date_of_birth }}
                    </li>
                    <li>
                        <i class="fa fa-map-marker"></i>
                        Address: {{ $personalDetail->address }}
                    </li>
                    <li>
                        <i class="fa fa-envelope"></i>
                        Email: {{ $personalDetail->email }}
                    </li>
                    <li>
                        <i class="fa fa-phone"></i>
                        Phone: {{ $personalDetail->phone_number }}
                    </li>
                </ul>
            </div>

            <div class="skills-section">
                <h3 class="main-title">Skills</h3>
                <ul id="skills-list">
                    @foreach ($personalDetail->skills as $skill)
                        <li>
                            <p class="skill-title">{{ $skill->skill_name }}: <span class="skill-level"
                                    data-skill="{{ $skill->skill_name }}">{{ $skill->skill_level }}</span></p>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="languages sect">
                <h3 class="main-title">Languages</h3>
                <ul id="languages-list">
                    @foreach ($personalDetail->languages as $language)
                        <li>
                            <p class="skill-title">{{ $language->language_name }}: <span class="skill-level"
                                    data-skill="{{ $language->language_name }}">{{ $language->proficiency }}</span>
                            </p>
                        </li>
                    @endforeach
                </ul>
            </div>

        </section>
        <section class="right-section">
            <div class="right-main-content">
                <section class="about sect">
                    <h2 class="right-title">Objective</h2>
                    <p class="para">
                        {{ $personalDetail->objectives->first()->objective }}
                    </p>
                </section>
                <section class="experience sect">
                    <h2 class="right-title">Experience</h2>
                    @foreach ($personalDetail->experiences as $experience)
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
                </section>

                <section class="education sect">
                    <h2 class="right-title">Education</h2>
                    @foreach ($personalDetail->educations as $edu)
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
                </section>

                <section class="projects sect">
                    <h2 class="right-title">Projects</h2>
                    @foreach ($personalDetail->projects as $project)
                        <div class="project">
                            <h3 class="tl-title">{{ $project->project_name }}</h3>
                            <p class="para">{{ $project->description }}</p>
                        </div>
                    @endforeach
                </section>

            </div>
        </section>
    </main>
</body>

</html>

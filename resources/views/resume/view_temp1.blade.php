<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="{{ public_path('css/template.css') }}">
    {{-- <link href="https://fonts.googleapis.com/css2?family=Inria:wght@300;400;600&display=swap" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
</head>

<body>
    <main class="main-content">
        <section class="left-section">
            <div class="profile">
                <div class="image">
                    <img src="{{ public_path('images/resume1.webp') }}" alt="Demo Photo">
                </div>
                <h2 class="name">Marry</h2>
                <p class="career">Web Developer</p>
            </div>
            <div class="personal-info">
                <h3 class="main-title">Personal Information</h3>
                <ul>
                    <li>
                        <i class="fa fa-calendar"></i>
                        Date of Birth: 7th June 2000
                    </li>
                    <li>
                        <i class="fa fa-map-marker"></i>
                        Address: [Your City, Country]
                    </li>
                    <li>
                        <i class="fa fa-envelope"></i>
                        Email: resumeBuilder@gmail.com
                    </li>
                    <li>
                        <i class="fa fa-phone"></i>
                        Phone: 09123456789
                    </li>
                </ul>
            </div>
            <div class="skills-section">
                <h3 class="main-title">Skills</h3>
                <ul id="skills-list">
                    <li>
                        <p class="skill-title">Javascript: <span class="skill-level" data-skill="javascript"></span></p>
                    </li>
                    <li>
                        <p class="skill-title">Photoshop: <span class="skill-level" data-skill="photoshop"></span></p>
                    </li>
                    <li>
                        <p class="skill-title">PHP: <span class="skill-level" data-skill="php"></span></p>
                    </li>
                </ul>
            </div>
            <div class="languages sect">
                <h3 class="main-title">Languages</h3>
                <ul id="skills-list">
                    <li>
                        <p class="skill-title">Japanese: <span class="skill-level" data-skill="javascript"></span></p>
                    </li>
                    <li>
                        <p class="skill-title">Chinese: <span class="skill-level" data-skill="photoshop"></span></p>
                    </li>
                    <li>
                        <p class="skill-title">English: <span class="skill-level" data-skill="php"></span></p>
                    </li>
                </ul>
            </div>
        </section>
        <section class="right-section">
            <div class="right-main-content">
                <section class="about sect">
                    <h2 class="right-title">Objective</h2>
                    <p class="para">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam molestias facilis ullam
                        dolorum, reprehenderit dolorem accusantium sit quo <br>
                    </p>
                </section>
                <section class="experience sect">
                    <h2 class="right-title">Experience</h2>
                    <div class="timeline">
                        <div class="left-tl-content">
                            <h5 class="tl-title">Microsoft</h5>
                            <p class="para">2017 - 2019</p>
                        </div>
                        <div class="right-tl-content">
                            <div class="tl-content">
                                <h5 class="tl-title-2">Junior Developer</h5>
                                <p class="para">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias cupiditate vitae
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="timeline">
                        <div class="left-tl-content">
                            <h5 class="tl-title">Microsoft</h5>
                            <p class="para">2017 - 2019</p>
                        </div>
                        <div class="right-tl-content">
                            <div class="tl-content">
                                <h5 class="tl-title-2">Junior Developer</h5>
                                <p class="para">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias cupiditate vitae
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="timeline">
                        <div class="left-tl-content">
                            <h5 class="tl-title">Microsoft</h5>
                            <p class="para">2017 - 2019</p>
                        </div>
                        <div class="right-tl-content">
                            <div class="tl-content">
                                <h5 class="tl-title-2">Junior Developer</h5>
                                <p class="para">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias cupiditate vitae
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="education sect">
                    <h2 class="right-title">Education</h2>
                    <div class="timeline">
                        <div class="left-tl-content">
                            <h5 class="tl-title">Cheney School</h5>
                            <p class="para">2015 - 2016</p>
                        </div>
                        <div class="right-tl-content">
                            <div class="tl-content">
                                <h5 class="tl-title-2">Gcse's</h5>
                                <p class="para">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias cupiditate vitae
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="projects sect">
                    <h2 class="right-title">Projects</h2>
                    <div class="project">
                        <h3 class="tl-title">Project Name 1</h3>
                        <p class="para">Description of the project goes here.</p>
                    </div>
                    <div class="project">
                        <h3 class="tl-title">Project Name 2</h3>
                        <p class="para">Description of the project goes here.</p>
                    </div>
                    <div class="project">
                        <h3 class="tl-title">Project Name 3</h3>
                        <p class="para">Description of the project goes here.</p>
                    </div>
                </section>
            </div>
        </section>
    </main>
</body>

</html>


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tagoloan Community College - Student Management System</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            /*! tailwindcss simplified */
            @layer base {
                * { box-sizing: border-box; margin: 0; padding: 0; }
                body { font-family: 'Instrument Sans', sans-serif; }
            }
            @layer utilities {
                .flex { display: flex; }
                .items-center { align-items: center; }
                .justify-between { justify-content: space-between; }
                .justify-end { justify-content: flex-end; }
                .gap-4 { gap: 1rem; }
                .w-full { width: 100%; }
                .h-full { height: 100%; }
                .object-cover { object-fit: cover; }
                .rounded-lg { border-radius: 0.5rem; }
                .overflow-hidden { overflow: hidden; }
                .text-primary { color: #2C5282; }
                .bg-primary { background-color: #2C5282; }
                .hover-bg-primary {
                    transition: background-color 0.3s ease, color 0.3s ease;
                }
                .hover-bg-primary:hover {
                    background-color: #2C5282;
                    color: white;
                }
                .container { max-width: 1280px; margin: 0 auto; padding: 0 1.5rem; }
                .section { padding: 5rem 0; }
                .section-header {
                    font-size: 2.5rem;
                    font-weight: 700;
                    margin-bottom: 2rem;
                    position: relative;
                    text-align: center;
                }
                .section-header:after {
                    content: '';
                    position: absolute;
                    bottom: -10px;
                    left: 50%;
                    transform: translateX(-50%);
                    width: 80px;
                    height: 4px;
                    background-color: #2C5282;
                }
                .btn {
                    padding: 0.75rem 1.5rem;
                    border-radius: 0.5rem;
                    font-weight: 600;
                    transition: all 0.3s ease;
                    text-decoration: none;
                    display: inline-block;
                }
                .btn-primary {
                    background-color: #2C5282;
                    color: white;
                }
                .btn-primary:hover {
                    background-color: #1a365d;
                    transform: translateY(-2px);
                    box-shadow: 0 4px 12px rgba(44, 82, 130, 0.25);
                }
                .shadow-lg { box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); }
                .rounded-xl { border-radius: 0.75rem; }
                .text-lg { font-size: 1.125rem; }
                .text-xl { font-size: 1.25rem; }
                .text-2xl { font-size: 1.5rem; }
                .font-semibold { font-weight: 600; }
                .font-bold { font-weight: 700; }
                .mb-4 { margin-bottom: 1rem; }
                .mb-6 { margin-bottom: 1.5rem; }
                .mt-4 { margin-top: 1rem; }
                .mt-6 { margin-top: 1.5rem; }
                .py-6 { padding-top: 1.5rem; padding-bottom: 1.5rem; }
                .px-6 { padding-left: 1.5rem; padding-right: 1.5rem; }
                .max-w-7xl { max-width: 80rem; }
                .mx-auto { margin-left: auto; margin-right: auto; }
                .fixed { position: fixed; }
                .relative { position: relative; }
                .absolute { position: absolute; }
                .top-0 { top: 0; }
                .left-0 { left: 0; }
                .z-50 { z-index: 50; }
                .bg-white { background-color: white; }
                .bg-gray-50 { background-color: #f8fafc; }
                .border-b { border-bottom-width: 1px; }
                .border-white { border-color: white; }
                .backdrop-blur-sm { backdrop-filter: blur(4px); }
                .transition { transition: all 0.3s ease; }
                .hover-shadow {
                    transition: box-shadow 0.3s ease;
                }
                .hover-shadow:hover {
                    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.12);
                }
                .text-center { text-align: center; }
                .hidden { display: none; }

                /* Enhanced Infinite Photo Slider - Alternating Direction */
                .photo-slider {
                    display: flex;
                    overflow: hidden;
                    width: 100%;
                    margin-top: 2rem;
                }
                .photo-track {
                    display: flex;
                    animation: scroll 30s linear infinite;
                    width: max-content;
                }
                .photo-track.reverse {
                    animation: scrollReverse 30s linear infinite;
                }
                .photo-track:hover {
                    animation-play-state: paused;
                }
                .photo-slide {
                    min-width: 260px;
                    height: 240px;
                    margin: 0 1rem;
                    border-radius: 0.75rem;
                    overflow: hidden;
                    box-shadow: 0 6px 16px rgba(0,0,0,0.08);
                    background: white;
                    display: flex;
                    flex-direction: column;
                    transition: transform 0.4s ease;
                }
                .photo-slide:hover {
                    transform: translateY(-6px);
                }
                .photo-slide img {
                    width: 100%;
                    height: 160px;
                    object-fit: cover;
                }
                .photo-slide p {
                    padding: 0 0.75rem;
                    font-size: 0.95rem;
                    text-align: center;
                }
                .photo-slide .font-semibold {
                    margin-top: 0.5rem;
                    color: #2C5282;
                }
                @keyframes scroll {
                    0% { transform: translateX(0); }
                    100% { transform: translateX(-50%); }
                }
                @keyframes scrollReverse {
                    0% { transform: translateX(-50%); }
                    100% { transform: translateX(0); }
                }

                @media (max-width: 768px) {
                    .photo-slide {
                        min-width: 220px;
                        height: 220px;
                    }
                    .photo-slide img {
                        height: 140px;
                    }
                }

                @media (min-width: 1024px) {
                    .lg:flex { display: flex; }
                    .lg:items-center { align-items: center; }
                    .lg:justify-between { justify-content: space-between; }
                    .lg:flex-row { flex-direction: row; }
                    .lg:w-1/2 { width: 50%; }
                    .lg:pr-12 { padding-right: 3rem; }
                    .lg:pl-12 { padding-left: 3rem; }
                    .lg:pt-0 { padding-top: 0; }
                }
                @media (max-width: 1023px) {
                    .flex-col { flex-direction: column; }
                    .text-center { text-align: center; }
                    .mb-8 { margin-bottom: 2rem; }
                    .px-4 { padding-left: 1rem; padding-right: 1rem; }
                }
            }
        </style>
    @endif
</head>
<body class="bg-[#FDFDFC] text-[#2C5282] flex flex-col min-h-screen">
    <!-- Header: Professional Navbar -->
    <header class="w-full border-b border-gray-100 bg-white backdrop-blur-sm fixed top-0 left-0 z-50">
        <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-3">
            <!-- Logo -->
            <div class="flex items-center gap-3">
                <img src="{{ asset('./assets/images/tcc.png') }}" alt="Tagoloan Community College Logo" class="h-10 w-auto">
                <span class="text-lg font-bold tracking-wide text-[#2C5282]">
                    TCC Student Management
                </span>
            </div>

            <!-- Navigation + Auth Links -->
            <nav class="flex items-center gap-6">
                <!-- Main Nav with Icons -->
                <a href="#" class="flex items-center gap-1 font-medium hover:text-[#1a365d] transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9.75L12 4l9 5.75M4.5 10.5V19a2 2 0 002 2h11a2 2 0 002-2v-8.5" />
                    </svg>
                    Home
                </a>

                <a href="#about" class="flex items-center gap-1 font-medium hover:text-[#1a365d] transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0v6m-6 0h12" />
                    </svg>
                    About
                </a>

                <a href="#contact" class="flex items-center gap-1 font-medium hover:text-[#1a365d] transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Contact
                </a>

                <!-- Auth Links -->
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                        class="px-5 py-2 text-base font-semibold text-[#2C5282] bg-white border-2 border-[#2C5282] rounded-lg hover:bg-[#2C5282] hover:text-white transition">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                        class="px-4 py-2 text-base font-semibold text-[#2C5282] border-2 border-[#2C5282] rounded-md hover:bg-[#2C5282] hover:text-white transition">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                            class="px-4 py-2 text-base font-semibold bg-[#2C5282] text-white rounded-md hover:bg-[#1a365d] transition">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </nav>
        </div>
    </header>

    <main class="flex flex-col w-full pt-19">
    <!-- Hero Section -->
    <section class="relative w-full h-[700px] overflow-hidden shadow-lg">
        <div class="absolute inset-0 bg-gradient-to-r from-[#2C5282]/80 to-transparent z-10"></div>
        <img src="./assets/images/sms10.png" alt="Student Management System" class="w-full h-full object-cover">
        
        <!-- 3D Carousel for Developers -->
        <div class="absolute left-8 top-1/2 -translate-y-1/2 z-30 w-64 h-80">
            <div class="carousel-container perspective-1000">
                <div class="carousel-track" id="developerCarousel">
                    <!-- Developer Card 1 -->
                    <div class="carousel-card">
                        <div class="card-inner bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 shadow-2xl">
                            <div class="w-20 h-20 mx-auto mb-3 rounded-full overflow-hidden border-4 border-white/30 shadow-lg">
                               <img src="./assets/images/imagev1.png" alt="Project Manager" class="w-full h-full object-cover">

                            </div>
                            <h3 class="text-white text-lg font-bold text-center mb-1">Project Manager</h3>
                            <p class="text-white/80 text-xs text-center">Team Lead</p>
                        </div>
                    </div>
                    
                    <!-- Developer Card 2 -->
                    <div class="carousel-card">
                        <div class="card-inner bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 shadow-2xl">
                            <div class="w-20 h-20 mx-auto mb-3 rounded-full overflow-hidden border-4 border-white/30 shadow-lg">
                                <img src="./assets/images/image2.png" alt="System Analyst" class="w-full h-full object-cover">
                            </div>
                            <h3 class="text-white text-lg font-bold text-center mb-1">System Analyst</h3>
                            <p class="text-white/80 text-xs text-center">Requirements Specialist</p>
                        </div>
                    </div>
                    
                    <!-- Developer Card 3 -->
                    <div class="carousel-card">
                        <div class="card-inner bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 shadow-2xl">
                            <div class="w-20 h-20 mx-auto mb-3 rounded-full overflow-hidden border-4 border-white/30 shadow-lg">
                                <img src="./assets/images/image3.png" alt="Technical Writer" class="w-full h-full object-cover">
                            </div>
                            <h3 class="text-white text-lg font-bold text-center mb-1">Technical Writer</h3>
                            <p class="text-white/80 text-xs text-center">Documentation Expert</p>
                        </div>
                    </div>
                    
                    <!-- Developer Card 4 -->
                    <div class="carousel-card">
                        <div class="card-inner bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 shadow-2xl">
                            <div class="w-20 h-20 mx-auto mb-3 rounded-full overflow-hidden border-4 border-white/30 shadow-lg">
                                <img src="./assets/images/image4.png" alt="Frontend Developer" class="w-full h-full object-cover">
                            </div>
                            <h3 class="text-white text-lg font-bold text-center mb-1">Frontend Developer</h3>
                            <p class="text-white/80 text-xs text-center">Interface Specialist</p>
                        </div>
                    </div>
                    
                    <!-- Developer Card 5 -->
                    <div class="carousel-card">
                        <div class="card-inner bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 shadow-2xl">
                            <div class="w-20 h-20 mx-auto mb-3 rounded-full overflow-hidden border-4 border-white/30 shadow-lg">
                                <img src="./assets/images/image5.jpg" alt="Backend Developer" class="w-full h-full object-cover">
                            </div>
                            <h3 class="text-white text-lg font-bold text-center mb-1">Backend Developer</h3>
                            <p class="text-white/80 text-xs text-center">System Architect</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="absolute inset-0 z-20 flex items-center justify-start">
        <div class="container text-white max-w-3xl flex flex-col justify-center h-full transform translate-y-1/4">
            <!-- Align content to left -->
            <div class="text-left">
                <!-- Main Welcome -->
                <h1 class="text-4xl md:text-5xl font-bold mb-2">Welcome to Tagoloan Community College</h1>
                <p class="text-xl font-bold opacity-90 mb-4">Empowering students through innovation, integrity, and excellence.</p>

                <!-- Squad Quotes -->
                <div class="space-y-1 q">
                    <p class="text-lg font-bold italic opacity-90">"We build systems with pride, making every click count!"</p>
                    <p class="text-lg font-bold italic opacity-90">"Coding today, shaping the future tomorrow."</p>
                    <p class="text-lg font-bold italic opacity-90">"Every feature we craft is a step toward excellence."</p>
                    <p class="text-sm font-bold mt-1">— BATAK MAGPA BABY</p>
                </div>
            </div>
        </div>
    </div>
    </section>

    <style>
        .perspective-1000 {
            perspective: 1000px;
            width: 100%;
            height: 100%;
            position: relative;
        }
        
        .carousel-track {
            position: relative;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            animation: rotate3d 25s infinite linear;
        }
        
        .carousel-card {
            position: absolute;
            width: 220px;
            height: 260px;
            left: 50%;
            top: 50%;
            transform-style: preserve-3d;
            transition: all 0.5s ease;
        }
        
        .carousel-card:nth-child(1) {
            transform: translate(-50%, -50%) rotateY(0deg) translateZ(300px);
        }
        
        .carousel-card:nth-child(2) {
            transform: translate(-50%, -50%) rotateY(72deg) translateZ(300px);
        }
        
        .carousel-card:nth-child(3) {
            transform: translate(-50%, -50%) rotateY(144deg) translateZ(300px);
        }
        
        .carousel-card:nth-child(4) {
            transform: translate(-50%, -50%) rotateY(216deg) translateZ(300px);
        }
        
        .carousel-card:nth-child(5) {
            transform: translate(-50%, -50%) rotateY(288deg) translateZ(300px);
        }
        
        .card-inner {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            transform: rotateY(0deg);
            backface-visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .card-inner:hover {
            transform: scale(1.05);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
        }
        
        .card-inner img {
            transition: transform 0.3s ease;
        }
        
        .card-inner:hover img {
            transform: scale(1.1);
        }
        
        @keyframes rotate3d {
            0% {
                transform: rotateY(0deg);
            }
            100% {
                transform: rotateY(360deg);
            }
        }
        
        /* Pause animation on hover */
        .carousel-container:hover .carousel-track {
            animation-play-state: paused;
        }
    </style>

    <!-- About Us Section -->
    <section id="about" class="section bg-white">
        <div class="container px-6 md:px-10 lg:px-12">
            <div class="flex flex-col lg:flex-row items-start gap-12">
                <div class="lg:w-1/4 flex-shrink-0 flex flex-col items-center lg:items-start">
                    <div class="pt-6">
                        <img src="./assets/images/tcc.png"
                            alt="Tagoloan Community College Campus" class="w-full h-auto rounded-xl hover-shadow max-w-xs">
                        <h2 class="text-[#2C5282] font-bold text-xl mt-4 text-center lg:text-left">
                            About Tagoloan Community College
                        </h2>
                    </div>
                </div>
                <div class="lg:w-3/4 pt-6 lg:pt-8">
                    <div class="pr-0 lg:pr-8">
                        <p class="text-lg mb-6 leading-relaxed">
                            Tagoloan Community College is dedicated to providing quality education that empowers students
                            to become productive members of society. Our Student Management System represents our commitment
                            to leveraging technology for educational excellence.
                        </p>
                        <p class="text-lg mb-6 leading-relaxed">
                            With a focus on innovation and student-centered learning, we've developed a comprehensive
                            platform that streamlines administrative processes, enhances communication, and supports
                            academic success for all our students.
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h3 class="font-bold text-xl mb-2">Mission</h3>
                                <p class="leading-relaxed">
                                    To provide accessible, quality education that develops competent and morally upright individuals.
                                </p>
                            </div>
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h3 class="font-bold text-xl mb-2">Vision</h3>
                                <p class="leading-relaxed">
                                    To be a premier community college recognized for excellence in instruction, research, and community service.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- What is Tagoloan Section -->
    <section class="section bg-white py-8 md:py-12">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center gap-8 md:gap-16">
                <!-- Text Content (Left Side) -->
                <div class="lg:w-2/5 px-2 md:px-4">
                    <h3 class="text-2xl md:text-3xl font-bold mb-5">The Heart of Our Community</h3>
                    <p class="text-base md:text-lg mb-5">
                        Tagoloan, located in the province of Misamis Oriental, Philippines, is a vibrant municipality
                        known for its rich cultural heritage, beautiful landscapes, and progressive community.
                        The Tagoloan Community College serves as an educational beacon for the region.
                    </p>
                    <p class="text-base md:text-lg mb-6">
                        Our college is deeply rooted in the values of the Tagoloan community – integrity, excellence,
                        service, and innovation. We take pride in being an institution that not only educates but
                        also preserves and promotes our local culture and traditions.
                    </p>
                    <div class="mt-6">
                        <h4 class="font-bold text-xl mb-3">Why Choose TCC?</h4>
                        <ul class="space-y-2.5">
                            <li class="flex items-start">
                                <span class="text-[#2C5282] font-bold mr-3 mt-0.5">•</span>
                                <span>Community-focused education tailored to local needs</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-[#2C5282] font-bold mr-3 mt-0.5">•</span>
                                <span>Modern facilities with cutting-edge technology</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-[#2C5282] font-bold mr-3 mt-0.5">•</span>
                                <span>Experienced faculty dedicated to student success</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-[#2C5282] font-bold mr-3 mt-0.5">•</span>
                                <span>Strong industry partnerships for career development</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- ENLARGED Image Slider (Right Side) -->
                <div class="lg:w-3/5">
                    <div class="relative rounded-xl overflow-hidden shadow-xl border border-gray-100">
                        <!-- Slider Container - Taller & Wider -->
                        <div id="tagoloanSlider" class="relative h-[400px] sm:h-[450px] md:h-[500px] lg:h-[550px]">
                            <!-- Slides Wrapper -->
                            <div class="absolute inset-0 flex transition-transform duration-700 ease-in-out">
                                <img src="./assets/images/tcchym1.png" alt="Tagoloan Community College" class="w-full h-full object-cover flex-shrink-0">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNFFoMKE94P75LWttGWQ8tkE22bS5U7TZFsNQOcuLUXmDC-oDXdZdjgzRWbFWgO4wCZfU&usqp=CAU" alt="Tagoloan Landscape" class="w-full h-full object-cover flex-shrink-0">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFur_DXqf0hY0uB3GaDdJlGmLv0Dj10JskhVz90Y_pRu_iH1fuI9wkJY2Be5Weckqfdj4&usqp=CAU" alt="Students at TCC" class="w-full h-full object-cover flex-shrink-0">
                                <!-- Add more images here if needed -->
                            </div>
                        </div>

                        <!-- Navigation Arrows -->
                        <button id="prevBtn" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-3 rounded-full shadow-lg transition-all duration-300 z-20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button id="nextBtn" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-3 rounded-full shadow-lg transition-all duration-300 z-20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>

                        <!-- Dots Indicator -->
                        <div id="sliderDots" class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex space-x-3 z-20">
                            <button class="w-3 h-3 rounded-full bg-white/90"></button>
                            <button class="w-3 h-3 rounded-full bg-white/50"></button>
                            <button class="w-3 h-3 rounded-full bg-white/50"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slider JavaScript -->
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const sliderWrapper = document.querySelector('#tagoloanSlider > div');
                const prevBtn = document.getElementById('prevBtn');
                const nextBtn = document.getElementById('nextBtn');
                const dots = document.querySelectorAll('#sliderDots button');
                
                let currentIndex = 0;
                const totalSlides = dots.length;

                function updateSlider() {
                    sliderWrapper.style.transform = `translateX(-${currentIndex * 100}%)`;
                    
                    // Update active dot
                    dots.forEach((dot, index) => {
                        dot.className = index === currentIndex 
                            ? 'w-3 h-3 rounded-full bg-white/90' 
                            : 'w-3 h-3 rounded-full bg-white/50';
                    });
                }

                nextBtn.addEventListener('click', () => {
                    currentIndex = (currentIndex + 1) % totalSlides;
                    updateSlider();
                });

                prevBtn.addEventListener('click', () => {
                    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                    updateSlider();
                });

                dots.forEach((dot, index) => {
                    dot.addEventListener('click', () => {
                        currentIndex = index;
                        updateSlider();
                    });
                });

                // Auto-rotate every 6 seconds
                setInterval(() => {
                    currentIndex = (currentIndex + 1) % totalSlides;
                    updateSlider();
                }, 6000);
            });
        </script>
    </section>

    <!-- Features Section -->
    <section class="section bg-gray-50">
        <div class="container flex justify-center items-center">
            <p class="text-xl text-center mb-12 max-w-4xl font-bold px-10 py-8">
                Our Student Management System is designed to simplify academic life for students, faculty, and administrators.
            </p>
        </div>
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-xl hover-shadow transition">
                    <div class="w-16 h-16 bg-[#2C5282] text-white flex items-center justify-center rounded-lg mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Academic Records</h3>
                    <p class="text-lg">Access grades, transcripts, and academic history with just a few clicks.</p>
                </div>

                <div class="bg-white p-8 rounded-xl hover-shadow transition">
                    <div class="w-16 h-16 bg-[#2C5282] text-white flex items-center justify-center rounded-lg mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Schedule Management</h3>
                    <p class="text-lg">View your class schedule, exam dates, and important academic events.</p>
                </div>

                <div class="bg-white p-8 rounded-xl hover-shadow transition">
                    <div class="w-16 h-16 bg-[#2C5282] text-white flex items-center justify-center rounded-lg mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Communication Hub</h3>
                    <p class="text-lg">Connect with professors and classmates through our messaging system.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Departments Showcase -->
    <section class="section bg-white py-12">
    <div class="container mx-auto text-center">
        <h2 class="section-header font-bold text-3xl">Our Departments</h2>
        <p class="mt-4 max-w-5xl mx-auto text-gray-600 font-medium leading-relaxed">
        Tagoloan Community College is dedicated to providing quality education that nurtures 
        talent, builds strong character, and equips students with the skills needed to thrive 
        in their chosen fields. Our diverse departments reflect our commitment to academic 
        excellence and community development, ensuring that every learner is prepared to 
        contribute meaningfully to society and the world.
        </p>
    </div>

    <div class="container mx-auto mt-12 overflow-hidden">
        <div class="slider-container">
        <div class="slider-track slider-right">
            <!-- Department Cards -->
            <div class="photo-slide">
            <img src="https://www.tcc.edu.ph/assets/logo/arts.jpg" alt="College of Arts and Sciences" class="slide-img">
            <p class="font-bold text-xl mt-4">College of Arts and Sciences (CAS)</p>
            <p class="font-bold text-gray-700 text-center">Creativity with purpose.</p>
            </div>
            <div class="photo-slide">
            <img src="https://www.tcc.edu.ph/assets/logo/educ.png" alt="College of Education" class="slide-img">
            <p class="font-bold text-xl mt-4">College of Education (EDUC)</p>
            <p class="font-bold text-gray-700 text-center">Shaping future educators.</p>
            </div>
            <div class="photo-slide">
            <img src="https://www.tcc.edu.ph/assets/logo/blis.png" alt="College of Library and Information Studies" class="slide-img">
            <p class="font-bold text-xl mt-4">College of Library and Information Studies (BLIS)</p>
            <p class="font-bold text-gray-700 text-center">Understanding society.</p>
            </div>
            <div class="photo-slide">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZYtJx3wbtjPu23euXi5IKwcU3GRIcf22qyQ&s" alt="Criminology Department" class="slide-img">
            <p class="font-bold text-xl mt-4">Criminology Department (BSCRIM)</p>
            <p class="font-bold text-gray-700 text-center">Justice & public safety.</p>
            </div>
            <div class="photo-slide">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT8dzuMLEXIobHLGp6FyFPmxsq1vzGtTM6S2HrJBs0YowPtEdmkyxiP-CgZlUO9VpmS9t8&usqp=CAU" alt="College of Business Administration" class="slide-img">
            <p class="font-bold text-xl mt-4">College of Business Administration (BSBA)</p>
            <p class="font-bold text-gray-700 text-center">Leadership & entrepreneurship.</p>
            </div>
            <div class="photo-slide">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJ8L9bPDN-TIVhAVhMVbPIYfmTFiPpqnC-fQ&s" alt="College of Hospitality Management" class="slide-img">
            <p class="font-bold text-xl mt-4">College of Hospitality Management (BSHM)</p>
            <p class="font-bold text-gray-700 text-center">Excellence in service.</p>
            </div>
            <div class="photo-slide">
            <img src="https://www.tcc.edu.ph/assets/logo/it.png" alt="Information Technology Department" class="slide-img">
            <p class="font-bold text-xl mt-4">Information Technology Department (BSIT)</p>
            <p class="font-bold text-gray-700 text-center">Logic & problem-solving.</p>
            </div>
            <div class="photo-slide">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR8sK1Vx6vF9yXvU6vQYJdXh2qZvK1jJvQ&s=10" alt="Midwifery Department" class="slide-img">
            <p class="font-bold text-xl mt-4">Midwifery Department (BSMID)</p>
            <p class="font-bold text-gray-700 text-center">Compassionate maternal care.</p>
            </div>

            <!-- Duplicates for seamless scroll -->
            <div class="photo-slide">
            <img src="https://www.tcc.edu.ph/assets/logo/arts.jpg" alt="College of Arts and Sciences" class="slide-img">
            <p class="font-bold text-xl mt-4">College of Arts and Sciences (CAS)</p>
            <p class="font-bold text-gray-700 text-center">Creativity with purpose.</p>
            </div>
            <div class="photo-slide">
            <img src="https://www.tcc.edu.ph/assets/logo/educ.png" alt="College of Education" class="slide-img">
            <p class="font-bold text-xl mt-4">College of Education (EDUC)</p>
            <p class="font-bold text-gray-700 text-center">Shaping future educators.</p>
            </div>
            <!-- ...repeat duplicates for seamless scroll -->
        </div>
        </div>
    </div>
    </section>

    <style>
    .slider-container {
    overflow: hidden;
    width: 100%;
    position: relative;
    }

    .slider-track {
    display: flex;
    gap: 1.5rem;
    width: max-content;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
    animation-play-state: running !important;
    will-change: transform;
    }

    .slider-right {
    animation: scrollRight 45s infinite linear;
    }

    @keyframes scrollRight {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
    }

    .photo-slide {
    flex: 0 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: #ffffff;
    padding: 1.5rem; /* slightly taller */
    border-radius: 1rem;
    min-width: 260px; /* slightly wider */
    max-width: 300px; /* slightly wider */
    }

    .slide-img {
    width: 11rem; /* slightly wider */
    height: 12rem; /* slightly taller */
    object-fit: cover;
    border-radius: 0.75rem;
    margin-bottom: 1rem;
    }

    /* Mobile adjustments */
    @media (max-width: 768px) {
    .slider-right {
        animation-duration: 60s !important;
    }

    .slide-img {
        width: 9rem;
        height: 10rem;
    }

    .photo-slide {
        min-width: 200px;
        padding: 1.25rem;
    }
    }
    </style>

    </main>
    <!-- Footer -->
    <footer id="contact" class="bg-[#2C5282] text-white py-6 mt-auto">
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Logo + About -->
                <div class="pl-4 md:pl-8">
                    <div class="flex items-center gap-3 mb-4">
                        <img src="{{ asset('./assets/images/tcc.png') }}" alt="Tagoloan Community College Logo" class="h-8 w-auto">
                        <span class="text-lg font-bold">TCC</span>
                    </div>
                    <p class="mb-2">Empowering students through innovative education and technology.</p>
                    <p class="text-xs opacity-80">© 2024 Tagoloan Community College. All rights reserved.</p>
                </div>

                <!-- Quick Links + Contact Info -->
                <div class="grid grid-cols-2 gap-3">
                    <!-- Quick Links -->
                    <div>
                        <h3 class="flex items-center gap-2 text-md font-bold mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                            Quick Links
                        </h3>
                        <ul class="space-y-1">
                            <li><a href="#" class="opacity-90 hover:opacity-100 transition">Home</a></li>
                            <li><a href="#about" class="opacity-90 hover:opacity-100 transition">About Us</a></li>
                            <li><a href="#" class="opacity-90 hover:opacity-100 transition">Academics</a></li>
                            <li><a href="#" class="opacity-90 hover:opacity-100 transition">Admissions</a></li>
                            <li><a href="#contact" class="opacity-90 hover:opacity-100 transition">Contact</a></li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div>
                        <h3 class="flex items-center gap-2 text-md font-bold mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 10c0 6.075-9 12-9 12s-9-5.925-9-12a9 9 0 1118 0z" />
                            </svg>
                            Contact Info
                        </h3>
                        <address class="not-italic space-y-1 text-sm">
                            <p class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 mt-0.5 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Tagoloan, Misamis Oriental, Philippines
                            </p>
                            <p class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                09550057232
                            </p>
                            <p class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Monkey D luffy@gmail.com
                            </p>
                        </address>
                    </div>
                </div>

                <!-- Connect With Us -->
                <div>
                    <h3 class="flex items-center gap-2 text-md font-bold mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2m-4 0h-4a2 2 0 01-2-2V10a2 2 0 012-2h4m0-4h-4a2 2 0 00-2 2v2m6-4v4m0 0v4m0-4h4m-4 0h-4" />
                        </svg>
                        Connect With Us
                    </h3>
                    <p class="mb-2 text-sm">Stay updated with the latest news and events.</p>
                    <form class="space-y-2">
                        <input type="email" placeholder="Your email address" class="w-full px-3 py-1.5 rounded-lg text-[#2C5282] focus:outline-none focus:ring-2 focus:ring-white text-sm">
                        <button type="submit" class="w-full bg-white text-[#2C5282] font-semibold py-1.5 rounded-lg hover:bg-gray-100 transition text-sm">Subscribe</button>
                    </form>
                </div>
            </div>

            <div class="border-t border-white/20 mt-6 pt-4 text-center text-xs opacity-80">
                <p>Tagoloan Community College Student Management System | Designed by Philip Elbambo</p>
            </div>
        </div>
    </footer>
    </body>
    </html>
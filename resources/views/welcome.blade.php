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
        
    <!-- 3D Carousel for Departments -->
    <div class="absolute left-8 top-1/2 -translate-y-1/2 z-30 w-64 h-80">
        <div class="carousel-container perspective-1000">
            <div class="carousel-track" id="developerCarousel">
                <!-- Card 1 -->
                <div class="carousel-card">
                    <div class="card-inner bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 shadow-2xl">
                        <div class="w-20 h-20 mx-auto mb-3 rounded-full overflow-hidden border-4 border-white/30 shadow-lg">
                            <img src="./assets/images/arts.png" alt="CAS" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-white text-lg font-bold text-center mb-1">CAS</h3>
                        <p class="text-white/80 text-xs text-center">Department</p>
                    </div>
                </div>
                
                <!-- Card 2 -->
                <div class="carousel-card">
                    <div class="card-inner bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 shadow-2xl">
                        <div class="w-20 h-20 mx-auto mb-3 rounded-full overflow-hidden border-4 border-white/30 shadow-lg">
                            <img src="./assets/images/educ.png" alt="EDUC" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-white text-lg font-bold text-center mb-1">EDUC</h3>
                        <p class="text-white/80 text-xs text-center">Department</p>
                    </div>
                </div>
                
                <!-- Card 3 -->
                <div class="carousel-card">
                    <div class="card-inner bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 shadow-2xl">
                        <div class="w-20 h-20 mx-auto mb-3 rounded-full overflow-hidden border-4 border-white/30 shadow-lg">
                            <img src="./assets/images/blis.png" alt="BLIS" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-white text-lg font-bold text-center mb-1">BLIS</h3>
                        <p class="text-white/80 text-xs text-center">Department</p>
                    </div>
                </div>
                
                <!-- Card 4 -->
                <div class="carousel-card">
                    <div class="card-inner bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 shadow-2xl">
                        <div class="w-20 h-20 mx-auto mb-3 rounded-full overflow-hidden border-4 border-white/30 shadow-lg">
                            <img src="./assets/images/crim.png" alt="BSCRIM" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-white text-lg font-bold text-center mb-1">BSCRIM</h3>
                        <p class="text-white/80 text-xs text-center">Department</p>
                    </div>
                </div>
                
                <!-- Card 5 -->
                <div class="carousel-card">
                    <div class="card-inner bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 shadow-2xl">
                        <div class="w-20 h-20 mx-auto mb-3 rounded-full overflow-hidden border-4 border-white/30 shadow-lg">
                            <img src="./assets/images/BA.png" alt="BSBA" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-white text-lg font-bold text-center mb-1">BSBA</h3>
                        <p class="text-white/80 text-xs text-center">Department</p>
                    </div>
                </div>

                <!-- Card 6 -->
                <div class="carousel-card">
                    <div class="card-inner bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 shadow-2xl">
                        <div class="w-20 h-20 mx-auto mb-3 rounded-full overflow-hidden border-4 border-white/30 shadow-lg">
                            <img src="./assets/images/HM.png" alt="BSHM" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-white text-lg font-bold text-center mb-1">BSHM</h3>
                        <p class="text-white/80 text-xs text-center">Department</p>
                    </div>
                </div>

                <!-- Card 7 -->
                <div class="carousel-card">
                    <div class="card-inner bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 shadow-2xl">
                        <div class="w-20 h-20 mx-auto mb-3 rounded-full overflow-hidden border-4 border-white/30 shadow-lg">
                            <img src="./assets/images/it.png" alt="BSIT" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-white text-lg font-bold text-center mb-1">BSIT</h3>
                        <p class="text-white/80 text-xs text-center">Department</p>
                    </div>
                </div>

                <!-- Card 8 -->
                <div class="carousel-card">
                    <div class="card-inner bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 shadow-2xl">
                        <div class="w-20 h-20 mx-auto mb-3 rounded-full overflow-hidden border-4 border-white/30 shadow-lg">
                            <img src="./assets/images/MID.png" alt="BSMID" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-white text-lg font-bold text-center mb-1">BSMID</h3>
                        <p class="text-white/80 text-xs text-center">Department</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Rest of your content (unchanged) -->
    <div class="absolute inset-0 z-20 flex items-center justify-start">
        <div class="container text-white max-w-3xl flex flex-col justify-center h-full transform translate-y-1/4">
            <div class="text-left">
                <h1 class="text-4xl md:text-5xl font-bold mb-2">Welcome to Tagoloan Community College</h1>
                <p class="text-xl font-bold opacity-90 mb-4">Empowering students through innovation, integrity, and excellence.</p>
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

        /* Updated for 8 cards: 360 / 8 = 45 degrees spacing */
        .carousel-card:nth-child(1) { transform: translate(-50%, -50%) rotateY(0deg)   translateZ(300px); }
        .carousel-card:nth-child(2) { transform: translate(-50%, -50%) rotateY(45deg)  translateZ(300px); }
        .carousel-card:nth-child(3) { transform: translate(-50%, -50%) rotateY(90deg)  translateZ(300px); }
        .carousel-card:nth-child(4) { transform: translate(-50%, -50%) rotateY(135deg) translateZ(300px); }
        .carousel-card:nth-child(5) { transform: translate(-50%, -50%) rotateY(180deg) translateZ(300px); }
        .carousel-card:nth-child(6) { transform: translate(-50%, -50%) rotateY(225deg) translateZ(300px); }
        .carousel-card:nth-child(7) { transform: translate(-50%, -50%) rotateY(270deg) translateZ(300px); }
        .carousel-card:nth-child(8) { transform: translate(-50%, -50%) rotateY(315deg) translateZ(300px); }

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
        
        /* Pause on hover — still works! */
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
                        <!-- Image 1 -->
                        <img src="{{ asset('assets/Gallery/photo1.jpg') }}" 
                            alt="Tagoloan Community College" class="w-full h-full object-cover flex-shrink-0">

                        <!-- Image 2 -->
                        <img src="{{ asset('assets/Gallery/photo2.jpg') }}" 
                            alt="Tagoloan Landscape" class="w-full h-full object-cover flex-shrink-0">

                        <!-- Image 3 -->
                        <img src="{{ asset('assets/Gallery/photo3.jpg') }}" 
                            alt="Students at TCC" class="w-full h-full object-cover flex-shrink-0">

                        <!-- Image 4 -->
                        <img src="{{ asset('assets/Gallery/photo4.jpg') }}" 
                            alt="TCC Event" class="w-full h-full object-cover flex-shrink-0">

                        <!-- Image 5 -->
                        <img src="{{ asset('assets/Gallery/photo5.jpg') }}" 
                            alt="Campus Activity" class="w-full h-full object-cover flex-shrink-0">

                        <!-- Image 6 -->
                        <img src="{{ asset('assets/Gallery/photo6.jpg') }}" 
                            alt="Community Gathering" class="w-full h-full object-cover flex-shrink-0">
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
                    <button class="w-3 h-3 rounded-full bg-white/50"></button>
                    <button class="w-3 h-3 rounded-full bg-white/50"></button>
                    <button class="w-3 h-3 rounded-full bg-white/50"></button>
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

    <!-- Pride of the Tagoloan Community College - Single Infinite Slider -->
    <section class="section bg-gradient-to-b from-gray-50 to-white py-16">
    <div class="container mx-auto text-center px-4">
        <h2 class="section-header font-bold text-3xl md:text-4xl text-blue-800">Pride of the Tagoloan Community College</h2>
        <p class="mt-5 max-w-4xl mx-auto text-gray-700 font-medium leading-relaxed">
        Celebrating the spirit, achievements, and vibrant community that make Tagoloan Community College a beacon of learning, 
        innovation, and service in Northern Mindanao.
        </p>
    </div>

    <div class="w-full mx-auto mt-12 overflow-hidden">
        <div class="slider-container">
        <div class="slider-track slider-right">
            <!-- Combined Slides: All 16 unique moments -->
            <div class="photo-slide">
            <img src="{{ asset('assets/Gallery/image1.jpg') }}" alt="TCC Campus Life" class="slide-img">
            <p class="font-bold text-lg mt-3">Campus Spirit</p>
            <p class="text-gray-600 text-sm">Unity in learning and growth</p>
            </div>
            <div class="photo-slide">
            <img src="{{ asset('assets/Gallery/image2.jpg') }}" alt="TCC Graduation" class="slide-img">
            <p class="font-bold text-lg mt-3">Graduation Day</p>
            <p class="text-gray-600 text-sm">Milestones of success</p>
            </div>
            <div class="photo-slide">
            <img src="{{ asset('assets/Gallery/image3.jpg') }}" alt="TCC Community Outreach" class="slide-img">
            <p class="font-bold text-lg mt-3">Community Service</p>
            <p class="text-gray-600 text-sm">Serving with heart</p>
            </div>
            <div class="photo-slide">
            <img src="{{ asset('assets/Gallery/image4.jpg') }}" alt="TCC Students in Class" class="slide-img">
            <p class="font-bold text-lg mt-3">Classroom Excellence</p>
            <p class="text-gray-600 text-sm">Where knowledge thrives</p>
            </div>
            <div class="photo-slide">
            <img src="{{ asset('assets/Gallery/image5.jpg') }}" alt="TCC Cultural Event" class="slide-img">
            <p class="font-bold text-lg mt-3">Cultural Pride</p>
            <p class="text-gray-600 text-sm">Celebrating heritage</p>
            </div>
            <div class="photo-slide">
            <img src="{{ asset('assets/Gallery/image6.jpg') }}" alt="TCC Research" class="slide-img">
            <p class="font-bold text-lg mt-3">Innovation & Research</p>
            <p class="text-gray-600 text-sm">Pioneering local solutions</p>
            </div>
            <div class="photo-slide">
            <img src="{{ asset('assets/Gallery/image7.jpg') }}" alt="TCC Sports" class="slide-img">
            <p class="font-bold text-lg mt-3">Athletic Excellence</p>
            <p class="text-gray-600 text-sm">Strength and discipline</p>
            </div>
            <div class="photo-slide">
            <img src="{{ asset('assets/Gallery/image8.jpg') }}" alt="TCC Leadership" class="slide-img">
            <p class="font-bold text-lg mt-3">Student Leadership</p>
            <p class="text-gray-600 text-sm">Voices of tomorrow</p>
            </div>
            <!-- Bottom row slides (now part of main row) -->
            <div class="photo-slide">
            <img src="{{ asset('assets/Gallery/image9.jpg') }}" alt="TCC Faculty" class="slide-img">
            <p class="font-bold text-lg mt-3">Dedicated Faculty</p>
            <p class="text-gray-600 text-sm">Guiding with passion</p>
            </div>
            <div class="photo-slide">
            <img src="{{ asset('assets/Gallery/image10.jpg') }}" alt="TCC Library" class="slide-img">
            <p class="font-bold text-lg mt-3">Learning Hub</p>
            <p class="text-gray-600 text-sm">Silent halls of wisdom</p>
            </div>
            <div class="photo-slide">
            <img src="{{ asset('assets/Gallery/image11.jpg') }}" alt="TCC Environment" class="slide-img">
            <p class="font-bold text-lg mt-3">Green Campus</p>
            <p class="text-gray-600 text-sm">Sustainable and serene</p>
            </div>
            <div class="photo-slide">
            <img src="{{ asset('assets/Gallery/image12.jpg') }}" alt="TCC Alumni" class="slide-img">
            <p class="font-bold text-lg mt-3">Alumni Success</p>
            <p class="text-gray-600 text-sm">Legacy of impact</p>
            </div>
            <div class="photo-slide">
            <img src="{{ asset('assets/Gallery/image13.jpg') }}" alt="TCC Technology" class="slide-img">
            <p class="font-bold text-lg mt-3">Digital Learning</p>
            <p class="text-gray-600 text-sm">Embracing the future</p>
            </div>
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
    gap: 2.25rem; /* 36px spacing between cards */
    width: max-content;
    animation: scrollRight 70s infinite linear;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
    will-change: transform;
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
    padding: 1.75rem 1.25rem;
    border-radius: 18px;
    min-width: 290px;
    max-width: 320px;
    transition: transform 0.35s ease, box-shadow 0.35s ease;
    }

    .photo-slide:hover {
    transform: translateY(-6px);
    }

    .slide-img {
    width: 100%;
    height: 300px; /* Taller image as requested */
    object-fit: cover;
    border-radius: 14px;
    margin-bottom: 1.1rem;
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
    .slider-track {
        animation-duration: 90s !important;
        gap: 1.5rem;
    }

    .photo-slide {
        min-width: 240px;
        padding: 1.5rem 1rem;
    }

    .slide-img {
        height: 260px;
    }

    h2 {
        font-size: 1.875rem;
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
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
                .text-primary { color: #3E0703; }
                .bg-primary { background-color: #3E0703; }
                .hover-bg-primary { transition: background-color 0.3s ease; }
                .hover-bg-primary:hover { background-color: #3E0703; color: white; }
                .container { max-width: 1280px; margin: 0 auto; padding: 0 1.5rem; }
                .section { padding: 5rem 0; }
                .section-header { font-size: 2.5rem; font-weight: 700; margin-bottom: 2rem; position: relative; }
                .section-header:after { content: ''; position: absolute; bottom: -10px; left: 0; width: 80px; height: 4px; background-color: #3E0703; }
                .btn { padding: 0.75rem 1.5rem; border-radius: 0.5rem; font-weight: 600; transition: all 0.3s ease; text-decoration: none; display: inline-block; }
                .btn-primary { background-color: #3E0703; color: white; }
                .btn-primary:hover { background-color: #2a0502; transform: translateY(-2px); box-shadow: 0 4px 12px rgba(62, 7, 3, 0.2); }
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
                .bg-gray-50 { background-color: #f9fafb; }
                .border-b { border-bottom-width: 1px; }
                .border-white { border-color: white; }
                .backdrop-blur-sm { backdrop-filter: blur(4px); }
                .transition { transition: all 0.3s ease; }
                .hover-shadow { transition: box-shadow 0.3s ease; }
                .hover-shadow:hover { box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1); }
                .text-center { text-align: center; }
                .hidden { display: none; }
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
            </style>
        @endif
</head>
<body class="bg-[#FDFDFC] text-[#3E0703] flex flex-col min-h-screen">

            <!-- Header: Professional Navbar -->
        <header class="w-full border-b border-white bg-white backdrop-blur-sm fixed top-0 left-0 z-50">
            <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-3">  
                <!-- Logo -->
                <div class="flex items-center gap-3">
                    <img src="{{ asset('./assets/images/tcc.png') }}" alt="Tagoloan Community College Logo" class="h-10 w-auto">
                    <span class="text-lg font-bold tracking-wide text-[#3E0703]">
                        TCC Student Management
                    </span>
                </div>

                <!-- Auth Links -->
                @if (Route::has('login'))
                    <nav class="flex items-center gap-3">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                            class="px-5 py-3 text-base font-semibold text-[#3E0703] bg-white border-2 border-[#3E0703] rounded-lg hover-bg-primary transition">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                            class="px-4 py-2 text-base font-semibold text-[#3E0703] border-2 border-[#3E0703] rounded-md hover-bg-primary transition">
                                Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                class="px-4 py-2 text-base font-semibold bg-[#3E0703] text-white rounded-md hover:bg-[#2a0502] transition">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>
        </header>
        <main class="flex flex-col w-full pt-19">
            <!-- Hero Section -->
            <section class="relative w-[1500px] h-[700px] overflow-hidden shadow-lg"> 
                <div class="absolute inset-0 bg-gradient-to-r from-[#3E0703]/80 to-transparent z-10"></div>
                <img src="./assets/images/luffy.png" 
                    alt="Student Management System" class="w-full h-full object-cover">
                <div class="absolute inset-0 z-20 flex items-center">
                    <div class="container">
                    </div>
                </div>
            </section>

            <!-- About Us Section -->
            <section id="about" class="section bg-white">
                <div class="container px-6 md:px-10 lg:px-12">
                    <div class="flex flex-col lg:flex-row items-start gap-12">
                        
                        <!-- ✅ Logo on the LEFT -->
                        <div class="lg:w-1/4 flex-shrink-0 flex flex-col items-center lg:items-start">
                            <div class="pt-6">
                                <img src="./assets/images/tcc.png" 
                                    alt="Tagoloan Community College Campus" class="w-full h-auto rounded-xl hover-shadow max-w-xs">
                                <h2 class="text-primary font-bold text-xl mt-4 text-center lg:text-left">
                                    About Tagoloan Community College
                                </h2>
                            </div>
                        </div>

                        <!-- ✅ Text on the RIGHT -->
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
        </main>
            <!-- What is Tagoloan Section -->
        <section class="section bg-gray-50">
            <div class="container">
                <div class="flex flex-col lg:flex-row items-center gap-12">
                    
                    <!-- ✅ Text on the LEFT, closer to the image -->
                    <div class="lg:w-1/2 px-4 md:px-6 lg:px-8">
                        <h3 class="text-2xl font-bold mb-4">The Heart of Our Community</h3>
                        <p class="text-lg mb-6">
                            Tagoloan, located in the province of Misamis Oriental, Philippines, is a vibrant municipality 
                            known for its rich cultural heritage, beautiful landscapes, and progressive community. 
                            The Tagoloan Community College serves as an educational beacon for the region.
                        </p>
                        <p class="text-lg mb-6">
                            Our college is deeply rooted in the values of the Tagoloan community - integrity, excellence, 
                            service, and innovation. We take pride in being an institution that not only educates but 
                            also preserves and promotes our local culture and traditions.
                        </p>
                        <div class="mt-8">
                            <h4 class="font-bold text-xl mb-4">Why Choose TCC?</h4>
                            <ul class="space-y-3">
                                <li class="flex items-start">
                                    <span class="text-[#3E0703] font-bold mr-3">•</span>
                                    <span>Community-focused education tailored to local needs</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-[#3E0703] font-bold mr-3">•</span>
                                    <span>Modern facilities with cutting-edge technology</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-[#3E0703] font-bold mr-3">•</span>
                                    <span>Experienced faculty dedicated to student success</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-[#3E0703] font-bold mr-3">•</span>
                                    <span>Strong industry partnerships for career development</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- ✅ Image on the RIGHT -->
                    <div class="lg:w-1/2 pl-4 md:pl-6 lg:pl-8">
                        <img src="./assets/images/tcchym1.png" 
                            alt="Tagoloan Community" class="w-full h-auto rounded-xl hover-shadow">
                    </div>

                </div>
            </div>
        </section>


                
            <!-- Features Section -->
            <section class="section bg-white">
                <div class="container flex justify-center items-center">
                    <p class="text-xl text-center mb-12 max-w-4xl font-bold px-10 py-8">
                        Our Student Management System is designed to simplify academic life for students, faculty, and administrators.
                    </p>
                </div>

                <div class="container">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <div class="bg-gray-50 p-8 rounded-xl hover-shadow transition">
                            <div class="w-16 h-16 bg-[#3E0703] text-white flex items-center justify-center rounded-lg mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold mb-3">Academic Records</h3>
                            <p class="text-lg">Access grades, transcripts, and academic history with just a few clicks. Monitor your progress throughout your academic journey.</p>
                        </div>

                        <div class="bg-gray-50 p-8 rounded-xl hover-shadow transition">
                            <div class="w-16 h-16 bg-[#3E0703] text-white flex items-center justify-center rounded-lg mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold mb-3">Schedule Management</h3>
                            <p class="text-lg">View your class schedule, exam dates, and important academic events. Never miss a deadline with our intuitive calendar system.</p>
                        </div>

                        <div class="bg-gray-50 p-8 rounded-xl hover-shadow transition">
                            <div class="w-16 h-16 bg-[#3E0703] text-white flex items-center justify-center rounded-lg mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold mb-3">Communication Hub</h3>
                            <p class="text-lg">Connect with professors, advisors, and classmates through our integrated messaging system. Stay informed about campus announcements.</p>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer -->
            <!-- Footer -->
            <footer class="bg-[#3E0703] text-white py-12 mt-auto">
                <div class="container">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Logo & About with left padding -->
                        <div class="pl-4 md:pl-8">
                            <div class="flex items-center gap-3 mb-6">
                                <img src="{{ asset('./assets/images/tcc.png') }}" alt="Tagoloan Community College Logo" class="h-10 w-auto">
                                <span class="text-xl font-bold">TCC</span>
                            </div>
                            <p class="mb-4">Empowering students through innovative education and technology.</p>
                            <p class="text-sm opacity-80">© 2024 Tagoloan Community College. All rights reserved.</p>
                        </div>

                        <!-- Quick Links + Contact Info merged close together -->
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Quick Links -->
                            <div>
                                <h3 class="text-lg font-bold mb-4">Quick Links</h3>
                                <ul class="space-y-2">
                                    <li><a href="#" class="opacity-90 hover:opacity-100 transition">Home</a></li>
                                    <li><a href="#about" class="opacity-90 hover:opacity-100 transition">About Us</a></li>
                                    <li><a href="#" class="opacity-90 hover:opacity-100 transition">Academics</a></li>
                                    <li><a href="#" class="opacity-90 hover:opacity-100 transition">Admissions</a></li>
                                    <li><a href="#" class="opacity-90 hover:opacity-100 transition">Contact</a></li>
                                </ul>
                            </div>

                            <!-- Contact Info -->
                            <div>
                                <h3 class="text-lg font-bold mb-4">Contact Info</h3>
                                <address class="not-italic space-y-2">
                                    <p class="flex items-start">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        Tagoloan, Misamis Oriental, Philippines
                                    </p>
                                    <p class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                        +63 (XX) XXX-XXXX
                                    </p>
                                    <p class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        info@tcc.edu.ph
                                    </p>
                                </address>
                            </div>
                        </div>

                        <!-- Connect With Us -->
                        <div>
                            <h3 class="text-lg font-bold mb-4">Connect With Us</h3>
                            <p class="mb-4">Stay updated with the latest news and events from Tagoloan Community College.</p>
                            <form class="space-y-3">
                                <input type="email" placeholder="Your email address" class="w-full px-4 py-2 rounded-lg text-[#3E0703] focus:outline-none focus:ring-2 focus:ring-white">
                                <button type="submit" class="w-full bg-white text-[#3E0703] font-semibold py-2 rounded-lg hover:bg-gray-100 transition">Subscribe</button>
                            </form>
                        </div>
                    </div>

                    <div class="border-t border-white/20 mt-8 pt-8 text-center text-sm opacity-80">
                        <p>Tagoloan Community College Student Management System | Designed by Philip Elbambo</p>
                    </div>
                </div>
            </footer>
            </body>
            </html>
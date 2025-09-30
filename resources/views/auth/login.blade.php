<x-guest-layout>
    <!-- ◀ GLOBAL BACK BUTTON -->
    <button onclick="window.history.back()" 
            class="fixed left-4 top-1/2 transform -translate-y-1/2 sm:left-6 sm:top-6 sm:translate-y-0 z-10 h-12 w-12 flex items-center justify-center bg-white/80 backdrop-blur-sm border border-gray-200 hover:bg-white text-gray-600 hover:text-gray-800 rounded-full shadow-lg transition-all duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-[#3E0703]"
            aria-label="Go back">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#3E0703] via-white px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white/50 p-8 sm:p-10 rounded-2xl shadow-xl border border-white/50">
            <!-- Logo -->
            <div class="text-center">
                <img src="{{ asset('./assets/images/tcc.png') }}" alt="Logo" class="mx-auto h-16 w-auto">
                <h2 class="mt-6 text-3xl font-extrabold text-[#3E0703]">Sign in to your account</h2>
                <p class="mt-2 text-sm text-gray-600">Welcome back! Please enter your details.</p>
            </div>

            <!-- Validation Errors -->
            <x-validation-errors class="mb-4" />

            @session('status')
                <div class="mb-4 p-3 bg-green-50 text-green-700 text-sm rounded-lg">
                    {{ $value }}
                </div>
            @endsession

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6">
                @csrf
                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input id="email" name="email" type="email" required autofocus autocomplete="username"
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#3E0703] transition duration-150 ease-in-out sm:text-sm">
                    </div>
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input id="password" name="password" type="password" required autocomplete="current-password"
                            class="appearance-none block w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#3E0703] transition duration-150 ease-in-out sm:text-sm">
                        <button type="button" onclick="togglePasswordVisibility()"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700 focus:outline-none">
                            <svg id="eye-open" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg id="eye-closed" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-[#3E0703] focus:ring-[#3E0703] border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-700">Remember me</label>
                    </div>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm font-medium text-[#3E0703] hover:text-[#5A0A05] transition duration-150 ease-in-out">
                            Forgot your password?
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" 
                        class="group relative w-full flex items-center justify-center gap-2 py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-[#3E0703] hover:bg-[#5A0A05] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#3E0703] transition duration-150 ease-in-out">
                        
                        Sign in

                        <!-- Sign in Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            class="h-5 w-5 text-white" 
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H3m6-6l-6 6 6 6m6-12h6m-6 12h6" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Password Toggle Script -->
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeOpen = document.getElementById('eye-open');
            const eyeClosed = document.getElementById('eye-closed');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeOpen.style.display = 'block';
                eyeClosed.style.display = 'none';
            } else {
                passwordInput.type = 'password';
                eyeOpen.style.display = 'none';
                eyeClosed.style.display = 'block';
            }
        }
    </script>
</x-guest-layout>

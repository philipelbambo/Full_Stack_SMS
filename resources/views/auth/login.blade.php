<x-guest-layout>
    <!-- ◀ GLOBAL BACK BUTTON -->
    <button onclick="window.history.back()" 
            class="fixed left-4 top-1/2 transform -translate-y-1/2 sm:left-6 sm:top-6 sm:translate-y-0 z-10 h-12 w-12 flex items-center justify-center bg-white/70 backdrop-blur-md border border-gray-200 hover:bg-white text-gray-600 hover:text-gray-900 rounded-full shadow-lg transition-all duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-[#D4AF37]"
            aria-label="Go back">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-100 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white/80 backdrop-blur-sm p-8 sm:p-10 rounded-2xl shadow-xl border border-gray-200/50">
            <!-- Logo -->
            <div class="text-center">
                <img src="{{ asset('./assets/images/tcc.png') }}" alt="Logo" class="mx-auto h-16 w-auto">
                <h2 class="mt-6 text-3xl font-bold text-gray-900">Welcome Back</h2>
                <p class="mt-2 text-sm text-gray-600">Sign in to access your account</p>
            </div>

            <!-- Validation Errors -->
            <x-validation-errors class="mb-4" />

            @session('status')
                <div class="mb-4 p-3 bg-emerald-50 text-emerald-700 text-sm rounded-lg border border-emerald-100">
                    {{ $value }}
                </div>
            @endsession

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6">
                @csrf
                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-800">Email Address</label>
                    <div class="mt-1.5">
                        <input id="email" name="email" type="email" required autofocus autocomplete="username"
                            placeholder="Enter your email"
                            class="w-full px-4 py-3.5 text-gray-900 placeholder-gray-500 bg-white/90 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#D4AF37] focus:border-transparent transition duration-200 ease-in-out shadow-sm">
                    </div>
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-800">Password</label>
                    <div class="mt-1.5 relative">
                        <input id="password" name="password" type="password" required autocomplete="current-password"
                            placeholder="Enter your password"
                            class="w-full px-4 py-3.5 pr-12 text-gray-900 placeholder-gray-500 bg-white/90 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#D4AF37] focus:border-transparent transition duration-200 ease-in-out shadow-sm">
                        <button type="button" onclick="togglePasswordVisibility()"
                                class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-500 hover:text-gray-800 focus:outline-none">
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
                        <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-[#D4AF37] focus:ring-[#D4AF37] border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-700">Remember me</label>
                    </div>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm font-medium text-[#D4AF37] hover:text-[#B89B2F] transition duration-150 ease-in-out">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" 
                        class="group relative w-full flex items-center justify-center gap-2 py-3.5 px-4 border border-transparent text-sm font-semibold rounded-xl text-white bg-[#1A2238] hover:bg-[#131a2a] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#D4AF37] transition duration-200 ease-in-out shadow-md hover:shadow-lg">
                        Sign in
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            class="h-5 w-5" 
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
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

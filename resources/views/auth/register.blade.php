<x-guest-layout>
    <!-- ◀ BACK TO LOGIN BUTTON -->
    <button 
        onclick="window.location.href='{{ route('login') }}'"
        class="fixed left-4 top-1/2 transform -translate-y-1/2 sm:left-6 sm:top-6 sm:translate-y-0 z-10 h-12 w-12 flex items-center justify-center bg-white/70 backdrop-blur-md border border-gray-200 hover:bg-white text-gray-600 hover:text-gray-900 rounded-full shadow-lg transition-all duration-200 ease-in-out focus:outline-none focus:ring-2"
        aria-label="Back to Login"
        title="Back to Login">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 19l-8-7 8-7" />
        </svg>
    </button>

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Header -->
            <div class="text-center">
                <div class="mx-auto mb-6">
                    <img src="{{ asset('./assets/images/tcc.png') }}" alt="Logo" class="mx-auto h-20 w-auto">
                </div>
                <h2 class="mt-4 text-3xl font-bold text-gray-900">Create Your Account</h2>
                <p class="mt-2 text-sm text-gray-600">Join us today and get started</p>
            </div>

            <!-- Form Card -->
            <div class="bg-white/80 backdrop-blur-sm shadow-xl rounded-2xl border border-gray-200/40 p-8">
                <!-- Validation Errors -->
                <x-validation-errors class="mb-6 p-4 bg-rose-50 border border-rose-200 rounded-xl" />

                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div class="space-y-2">
                        <x-label for="name" value="{{ __('Full Name') }}" class="text-sm font-semibold text-gray-800" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <x-input id="name"
                                class="block w-full pl-10 pr-4 py-3.5 border border-gray-300 rounded-xl bg-white/90 focus:ring-2 focus:ring-[#D4AF37] focus:border-transparent transition-all duration-200 hover:bg-white"
                                type="text"
                                name="name"
                                :value="old('name')"
                                required
                                autofocus
                                autocomplete="name"
                                placeholder="Enter your full name" />
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="space-y-2">
                        <x-label for="email" value="{{ __('Email Address') }}" class="text-sm font-semibold text-gray-800" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <x-input id="email"
                                class="block w-full pl-10 pr-4 py-3.5 border border-gray-300 rounded-xl bg-white/90 focus:ring-2 focus:ring-[#D4AF37] focus:border-transparent transition-all duration-200 hover:bg-white"
                                type="email"
                                name="email"
                                :value="old('email')"
                                required
                                autocomplete="username"
                                placeholder="Enter your email address" />
                        </div>
                    </div>

                    <!-- Role -->
                    <div class="space-y-2">
                        <x-label for="role" value="{{ __('Register As') }}" class="text-sm font-semibold text-gray-800" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12l5 5L20 7" />
                                </svg>
                            </div>
                            <select id="role" name="role" required
                                class="block w-full pl-10 pr-4 py-3.5 border border-gray-300 rounded-xl bg-white/90 focus:ring-2 focus:ring-[#D4AF37] focus:border-transparent transition-all duration-200 hover:bg-white appearance-none">
                                <option value="" disabled selected>Select your role</option>
                                <option value="student">Student</option>
                                <option value="faculty">Faculty</option>
                                <option value="registrar">Registrar</option>
                            </select>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <x-label for="password" value="{{ __('Password') }}" class="text-sm font-semibold text-gray-800" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <x-input id="password"
                                class="block w-full pl-10 pr-10 py-3.5 border border-gray-300 rounded-xl bg-white/90 focus:ring-2 focus:ring-[#D4AF37] focus:border-transparent transition-all duration-200 hover:bg-white"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                                placeholder="Create a strong password" />

                            <!-- Toggle Icon -->
                            <button type="button" onclick="togglePassword('password', this)" 
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Must be at least 8 characters long</p>
                    </div>

                    <!-- Confirm Password -->
                    <div class="space-y-2">
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-sm font-semibold text-gray-800" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <x-input id="password_confirmation"
                                class="block w-full pl-10 pr-10 py-3.5 border border-gray-300 rounded-xl bg-white/90 focus:ring-2 focus:ring-[#D4AF37] focus:border-transparent transition-all duration-200 hover:bg-white"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                placeholder="Confirm your password" />

                            <!-- Toggle Icon -->
                            <button type="button" onclick="togglePassword('password_confirmation', this)" 
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Terms -->
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="flex items-start space-x-3 p-4 bg-gray-50 rounded-xl border border-gray-200">
                            <div class="flex items-center h-5 mt-0.5">
                                <x-checkbox name="terms"
                                    id="terms"
                                    required
                                    class="h-4 w-4 text-[#D4AF37] focus:ring-[#D4AF37] border-gray-300 rounded" />
                            </div>
                            <div class="text-sm text-gray-700">
                                <x-label for="terms" class="font-medium text-gray-800 cursor-pointer">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-[#D4AF37] hover:text-[#B89B2F] underline font-medium">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-[#D4AF37] hover:text-[#B89B2F] underline font-medium">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </x-label>
                            </div>
                        </div>
                    @endif

                    <!-- Submit Button -->
                    <div class="space-y-4 pt-2">
                        <x-button class="w-full bg-gradient-to-r from-[#1A2238] to-[#131a2a] hover:from-[#131a2a] hover:to-[#0f1522] text-white font-semibold py-3.5 px-4 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#D4AF37]">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                            {{ __('Create Account') }}
                        </x-button>

                        <div class="text-center">
                            <p class="text-sm text-gray-600">
                                {{ __('Already have an account?') }}
                                <a class="font-semibold text-[#D4AF37] hover:text-[#B89B2F] transition-colors duration-200 ml-1"
                                    href="{{ route('login') }}">
                                    {{ __('Sign in here') }}
                                </a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Footer Note -->
            <div class="text-center">
                <p class="text-xs text-gray-500">
                    By creating an account, you agree to our terms and conditions
                </p>
            </div>
        </div>
    </div>

    <!-- Password Toggle Script -->
    <script>
        function togglePassword(id, el) {
            const input = document.getElementById(id);
            const icon = el.querySelector("svg");

            if (input.type === "password") {
                input.type = "text";
                icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.956 9.956 0 012.148-3.742M15 12a3 3 0 01-6 0 3 3 0 016 0zM3 3l18 18" />`;
            } else {
                input.type = "password";
                icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
            }
        }
    </script>
</x-guest-layout>

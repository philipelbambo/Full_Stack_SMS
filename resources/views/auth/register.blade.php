    <x-guest-layout>
        <!-- ◀ GLOBAL BACK BUTTON — ALWAYS VISIBLE, ALWAYS WORKS -->
        <button 
            onclick="window.location.href='{{ route('login') }}'"
            class="fixed left-4 top-1/2 transform -translate-y-1/2 sm:left-6 sm:top-6 sm:translate-y-0 z-10 h-12 w-12 flex items-center justify-center bg-white/80 backdrop-blur-sm border border-white/30 hover:bg-white text-[#3E0703] hover:text-[#3E0703]/80 rounded-full shadow-lg transition-all duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-[#3E0703]"
            aria-label="Go back to login"
            title="Back to Login">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 19l-8-7 8-7" />
            </svg>
        </button>

        <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#3E0703] via-white py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full space-y-8">
                <!-- Header Section -->
                <div class="text-center">
                    <div class="mx-auto mb-6">
                        <img src="{{ asset('./assets/images/tcc.png') }}" alt="Logo" class="mx-auto h-20 w-auto">
                    </div>
                    <h2 class="mt-4 text-3xl font-bold text-[#3E0703]">Create your account</h2>
                    <p class="mt-2 text-sm text-[#3E0703]/80">Join us today and get started</p>
                </div>

                <!-- Form Card -->
                <div class="bg-white/70 backdrop-blur-sm shadow-2xl rounded-2xl border border-white/20 p-8">
                    <!-- Validation Errors -->
                    <x-validation-errors class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl" />

                    <form method="POST" action="{{ route('register') }}" class="space-y-6">
                        @csrf

                        <!-- Name Field -->
                        <div class="space-y-2">
                            <x-label for="name" value="{{ __('Full Name') }}" class="text-sm font-semibold text-[#3E0703]" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-[#3E0703]/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <x-input id="name" 
                                    class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl bg-white/50 backdrop-blur-sm focus:ring-2 focus:ring-[#3E0703] focus:border-transparent transition-all duration-200 hover:bg-white/80" 
                                    type="text" 
                                    name="name" 
                                    :value="old('name')" 
                                    required 
                                    autofocus 
                                    autocomplete="name" 
                                    placeholder="Enter your full name" />
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div class="space-y-2">
                            <x-label for="email" value="{{ __('Email Address') }}" class="text-sm font-semibold text-[#3E0703]" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-[#3E0703]/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                                <x-input id="email" 
                                    class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl bg-white/50 backdrop-blur-sm focus:ring-2 focus:ring-[#3E0703] focus:border-transparent transition-all duration-200 hover:bg-white/80" 
                                    type="email" 
                                    name="email" 
                                    :value="old('email')" 
                                    required 
                                    autocomplete="username" 
                                    placeholder="Enter your email address" />
                            </div>
                        </div>

                        <!-- Role Dropdown -->
                        <div class="space-y-2">
                            <x-label for="role" value="{{ __('Register As') }}" class="text-sm font-semibold text-[#3E0703]" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-[#3E0703]/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12l5 5L20 7" />
                                    </svg>
                                </div>
                                <select id="role" name="role" required
                                    class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl bg-white/50 backdrop-blur-sm focus:ring-2 focus:ring-[#3E0703] focus:border-transparent transition-all duration-200 hover:bg-white/80">
                                    <option value="" disabled selected>Select your role</option>
                                    <option value="student">Student</option>
                                    <option value="faculty">Faculty</option>
                                    <option value="registrar">Registrar</option>
                                </select>
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="space-y-2">
                            <x-label for="password" value="{{ __('Password') }}" class="text-sm font-semibold text-[#3E0703]" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-[#3E0703]/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <x-input id="password" 
                                    class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl bg-white/50 backdrop-blur-sm focus:ring-2 focus:ring-[#3E0703] focus:border-transparent transition-all duration-200 hover:bg-white/80" 
                                    type="password" 
                                    name="password" 
                                    required 
                                    autocomplete="new-password" 
                                    placeholder="Create a strong password" />
                            </div>
                            <p class="text-xs text-[#3E0703]/70 mt-1">Must be at least 8 characters long</p>
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="space-y-2">
                            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-sm font-semibold text-[#3E0703]" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-[#3E0703]/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <x-input id="password_confirmation" 
                                    class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl bg-white/50 backdrop-blur-sm focus:ring-2 focus:ring-[#3E0703] focus:border-transparent transition-all duration-200 hover:bg-white/80" 
                                    type="password" 
                                    name="password_confirmation" 
                                    required 
                                    autocomplete="new-password" 
                                    placeholder="Confirm your password" />
                            </div>
                        </div>

                        <!-- Terms and Privacy Policy -->
                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="flex items-start space-x-3 p-4 bg-gray-50/50 rounded-xl border border-gray-200">
                                <div class="flex items-center h-5">
                                    <x-checkbox name="terms" 
                                        id="terms" 
                                        required 
                                        class="h-4 w-4 text-[#3E0703] focus:ring-[#3E0703] border-gray-300 rounded transition-colors duration-200" />
                                </div>
                                <div class="text-sm leading-5">
                                    <x-label for="terms" class="font-medium text-[#3E0703] cursor-pointer">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-[#3E0703] hover:text-[#3E0703]/80 underline font-medium transition-colors duration-200">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-[#3E0703] hover:text-[#3E0703]/80 underline font-medium transition-colors duration-200">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </x-label>
                                </div>
                            </div>
                        @endif

                        <!-- Submit Button -->
                        <div class="space-y-4">
                            <x-button class="w-full bg-gradient-to-r from-[#3E0703] to-[#3E0703]/90 hover:from-[#3E0703]/90 hover:to-[#3E0703]/80 text-white font-semibold py-3 px-4 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#3E0703]">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                </svg>
                                {{ __('Create Account') }}
                            </x-button>

                            <!-- Login Link -->
                            <div class="text-center">
                                <p class="text-sm text-[#3E0703]/80">
                                    {{ __('Already have an account?') }}
                                    <a class="font-semibold text-[#3E0703] hover:text-[#3E0703]/80 transition-colors duration-200 ml-1" 
                                        href="{{ route('login') }}">
                                        {{ __('Sign in here') }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Footer -->
                <div class="text-center">
                    <p class="text-xs text-[#3E0703]/70">
                        By creating an account, you agree to our terms and conditions
                    </p>
                </div>
            </div>
        </div>
    </x-guest-layout>

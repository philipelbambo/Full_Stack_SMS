<header class="app-header sticky shadow-none border border-transparent" id="header">
        <div class="main-header-container container-fluid">
            <!-- LEFT SIDE -->
            <div class="header-content-left">
                <!-- Logo Section -->
                <div class="header-element" style="background-color: #3E0703;">
                    <div class="horizontal-logo">
                        <a href="#" class="header-logo"></a>
                    </div>
                </div>

                <!-- Sidebar Toggle -->
                <div class="header-element mx-lg-0">
                    <a aria-label="Hide Sidebar"
                    class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle text-[#3E0703]"
                    data-bs-toggle="sidebar" href="javascript:void(0);">
                    <span></span>
                    </a>
                </div>

                <!-- Signed in info -->
                <span class="text-[#3E0703]">You’re currently signed in as
                    <span class="inline-flex items-center gap-1 mx-2">
                        <span class="w-2 h-2 bg-[#3E0703] rounded-full"></span>
                        <span class="mx-2 text-[#3E0703]">Administrator</span>
                    </span>
                </span>
            </div>

            <!-- RIGHT SIDE -->
            <ul class="header-content-right">
                <!-- Fullscreen toggle -->
                <li class="header-element header-fullscreen">
                    <a onclick="openFullscreenOption()" href="javascript:void(0);" class="header-link text-[#3E0703]">
                        <!-- Open fullscreen -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 full-screen-open header-link-icon"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3E0703">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
                        </svg>
                        <!-- Close fullscreen -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 full-screen-close header-link-icon hidden"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3E0703">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 9V4.5M9 9H4.5M9 9 3.75 3.75M9 15v4.5M9 15H4.5M9 15l-5.25 5.25M15 9h4.M15 9V4.5M15 9l5.25-5.25M15 15h4.5M15 15v4.5m0-4.5 5.25 5.25" />
                        </svg>
                    </a>
                </li>

                <!-- Profile Dropdown -->
                <li class="header-element ti-dropdown hsdropdown">
                    <a href="javascript:void(0);" class="header-link hs-dropdown-toggle ti-dropdown-toggle"
                    id="mainHeaderProfile" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                    aria-expanded="false">
                        <div class="flex items-center">
                        <!-- User Avatar -->
                        <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}"
                            alt="{{ Auth::user()->name }}"
                            onerror="this.onerror=null; this.src='/assets/images/logo2.jpg';"
                            class="w-9 h-9 rounded-full object-cover">

                        <!-- Button -->
                        <div class="mx-2 ti-btn !rounded-full btn-wave waves-effect waves-light text-[#3E0703] border border-[#3E0703] text-xs pt-2 pb-2">
                            <span class="bi bi-gear"></span>
                            Account Profile
                        </div>
                    </div>
                    </a>
                    <!-- Dropdown Menu -->
                    <ul class="main-header-dropdown hs-dropdown-menu ti-dropdown-menu pt-0 overflow-hidden header-profile-dropdown hidden"
                        aria-labelledby="mainHeaderProfile">

                        <!-- User Info -->
                        <li>
                            <div class="ti-dropdown-item text-center border-b border-[#3E0703] block">
                                <span class="text-[#3E0703]">
                                    {{ Auth::user()->name }}
                                </span>
                                <span class="block text-xs text-[#3E0703]/80">{{ Auth::user()->email }}</span>
                            </div>
                        </li>

                        <!-- Profile Settings -->
                        <li>
                            <a class="ti-dropdown-item flex items-center text-[#3E0703]" href="/user/profile">
                                <i class="fe fe-user p-1 rounded-full bg-[#3E0703]/10 text-[#3E0703] me-2 text-[1rem]"></i>
                                Profile Settings
                            </a>
                        </li>

                        <!-- Logout -->
                        <li>
                            <a href="{{ route('logout') }}" class="ti-dropdown-item flex items-center text-[#3E0703]"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fe fe-lock p-1 rounded-full bg-[#3E0703]/10 text-[#3E0703] me-2 text-[1rem]"></i>
                                <span>Logout</span>
                            </a>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>

    <script>
    // Toggle fullscreen on/off
    function openFullscreenOption() {
        const doc = document;
        const el = doc.documentElement;

        const isFs =
            doc.fullscreenElement ||
            doc.webkitFullscreenElement ||
            doc.msFullscreenElement;

        if (!isFs) {
            const req =
                el.requestFullscreen ||
                el.webkitRequestFullscreen ||
                el.msRequestFullscreen;

            if (req) {
                Promise.resolve(req.call(el)).catch(console.warn);
            }
        } else {
            const exit =
                doc.exitFullscreen ||
                doc.webkitExitFullscreen ||
                doc.msExitFullscreen;

            if (exit) {
                Promise.resolve(exit.call(doc)).catch(console.warn);
            }
        }
    }

    // Keep fullscreen icons in sync
    (function bindFullscreenIconSync() {
        const doc = document;
        const updateIcons = () => {
            const isFs =
                doc.fullscreenElement ||
                doc.webkitFullscreenElement ||
                doc.msFullscreenElement;

            const openIcon = document.querySelector('.full-screen-open');
            const closeIcon = document.querySelector('.full-screen-close');

            if (openIcon) openIcon.classList.toggle('hidden', !!isFs);
            if (closeIcon) closeIcon.classList.toggle('hidden', !isFs);
        };

        ['fullscreenchange', 'webkitfullscreenchange', 'msfullscreenchange']
            .forEach(evt => doc.addEventListener(evt, updateIcons, false));

        updateIcons();
    })();
    </script>

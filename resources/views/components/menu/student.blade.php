    <style>
    /* Optional: Add smooth transitions */
    .side-menu__item {
        @apply flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-all duration-200 ease-in-out;
    }

    .side-menu__item:hover {
        @apply bg-amber-50 text-amber-800;
    }

    .side-menu__item i {
        @apply mr-3 flex-shrink-0 text-lg;
    }

    .slide__category {
        @apply px-4 py-2 text-xs font-semibold uppercase tracking-wider text-amber-900 bg-amber-100 rounded-t-lg;
    }

    /* Dropdown animation */
    #logoutDropdown {
        @apply transition-opacity duration-200;
    }
    </style>

    <ul class="space-y-1">
    <!-- Category Header -->
    <li class="slide__category">
        <span class="category-name">Management Modules</span>
    </li>

    <!-- Menu Items -->
    <li class="slide">
        <a href="{{ route('student-subjects.index') }}" class="side-menu__item text-amber-900 hover:bg-amber-50">
        <i class="side-menu__icon bi bi-layers"></i>
        <span class="side-menu__label">My Subjects</span>
        </a>
    </li>

    <li class="slide">
        <a href="{{ route('course_histories.index') }}" class="side-menu__item text-amber-900 hover:bg-amber-50">
        <i class="side-menu__icon bi bi-clock-history"></i>
        <span class="side-menu__label">Course History</span>
        </a>
    </li>

    <li class="slide">
        <a href="{{ route('student-complaints.index') }}" class="side-menu__item text-amber-900 hover:bg-amber-50">
        <i class="side-menu__icon bi bi-headset"></i>
        <span class="side-menu__label">Complaint</span>
        </a>
    </li>

    <li class="slide">
        <a href="{{ route('student-clubs.index') }}" class="side-menu__item text-amber-900 hover:bg-amber-50">
        <i class="side-menu__icon bi bi-people"></i>
        <span class="side-menu__label">Student Clubs</span>
        </a>
    </li>
    </ul>

    <!-- Sign Out with Confirmation Dropdown -->
    <li class="slide relative mt-4">
    <a href="javascript:void(0)" onclick="toggleLogoutDropdown()" class="side-menu__item text-amber-900 hover:bg-red-50">
        <i class="side-menu__icon bi bi-box-arrow-right"></i>
        <span class="side-menu__label">Sign Out</span>
    </a>

    <!-- Dropdown -->
    <div id="logoutDropdown" class="hidden absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg p-4 z-50">
        <p class="text-sm font-medium text-gray-700 mb-3 text-center">Confirm sign out?</p>
        <div class="flex flex-col space-y-2">
        <button onclick="confirmLogout()" class="px-3 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md transition">
            Yes, Sign Out
        </button>
        <button onclick="toggleLogoutDropdown()" class="px-3 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-md transition">
            Cancel
        </button>
        </div>
    </div>
    </li>

    <!-- Loading Overlay -->
    <div id="loggingOutOverlay" class="hidden fixed inset-0 bg-opacity-40 flex items-center justify-center z-50">
    <div class="bg-gray-700 rounded-xl shadow-xl p-6 max-w-xs w-full text-center">
        <div class="animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-red-600 mx-auto mb-3"></div>
        <p class="text-white font-medium">Signing out...</p>
    </div>
    </div>

    <!-- JavaScript -->
    <script>
    function toggleLogoutDropdown() {
        const dropdown = document.getElementById('logoutDropdown');
        dropdown.classList.toggle('hidden');
    }

    function confirmLogout() {
        toggleLogoutDropdown();
        const overlay = document.getElementById('loggingOutOverlay');
        overlay.classList.remove('hidden');

        // Submit logout after brief delay for UX
        setTimeout(() => {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = "{{ route('logout') }}";

        const token = document.createElement('input');
        token.type = 'hidden';
        token.name = '_token';
        token.value = "{{ csrf_token() }}";
        form.appendChild(token);

        document.body.appendChild(form);
        form.submit();
        }, 800); // Slightly faster for better UX
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function (event) {
        const dropdown = document.getElementById('logoutDropdown');
        const signOutButton = event.target.closest('li.slide');
        if (!signOutButton) {
        dropdown.classList.add('hidden');
        }
    });
    </script>   
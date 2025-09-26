<ul>
    <!-- ✅ Category -->
    <li class="slide__category text-gray-700">
        <span class="category-name text-gray-700">Manage Modules</span>
    </li>

    <!-- ✅ Assigned Subjects -->
    <li class="slide">
        <a href="{{ route('assigned-subjects.index') }}" class="side-menu__item text-gray-700">
            <i class="w-6 h-4 side-menu__icon bi bi-folder2-open text-gray-700"></i>
            <span class="side-menu__label text-gray-700">Assigned Subjects</span>
        </a>
    </li>

    <!-- ✅ Archived -->
    <li class="slide">
        <a href="#" class="side-menu__item text-gray-700">
            <i class="w-6 h-4 side-menu__icon bi bi-archive text-gray-700"></i>
            <span class="side-menu__label text-gray-700">Archived</span>
        </a>
    </li>

    <!-- ✅ Trash Bin -->
    <li class="slide">
        <a href="#" class="side-menu__item text-gray-700">
            <i class="w-6 h-4 side-menu__icon bi bi-trash text-gray-700"></i>
            <span class="side-menu__label text-gray-700">Trash Bin</span>
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

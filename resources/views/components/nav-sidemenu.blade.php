<aside class="app-sidebar desktop-response" id="sidebar" 
    style="background-color: #ffffff; border: none; height: 100vh; display: flex; flex-direction: column; box-shadow: none;">
    
    <!-- Sidebar Header with Logo -->
    <div class="main-sidebar-header p-4 flex items-center justify-center" 
        style="background: #ffffff; border: none; box-shadow: none;">
        <a href="/dashboard" class="header-logo" 
            style="display: inline-block; transition: transform 0.2s ease; border: none;">
            <img src="/assets/images/tcc.png" alt="Logo" 
                style="width: 70px; height: auto; border: none; box-shadow: none;">
        </a>
    </div>

    <!-- Sidebar Menu -->
    <div class="main-sidebar shadow-none flex-grow overflow-y-auto" id="sidebar-scroll" 
        style="padding: 16px 0; border: none; box-shadow: none;">
        <nav class="main-menu-container nav nav-pills flex-col sub-open" style="border: none;">
            
            <div class="slide-left" id="slide-left" 
                style="position: absolute; left: 8px; top: 50%; transform: translateY(-50%); opacity: 0.6; cursor: pointer; transition: opacity 0.2s; border: none;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#3E0703" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12 13.293 17.707 14.707 16.293 10.414 12 14.707 7.707z"></path>
                </svg>
            </div>

            <ul class="main-menu" 
                style="list-style: none; padding: 0; margin: 0; position: relative; padding-left: 16px; padding-right: 16px; border: none;">
                <li class="slide__category" 
                    style="color: #134686 !important; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 12px; font-weight: 600; opacity: 0.8; border: none;">
                    <span class="category-name">menu</span>
                </li>

                @php
                    $role = Auth::user()->role ?? 'Guest';
                @endphp
                @if ($role == 'Registrar')
                    @include('components.menu.registrar')
                @elseif ($role == 'Student')
                    @include('components.menu.student')
                @elseif ($role == 'Faculty')
                    @include('components.menu.faculty')
                @endif
            </ul>

            <div class="slide-right" id="slide-right" 
                style="position: absolute; right: 8px; top: 50%; transform: translateY(-50%); opacity: 0.6; cursor: pointer; transition: opacity 0.2s; border: none;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#3E0703" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12 10.707 6.293 9.293 7.707 13.586 12 9.293 16.293z"></path>
                </svg>
            </div>
        </nav>
    </div>
</aside>

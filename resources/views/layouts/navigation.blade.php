<nav x-data="{ open: false }" class="bg-blue-600 border-b border-blue-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-white" />
                    </a>
                </div>

                <!-- Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:text-blue-200">
                        Dashboard
                    </x-nav-link>

                    <x-nav-link :href="route('obras.index')" :active="request()->routeIs('obras.*')" class="text-white hover:text-blue-200">
                        Obras
                    </x-nav-link>

                    @auth
                        @if(auth()->user()->role === 'admin')
                            <x-nav-link href="/admin/usuarios" class="text-white hover:text-blue-200">
                                Gestión Usuarios
                            </x-nav-link>
                        @endif
                    @endauth

                </div>
            </div>

            <!-- Right Side -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                <!-- 🔥 USUARIO LOGUEADO -->
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-md">
                                <div>{{ auth()->user()->name }}</div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                Profile
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Log Out
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth

                <!-- 🔥 INVITADO -->
                @guest
                    <a href="{{ route('login') }}" class="text-white hover:text-blue-200 px-3">
                        Login
                    </a>

                    <a href="{{ route('register') }}" class="ml-4 bg-white text-blue-600 px-4 py-2 rounded-md hover:bg-blue-100">
                        Register
                    </a>
                @endguest

            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 text-white">
                    ☰
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')">
                Dashboard
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('obras.index')">
                Obras
            </x-responsive-nav-link>

            @auth
                @if(auth()->user()->role === 'admin')
                    <x-responsive-nav-link href="/admin/usuarios">
                        Gestión Usuarios
                    </x-responsive-nav-link>
                @endif
            @endauth
        </div>

        <!-- 🔥 USER / GUEST -->
        <div class="pt-4 pb-1 border-t border-blue-400 px-4">

            @auth
                <div class="text-white">
                    {{ auth()->user()->name }}
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-300 mt-2">
                        Logout
                    </button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="block text-white mt-2">
                    Login
                </a>

                <a href="{{ route('register') }}" class="block text-white mt-2">
                    Register
                </a>
            @endguest

        </div>
    </div>
</nav>
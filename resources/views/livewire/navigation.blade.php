<header class="bg-grayAngeli sticky top-0 z-50" x-data="dropdown()">
    <div class="container flex items-center h-16 justify-between md:justify-start">
        {{-- Link para activar el menú de categorías --}}
        <a
            :class="{'bg-opacity-100 text-orange-500': open, 'bg-opacity-25 text-white' : !open}"
            x-on:click="show()"
            class="flex flex-col items-center justify-center order-last md:order-first
            px-6 md:px-4 bg-white bg-opacity-25 text-white cursor-pointer font-semibold h-full">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <span class="text-sm hidden md:block">Categorías</span>
        </a>

        {{-- Logo del sitio --}}
        <a href="/" class="md:mx-6">
            <x-application-mark class="block h-9 w-auto"/>
        </a>

        {{-- Caja de búsqueda --}}
        <div class="flex-1 hidden md:block">
            @livewire('search')
        </div>

        {{-- Menú de usuario --}}
        <div class="mx-6 relative hidden md:block">
            @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                 alt="{{ Auth::user()->name }}"/>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <div class="border-t border-gray-200"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-dropdown-link href="{{ route('logout') }}"
                                             @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>

            @else
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <i class="fas fa-user-circle text-white text-3xl cursor-pointer"></i>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link href="{{ route('login') }}">
                            {{ __('Login') }}
                        </x-dropdown-link>

                        <x-dropdown-link href="{{ route('register') }}">
                            {{ __('Register') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            @endauth
        </div>

        {{-- Menú del carrito de compras --}}
        <div class="hidden md:block">
            @livewire('dropdown-cart')
        </div>
    </div>

    {{-- Menú de las categorías --}}
    <nav id="navigation-menu"
         x-show="open"
         :class="{'block': open,'hidden':!open}" class="bg-grayAngeli bg-opacity-25 w-full absolute hidden">
        {{--Menú pantallas grandes--}}
        <div class="container h-full hidden md:block">
            <div
                x-on:click.away="close()" class="grid grid-cols-4 h-full relative">
                <ul class="bg-white">
                    @foreach($categories as $category)
                        <li class="navigation-link text-gray-500 hover:bg-orange-500 hover:text-white">
                            <a href="{{route('categories.show',$category)}}"
                               class="py-2 px-4 text-md flex items-center">
                                <span class="flex justify-center w-9">
                                    {!! $category->icon !!}
                                </span>
                                {{$category->name}}
                            </a>

                            <div class="navigation-submenu bg-gray-100 absolute w-3/4 h-full top-0 right-0 hidden">
                                <x-navigation-subcategories :category="$category"/>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="col-span-3 bg-gray-100">
                    <x-navigation-subcategories :category="$categories->first()"/>
                </div>
            </div>
        </div>

        {{--Menú pantallas móviles--}}
        <div class="bg-white h-full overflow-y-auto">
            <div class="container bg-gray-200 py-3 mb-2">
                @livewire('search')
            </div>
            <ul>
                @foreach($categories as $category)
                    <li class="text-gray-500 hover:bg-orange-500 hover:text-white">
                        <a href="{{route('categories.show',$category)}}" class="py-2 px-4 text-sm flex items-center">
                                <span class="flex justify-center w-9">
                                    {!! $category->icon !!}
                                </span>
                            {{$category->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
            <hr class="mt-2 mb-2">
            <p class="text-gray-600 px-6 my-3 font-semibold items-center text-center">USUARIOS</p>

            @livewire('cart-mobil')

            @auth
                <a href="{{ route('profile.show') }}"
                   class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-orange-500 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fa-regular fa-address-card"></i>
                    </span>
                    {{ __('Profile') }}
                </a>

                <a href=""
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit()"
                   class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-orange-500 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </span>
                    {{ __('Log Out') }}
                </a>

                <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}"
                   class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-orange-500 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="far fa-user-circle"></i>
                    </span>
                    Iniciar sesión
                </a>

                <a href="{{ route('register') }}"
                   class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-orange-500 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-fingerprint"></i>
                    </span>
                    Regístrate
                </a>
            @endauth
        </div>
    </nav>
</header>

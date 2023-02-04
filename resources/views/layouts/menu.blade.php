<nav class="bg-indigo-600 border-b-2 border-indigo-700 ">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-white" />
                    </a>
                </div>
            </div>

            @guest

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

                <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    {{ 'Вход' }}
                </x-nav-link>
                <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                    {{ 'Регистрация' }}
                </x-nav-link>

            </div>

            @else

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex"></div>
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-base leading-4 font-medium rounded-md text-white bg-indigo-600 hover:text-white focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('dashboard')">
                                {{ __('app.Dashboard') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('app.Log Out') }}
                                </x-dropdown-link>
                            </form>

                        </x-slot>

                    </x-dropdown>
                </div>

            @endguest

        </div>
    </div>
</nav>

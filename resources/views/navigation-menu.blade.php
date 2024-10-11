<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <span>
                        <b>{{ __(env('APP_NAME')) }}</b>
                    </span>
                    {{-- <a href="{{ route('dashboard') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a> --}}
                </div>

                <!-- Navigation Links -->
                {{-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-jet-nav-link>
                </div> --}}

                <div class="hidden space-x-8 sm:-my-px sm:items-center sm:ml-6 sm:flex">

                    <x-jet-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ __('tasks/index.title') }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>

                        </x-slot>

                        <x-slot name="content">
                            <x-jet-dropdown-link
                                href="{{ route(\App\Http\Controllers\Task\ViewAllTaskController::class) }}">
                                {{ __('tasks/index.dropdown.all') }}
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link
                                href="{{ route(\App\Http\Controllers\TaskList\ViewAllTaskListController::class) }}">
                                {{ __('tasks/index.dropdown.all_task_list') }}
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link
                                href="{{ route(\App\Http\Controllers\Task\ViewCreateTaskController::class) }}">
                                {{ __('tasks/index.dropdown.create') }}
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link
                                href="{{ route(\App\Http\Controllers\TaskList\ViewCreateTaskListController::class) }}">
                                {{ __('tasks/index.dropdown.create_task_list') }}
                            </x-jet-dropdown-link>
                        </x-slot>

                    </x-jet-dropdown>

                    {{-- @can('view_all_boxes')
                        <x-jet-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>{{ __('boxes/index.title') }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-jet-dropdown-link
                                    href="{{ route(\App\Http\Controllers\Boxes\ViewAllBoxController::class) }}">
                                    {{ __('boxes/index.dropdown.all') }}
                                </x-jet-dropdown-link>

                                @can('view_create_open_boxes')
                                    <x-jet-dropdown-link
                                        href="{{ route(\App\Http\Controllers\Boxes\ViewCreateBoxController::class) }}">
                                        {{ __('boxes/index.dropdown.create') }}
                                    </x-jet-dropdown-link>
                                @endcan

                                @can('view_create_movements_boxes')
                                    <x-jet-dropdown-link
                                        href="{{ route(\App\Http\Controllers\Boxes\ViewCreateBoxMovementController::class) }}">
                                        {{ __('boxes/index.dropdown.movements') }}
                                    </x-jet-dropdown-link>
                                @endcan
                            </x-slot>

                        </x-jet-dropdown>
                    @endcan --}}

                    {{-- @can('view_product_module')
                        <x-jet-dropdown align="left" width="48">
                            <x-slot name="trigger">

                                <button
                                    class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>{{ __('products/index.title') }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>

                            </x-slot>

                            <x-slot name="content">
                                @can('view_product_title')
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Productos') }}
                                    </div>
                                @endcan

                                @can('view_all_product')
                                    <x-jet-dropdown-link
                                        href="{{ route(\App\Http\Controllers\Product\ViewAllProductController::class) }}">
                                        {{ __('products/index.dropdown.all') }}
                                    </x-jet-dropdown-link>
                                @endcan

                                @can('view_create_product')
                                    <x-jet-dropdown-link
                                        href="{{ route(\App\Http\Controllers\Product\ViewCreateProductController::class) }}">
                                        {{ __('products/index.dropdown.create') }}
                                    </x-jet-dropdown-link>
                                @endcan

                                <!-- brands -->
                                @can('view_brand_title')
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Marcas') }}
                                    </div>
                                @endcan

                                @can('view_all_brand')
                                    <x-jet-dropdown-link
                                        href="{{ route(\App\Http\Controllers\Brand\ViewAllBrandController::class) }}">
                                        {{ __('brands/index.dropdown.all') }}
                                    </x-jet-dropdown-link>
                                @endcan

                                @can('view_create_brand')
                                    <x-jet-dropdown-link
                                        href="{{ route(\App\Http\Controllers\Brand\ViewCreateBrandController::class) }}">
                                        {{ __('brands/index.dropdown.create') }}
                                    </x-jet-dropdown-link>
                                @endcan

                                <!-- categories -->
                                @can('view_categories_title')
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Categorias') }}
                                    </div>
                                @endcan

                                @can('view_all_category')
                                    <x-jet-dropdown-link
                                        href="{{ route(\App\Http\Controllers\Category\ViewAllCategoryController::class) }}">
                                        {{ __('categories/index.dropdown.all') }}
                                    </x-jet-dropdown-link>
                                @endcan

                                @can('view_create_category')
                                    <x-jet-dropdown-link
                                        href="{{ route(\App\Http\Controllers\Category\ViewCreateCategoryController::class) }}">
                                        {{ __('categories/index.dropdown.create') }}
                                    </x-jet-dropdown-link>
                                @endcan
                            </x-slot>

                        </x-jet-dropdown>
                    @endcan --}}

                    {{-- @if ($config[1]['with_customers_module'])
                        @can('view_all_client')
                            <x-jet-dropdown align="left" width="48">
                                <x-slot name="trigger">

                                    <button
                                        class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                        <div>{{ __('clients/index.title') }}</div>

                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>

                                </x-slot>

                                <x-slot name="content">

                                    <!-- User Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Users') }}
                                    </div>

                                    <x-jet-dropdown-link
                                        href="{{ route(\App\Http\Controllers\Client\ViewAllClientController::class) }}">
                                        {{ __('clients/index.dropdown.all') }}
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link
                                        href="{{ route(\App\Http\Controllers\Client\ViewCreateClientController::class) }}">
                                        {{ __('clients/index.dropdown.create') }}
                                    </x-jet-dropdown-link>

                                </x-slot>

                            </x-jet-dropdown>
                        @endcan
                    @endif --}}

                    {{-- @if ($config[2]['with_users_module'])
                        @can('view_all_user')
                            <x-jet-dropdown align="left" width="48">
                                <x-slot name="trigger">

                                    <button
                                        class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                        <div>{{ __('users/index.title') }}</div>

                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>

                                </x-slot>

                                <x-slot name="content">

                                    <!-- User Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Users') }}
                                    </div>

                                    <x-jet-dropdown-link
                                        href="{{ route(\App\Http\Controllers\User\ViewAllUserController::class) }}">
                                        {{ __('users/index.dropdown.all') }}
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link
                                        href="{{ route(\App\Http\Controllers\User\ViewCreateUserController::class) }}">
                                        {{ __('users/index.dropdown.create') }}
                                    </x-jet-dropdown-link>

                                </x-slot>
                            </x-jet-dropdown>
                        @endcan
                    @endif --}}
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-dropdown-link
                                        href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-jet-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ml-3 relative flex items-center">
                    <!-- Notification Icon with Link -->
                    <a href="{{ route(\App\Http\Controllers\Notification\ViewAllNotificationController::class) }}"
                        class="mr-4">
                        <button
                            class="py-4 px-1 relative border-2 border-transparent text-gray-800 rounded-full hover:text-gray-400 focus:outline-none focus:text-gray-500 transition duration-150 ease-in-out"
                            aria-label="Cart">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H6.911a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661Z" />
                            </svg>
                            <span class="absolute inset-0 object-right-top mr-2">
                                @if (count(\App\Models\Notification::fetchUnreadedNotifications()) >= 1)
                                    <div
                                        class="absolute top-0 right-0 flex justify-center px-1 py-0 mt-2 text-sm font-bold text-white bg-red-600 rounded-full transform translate-x-1/2 translate-y-1/2">
                                        {{ count(\App\Models\Notification::fetchUnreadedNotifications()) }}
                                    </div>
                                @endif
                            </span>
                        </button>
                    </a>

                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ Auth::user()->name }}

                                        <!-- Existing SVG for Dropdown Arrow -->
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            {{-- <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
        </div> --}}

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="shrink-0 mr-3">
                            <img class="h-10 w-10 rounded-full object-cover"
                                src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    {{-- begin nav menu options --}}
                    {{-- @can('view_all_sale')
                        <x-jet-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <x-jet-responsive-nav-link>
                                    {{ __('sales/index.title') }}
                                </x-jet-responsive-nav-link>
                            </x-slot>

                            <x-slot name="content">
                                <x-jet-dropdown-link
                                    href="{{ route(\App\Http\Controllers\Sale\ViewAllSaleController::class) }}">
                                    {{ __('sales/index.dropdown.all') }}
                                </x-jet-dropdown-link>

                                @can('view_create_sale')
                                    <x-jet-dropdown-link
                                        href="{{ route(\App\Http\Controllers\Sale\ViewCreateSaleController::class) }}">
                                        {{ __('sales/index.dropdown.create') }}
                                    </x-jet-dropdown-link>
                                @endcan
                            </x-slot>
                        </x-jet-dropdown>
                    @endcan --}}

                    {{-- @can('view_all_product')
                        <x-jet-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <x-jet-responsive-nav-link>
                                    {{ __('products/index.title') }}
                                </x-jet-responsive-nav-link>
                            </x-slot>

                            <x-slot name="content">
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Productos') }}
                                </div>

                                <x-jet-dropdown-link
                                    href="{{ route(\App\Http\Controllers\Product\ViewAllProductController::class) }}">
                                    {{ __('products/index.dropdown.all') }}
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link
                                    href="{{ route(\App\Http\Controllers\Product\ViewCreateProductController::class) }}">
                                    {{ __('products/index.dropdown.create') }}
                                </x-jet-dropdown-link>

                                @if ($config[0]['with_massive_price_update_module'])
                                    @can('massive_price_update')
                                        <x-jet-dropdown-link
                                            href="{{ route(\App\Http\Controllers\Product\Massive\ViewAllMassiveProductPriceController::class) }}">
                                            {{ __('Actualización masiva de precios') }}
                                        </x-jet-dropdown-link>
                                    @endcan
                                @endif

                                <!-- brands -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Marcas') }}
                                </div>

                                <x-jet-dropdown-link
                                    href="{{ route(\App\Http\Controllers\Brand\ViewAllBrandController::class) }}">
                                    {{ __('brands/index.dropdown.all') }}
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link
                                    href="{{ route(\App\Http\Controllers\Brand\ViewCreateBrandController::class) }}">
                                    {{ __('brands/index.dropdown.create') }}
                                </x-jet-dropdown-link>

                                <!-- categories -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Categorias') }}
                                </div>

                                <x-jet-dropdown-link
                                    href="{{ route(\App\Http\Controllers\Category\ViewAllCategoryController::class) }}">
                                    {{ __('categories/index.dropdown.all') }}
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link
                                    href="{{ route(\App\Http\Controllers\Category\ViewCreateCategoryController::class) }}">
                                    {{ __('categories/index.dropdown.create') }}
                                </x-jet-dropdown-link>
                            </x-slot>
                        </x-jet-dropdown>
                    @endcan --}}

                    {{-- @if ($config[1]['with_customers_module'])
                        @can('view_all_client')
                            <x-jet-dropdown align="left" width="48">
                                <x-slot name="trigger">
                                    <x-jet-responsive-nav-link>
                                        {{ __('clients/index.title') }}
                                    </x-jet-responsive-nav-link>
                                </x-slot>

                                <x-slot name="content">
                                    <x-jet-dropdown-link
                                        href="{{ route(\App\Http\Controllers\Client\ViewAllClientController::class) }}">
                                        {{ __('clients/index.dropdown.all') }}
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link
                                        href="{{ route(\App\Http\Controllers\Client\ViewCreateClientController::class) }}">
                                        {{ __('clients/index.dropdown.create') }}
                                    </x-jet-dropdown-link>
                                </x-slot>
                            </x-jet-dropdown>
                        @endcan
                    @endif

                    @if ($config[2]['with_users_module'])
                        @can('view_all_user')
                            <x-jet-dropdown align="left" width="48">
                                <x-slot name="trigger">
                                    <x-jet-responsive-nav-link>
                                        {{ __('users/index.title') }}
                                    </x-jet-responsive-nav-link>
                                </x-slot>

                                <x-slot name="content">
                                    <x-jet-dropdown-link
                                        href="{{ route(\App\Http\Controllers\User\ViewAllUserController::class) }}">
                                        {{ __('users/index.dropdown.all') }}
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link
                                        href="{{ route(\App\Http\Controllers\User\ViewCreateUserController::class) }}">
                                        {{ __('users/index.dropdown.create') }}
                                    </x-jet-dropdown-link>
                                </x-slot>
                            </x-jet-dropdown>
                        @endcan
                    @endif --}}
                    {{-- end nav menu options --}}

                    <!-- Account Management -->
                    <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-jet-responsive-nav-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-jet-responsive-nav-link>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-jet-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-jet-responsive-nav-link>
                    </form>

                    <!-- Team Management -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="border-t border-gray-200"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Team') }}
                        </div>

                        <!-- Team Settings -->
                        <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                            :active="request()->routeIs('teams.show')">
                            {{ __('Team Settings') }}
                        </x-jet-responsive-nav-link>

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                            <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                {{ __('Create New Team') }}
                            </x-jet-responsive-nav-link>
                        @endcan

                        <div class="border-t border-gray-200"></div>

                        <!-- Team Switcher -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
</nav>

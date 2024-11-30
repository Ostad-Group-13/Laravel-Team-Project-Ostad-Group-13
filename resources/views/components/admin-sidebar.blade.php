            <!-- Sidebar -->
            <aside id="sidebar"
                class="fixed inset-y-0 left-0 w-64 bg-white dark:bg-gray-800 shadow-md transform transition-transform duration-300 translate-x-0 z-50">
                <div class="p-6">
                    <a href="{{ url('/') }}" class="text-lg font-bold text-gray-800 dark:text-white"><img
                            src="{{ asset('images/CP-Logo.png') }}" alt=""></a>
                </div>
                <nav class="mt-6">
                    <ul>
                        <li class="mb-2 {{ request()->routeIs('dashboard') ? 'bg-blue-500 text-white' : 'bg-gray-100 hover:bg-blue-500 hover:text-white' }} transition duration-300 ease-linear">
                            <a href="{{ route('dashboard') }}"
                                class="flex items-center gap-3 px-6 py-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>
                                Dashboard
                            </a>
                        </li>

                        <li class="mb-2 {{ request()->routeIs('users.index') ? 'bg-blue-500 text-white' : 'bg-gray-100 hover:bg-blue-500 hover:text-white' }} transition duration-300 ease-linear"">
                            <a href="{{ route('users.index') }}"
                                class="block px-6 py-2 ">
                                Users
                            </a>
                        </li>
                        <li class="mb-2 {{ request()->routeIs('roles.index') ? 'bg-blue-500 text-white' : 'bg-gray-100 hover:bg-blue-500 hover:text-white' }} transition duration-300 ease-linear">
                            <a href="{{ route('roles.index') }}"
                                class="block px-6 py-2 ">
                                Roles
                            </a>
                        </li>
                        <li class="mb-2 {{ request()->routeIs('profile.show') ? 'bg-blue-500 text-white' : 'bg-gray-100 hover:bg-blue-500 hover:text-white' }} transition duration-300 ease-linear">
                            <a href="{{ route('profile.show') }}"
                                class="block px-6 py-2 ">
                                Settings
                            </a>
                        </li>
                        <hr>
                        <li class="mb-2 {{ request()->routeIs('category.index') ? 'bg-blue-500 text-white' : 'bg-gray-100 hover:bg-blue-500 hover:text-white' }} transition duration-300 ease-linear">
                            <a href="{{ route('category.index') }}"
                                class="block px-6 py-2 ">
                                Category
                            </a>
                        </li>
                         <li class="mb-2 {{ request()->routeIs('blog.index') ? 'bg-blue-500 text-white' : 'bg-gray-100 hover:bg-blue-500 hover:text-white' }} transition duration-300 ease-linear">
                            <a href="{{ route('blog.index') }}"
                                class="block px-6 py-2 ">
                                Blog
                            </a>
                        </li>
                        <li class="mb-2 {{ request()->routeIs('subscribe') ? 'bg-blue-500 text-white' : 'bg-gray-100 hover:bg-blue-500 hover:text-white' }} transition duration-300 ease-linear">
                            <a href="{{ route('subscribe') }}"
                                class="block px-6 py-2 ">
                                Subscription
                            </a>
                        </li>
                        <li class="mb-2 {{ request()->routeIs('contact') ? 'bg-blue-500 text-white' : 'bg-gray-100 hover:bg-blue-500 hover:text-white' }} transition duration-300 ease-linear">
                            <a href="{{ route('contact') }}"
                                class="block px-6 py-2 ">
                                Contact US
                            </a>
                        </li>
                         {{-- <li class="mb-2 {{ request()->routeIs('user-list') ? 'bg-blue-500 text-white' : 'bg-gray-100 hover:bg-blue-500 hover:text-white' }} transition duration-300 ease-linear">
                            <a href="{{ route('user-list') }}"
                                class="block px-6 py-2 ">
                                User Blog
                            </a>
                        </li> --}}
                    </ul>
                </nav>
            </aside>

          
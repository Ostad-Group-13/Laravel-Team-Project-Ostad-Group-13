            <!-- Sidebar -->
            <aside id="sidebar"
                class="fixed inset-y-0 left-0 w-64 bg-white dark:bg-gray-800 shadow-md transform transition-transform duration-300 translate-x-0 z-50">
                <div class="p-6">
                    <a href="{{ url('/') }}" class="text-lg font-bold text-gray-800 dark:text-white"><img
                            src="{{ asset('assets/img/logo/logo.png') }}" alt=""></a>
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
                            class="flex items-center gap-3 px-6 py-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                  </svg>                                  
                                Users
                            </a>
                        </li>
                        <li class="mb-2 {{ request()->routeIs('roles.index') ? 'bg-blue-500 text-white' : 'bg-gray-100 hover:bg-blue-500 hover:text-white' }} transition duration-300 ease-linear">
                            <a href="{{ route('roles.index') }}"
                            class="flex items-center gap-3 px-6 py-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                                  </svg>                                  
                                Roles
                            </a>
                        </li>

                        <li class="mb-2 {{ request()->routeIs('category.index') ? 'bg-blue-500 text-white' : 'bg-gray-100 hover:bg-blue-500 hover:text-white' }} transition duration-300 ease-linear">
                            <a href="{{ route('category.index') }}"
                            class="flex items-center gap-3 px-6 py-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                                  </svg>                                  
                                Category
                            </a>
                        </li>
                         <li class="mb-2 {{ request()->routeIs('blog.index') ? 'bg-blue-500 text-white' : 'bg-gray-100 hover:bg-blue-500 hover:text-white' }} transition duration-300 ease-linear">
                            <a href="{{ route('blog.index') }}"
                            class="flex items-center gap-3 px-6 py-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                  </svg>
                                  
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

          
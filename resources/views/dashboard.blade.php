<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-welcome /> --}}
                <x-dashboard />
            </div>
            <div class="mt-4">
                <div class="-mx-2 md:flex">
                    <div class="w-6/12 px-2">
                        <div class="rounded-lg shadow-sm mb-4">
                            <div class="rounded-lg bg-white shadow-lg md:shadow-xl relative overflow-hidden">
                                <div class="px-3 pt-8 pb-10 text-left relative z-10">
                                    <div class="flex gap-2 align-baseline align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                        </svg>
                                        <h4 class="text-sm uppercase text-gray-500 leading-tight">Users</h4>
                                    </div>
                                    <h3 class="text-3xl text-gray-700 font-semibold leading-tight my-3">{{ $user->count() }}</h3>
                                    <p class="text-xs text-green-500 leading-tight">▲ 57.1%</p>
                                </div>
                                <div class="absolute bottom-0 inset-x-0">
                                    <canvas id="chart1" height="70"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-6/12 px-2">
                        <div class="rounded-lg shadow-sm mb-4">
                            <div class="rounded-lg bg-white shadow-lg md:shadow-xl relative overflow-hidden">
                                <div class="px-3 pt-8 pb-10 text-left relative z-10">
                                    <span class="flex gap-2 align-baseline align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 6h.008v.008H6V6Z" />
                                        </svg>
                                        <h2 class="text-sm uppercase text-gray-500 leading-tight">Categories</h2>
                                    </span>
                                    <h3 class="text-3xl text-gray-700 font-semibold leading-tight my-3">{{ $category->count() }}</h3>
                                    <p class="text-xs text-red-500 leading-tight">▼ 10 %</p>
                                </div>
                                <div class="absolute bottom-0 inset-x-0">
                                    <canvas id="chart2" height="70"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-6/12 px-2">
                        <div class="rounded-lg shadow-sm mb-4">
                            <div class="rounded-lg bg-white shadow-lg md:shadow-xl relative overflow-hidden">
                                <div class="px-3 pt-8 pb-10 text-left relative z-10">
                                    <div class="flex gap-2 align-baseline align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>

                                        <h4 class="text-sm uppercase text-gray-500 leading-tight">Recipes</h4>
                                    </div>
                                    <h3 class="text-3xl text-gray-700 font-semibold leading-tight my-3"> {{ $recipe->count() }}</h3>
                                    <p class="text-xs text-green-500 leading-tight">▲ 57.1%</p>
                                </div>
                                <div class="absolute bottom-0 inset-x-0">
                                    <canvas id="chart1" height="70"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-6/12 px-2">
                        <div class="rounded-lg shadow-sm mb-4">
                            <div class="rounded-lg bg-white shadow-lg md:shadow-xl relative overflow-hidden">
                                <div class="px-3 pt-8 pb-10 text-left relative z-10">
                                    <div class="flex gap-2 align-baseline align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                                        </svg>
                                        <h4 class="text-sm uppercase text-gray-500 leading-tight">Blogs</h4>
                                    </div>
                                    <h3 class="text-3xl text-gray-700 font-semibold leading-tight my-3">{{ $blog->count() }}</h3>
                                    <p class="text-xs text-green-500 leading-tight">▲ 57.1%</p>
                                </div>
                                <div class="absolute bottom-0 inset-x-0">
                                    <canvas id="chart1" height="70"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-6/12 px-2">
                        <div class="rounded-lg shadow-sm mb-4">
                            <div class="rounded-lg bg-white shadow-lg md:shadow-xl relative overflow-hidden">
                                <div class="px-3 pt-8 pb-10 text-left relative z-10">
                                    <div class="flex gap-2 align-baseline align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                        </svg>

                                        <h4 class="text-sm uppercase text-gray-500 leading-tight">Favorite Recipe</h4>
                                    </div>
                                    <h3 class="text-3xl text-gray-700 font-semibold leading-tight my-3"> {{ $user->favoriteRecipes->count() }}</h3>
                                    <p class="text-xs text-green-500 leading-tight">▲ 57.1%</p>
                                </div>
                                <div class="absolute bottom-0 inset-x-0">
                                    <canvas id="chart1" height="70"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-6/12 px-2">
                        <div class="rounded-lg shadow-sm mb-4">
                            <div class="rounded-lg bg-white shadow-lg md:shadow-xl relative overflow-hidden">
                                <div class="px-3 pt-8 pb-10 text-left relative z-10">
                                    <div class="flex gap-2 align-baseline align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                        </svg>

                                        <h4 class="text-sm uppercase text-gray-500 leading-tight">Comments</h4>
                                    </div>
                                    <h3 class="text-3xl text-gray-700 font-semibold leading-tight my-3">{{ $comment->count() }}</h3>
                                    <p class="text-xs text-green-500 leading-tight">▲ 57.1%</p>
                                </div>
                                <div class="absolute bottom-0 inset-x-0">
                                    <canvas id="chart1" height="70"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- table -->
        <div class="flex align-middle gap-3 mb-3">
            <!-- User List -->
            <div class="w-6/12">
             {{-- <div class="py-3">
                    <a href="#" class="px-3 py-2 mb-3 rounded text-white bg-gray-500 hover:bg-green-600 hover:text-gray-900 border-r border-gray-200 transion duration-500 ease-in-out">User List</a>
                </div> --}}
                
                <div class="">
                    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                        <div
                            class="align-middle inline-block min-w-full overflow-hidden sm:rounded-lg border-b border-gray-200">
                            <table class="min-w-full">
                                <thead class="bg-blue-500 text-white">
                                    <tr class="divide-x divide-slate-200">
                                        <th
                                            class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th
                                            class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium uppercase tracking-wider">
                                            Email
                                        </th>
                                        <th
                                            class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th
                                            class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium uppercase tracking-wider">
                                            Role
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @foreach($allUsers AS $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full"
                                                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                        alt="" />
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm leading-5 font-medium text-gray-900">{{$user->name}}
                                                    </div>
                                                    <div class="text-sm leading-5 text-gray-500">
                                                       {{$user->email}}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">{{$user->email}}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Active
                                            </span>
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                             @forelse ($user->getRoleNames() as $role)
                                        <span
                                            class="bg-green-600 text-white text-xs font-medium px-2 py-1 rounded">{{ $role }}</span>
                                    @empty
                                        <span class="text-gray-500 text-sm">No Roles</span>
                                    @endforelse
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recipe List -->

            <div class="w-6/12">
                <div class="">
                <div class="-my-2 py-2">
                    <div
                        class="align-middle inline-block min-w-full overflow-hidden sm:rounded-lg border-b border-gray-500">
                        <table class="min-w-full">
                            <thead class="bg-green-500 text-white ">
                                <tr class="divide-x divide-slate-200">
                                    <th
                                        class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th
                                        class="px-6 py-3  text-left text-xs leading-4 font-medium uppercase tracking-wider">
                                        Title
                                    </th>
                                    <th
                                        class="px-6 py-3  text-left text-xs leading-4 font-medium uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th
                                        class="px-6 py-3  text-left text-xs leading-4 font-medium uppercase tracking-wider">
                                        Role
                                    </th>
                                    <th class="px-6 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full"
                                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                    alt="" />
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm leading-5 font-medium text-gray-900">Bernard Lane
                                                </div>
                                                <div class="text-sm leading-5 text-gray-500">bernardlane@example.com
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-900">Director</div>
                                        <div class="text-sm leading-5 text-gray-500">Human Resources</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Active
                                        </span>
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                        Owner
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                        <a href="#"
                                            class="text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full"
                                                    src="https://images.unsplash.com/photo-1532910404247-7ee9488d7292?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                    alt="" />
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm leading-5 font-medium text-gray-900">Bernard Lane
                                                </div>
                                                <div class="text-sm leading-5 text-gray-500">bernardlane@example.com
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-900">Director</div>
                                        <div class="text-sm leading-5 text-gray-500">Human Resources</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Active
                                        </span>
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                        Owner
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                        <a href="#"
                                            class="text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full"
                                                    src="https://images.unsplash.com/photo-1505503693641-1926193e8d57?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                    alt="" />
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm leading-5 font-medium text-gray-900">Bernard Lane
                                                </div>
                                                <div class="text-sm leading-5 text-gray-500">bernardlane@example.com
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-900">Director</div>
                                        <div class="text-sm leading-5 text-gray-500">Human Resources</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Inactive
                                        </span>
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                        Owner
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                        <a href="#"
                                            class="text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full"
                                                    src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                    alt="" />
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm leading-5 font-medium text-gray-900">Bernard Lane
                                                </div>
                                                <div class="text-sm leading-5 text-gray-500">bernardlane@example.com
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900">Director</div>
                                        <div class="text-sm leading-5 text-gray-500">Human Resources</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Inactive
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                        Owner
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                        <a href="#"
                                            class="text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline">Edit</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- table -->

        <div class="ml-2">
            <div class="">
                <div>
                    <h2 class="text-2xl font-semibold leading-tight text-left">Recipe List</h2>
                </div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead class="bg-red-600 text-white">
                                <tr class="divide-x divide-slate-200">
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200  text-left text-xs font-semibold uppercase tracking-wider">
                                        Recipe Title
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200  text-left text-xs font-semibold uppercase tracking-wider">
                                        Cook/Pre Timing
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200  text-left text-xs font-semibold uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200  text-left text-xs font-semibold uppercase tracking-wider">
                                        Recipe Type
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200  text-left text-xs font-semibold uppercase tracking-wider">
                                        Message
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200  text-left text-xs font-semibold uppercase tracking-wider">
                                        View Count
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 ">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recipe as $item)
                                <tr class="divide-x divide-slate-200">
                                    <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex">
                                            <div class="mt-2">
                                            <img src="{{$item->photo}}" class="w-full lg:w-[180px] lg:h-[120px] rounded-lg" />
                                                {{-- <img class="w-full h-full rounded-full"
                                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
                                                    alt="" /> --}}
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$item->title}}
                                                </p>
                                                 <span
                                            class="text-green-600 text-lg font-semibold capitalize">
                                            {{$item->category->name}}
                                        </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{$item->cook_time}} / {{$item->pre_time}}</p>
                                        
                                    </td>
                                    <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                                     @if ($item->recipe_status == 'approved')
                                     <span class="text-green-500 text-lg font-semibold capitalize">{{$item->recipe_status}}</span>
                                     @else
                                     <span class="text-red-500 text-lg font-semibold capitalize">{{$item->recipe_status}}</span>
                                     @endif
                                    
                                    </td> 
                                    <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                                        <p class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-800 text-white">{{$item->recipe_type}}</p>
                                    </td>
                                    <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                                        <span
                                            class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                            <span class="relative">{{$item->nutrition_text}}</span>
                                        </span>
                                    </td>
                                     <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                                            <span
                                                class="bg-green-500 text-white px-3 py-2 rounded-lg">{{$item->view_count}}</span>
                                   
                                    </td>
                                    <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm text-right">
                                        <button type="button" class="inline-block text-gray-500 hover:text-gray-700">
                                            <svg class="inline-block h-6 w-6 fill-current" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 6a2 2 0 110-4 2 2 0 010 4zm0 8a2 2 0 110-4 2 2 0 010 4zm-2 6a2 2 0 104 0 2 2 0 00-4 0z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="flex justify-between align-middle gap-3">
        <div class="bg-gray-800 text-gray-500 rounded shadow-xl py-5 px-5 w-full" x-data="{ cardOpen: false, cardData: cardData() }"
            x-init="$watch('cardOpen', value => value ? (cardData.countUp($refs.total, 0, 11602, null, 0.8), cardData.sessions.forEach((el, i) => cardData.countUp($refs[`device${i}`], 0, cardData.sessions[i].size, null, 1.6))) : null);
            setTimeout(() => { cardOpen = true }, 100)">
            <div class="flex w-full">
                <h3 class="text-lg font-semibold leading-tight flex-1">TOTAL SESSIONS</h3>
                <div class="relative h-5 leading-none">
                    <button class="text-xl text-gray-500 hover:text-gray-300 h-6 focus:outline-none"
                        @click.prevent="cardOpen=!cardOpen">
                        <i class="mdi" :class="'mdi-chevron-' + (cardOpen ? 'up' : 'down')"></i>
                    </button>
                </div>
            </div>
            <div class="relative overflow-hidden transition-all duration-500" x-ref="card"
                x-bind:style="`max-height:${cardOpen?$refs.card.scrollHeight:0}px; opacity:${cardOpen?1:0}`">
                <div>
                    <div class="pb-4 lg:pb-6">
                        <h4 class="text-2xl lg:text-3xl text-white font-semibold leading-tight inline-block"
                            x-ref="total">0</h4>
                    </div>
                    <div class="pb-4 lg:pb-6">
                        <div class="overflow-hidden rounded-full h-3 bg-gray-800 flex transition-all duration-500"
                            :class="cardOpen ? 'w-full' : 'w-0'">
                            <template x-for="(item,index) in cardData.sessions">
                                <div class="h-full" :class="`bg-${item.color}`" :style="`width:${item.size}%`">
                                </div>
                            </template>
                        </div>
                    </div>
                    <div class="flex -mx-4">
                        <template x-for="(item,index) in cardData.sessions">
                            <div class="w-1/3 px-4" :class="{ 'border-l border-gray-700': index !== 0 }">
                                <div class="text-sm">
                                    <span class="inline-block w-2 h-2 rounded-full mr-1 align-middle"
                                        :class="`bg-${item.color}`">&nbsp;</span>
                                    <span class="align-middle" x-text="item.label">&nbsp;</span>
                                </div>
                                <div class="font-medium text-lg text-white">
                                    <span :x-ref="`device${index}`">0</span>%
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>

        <!-- Component Start -->
        <div
            class="flex flex-col items-center w-full max-w-screen-md p-6 pb-6 mt-10 bg-white rounded-lg shadow-xl sm:p-8">
            <h2 class="text-xl font-bold">Monthly Revenue</h2>
            <span class="text-sm font-semibold text-gray-500">2025</span>
            <div class="flex items-end flex-grow w-full mt-2 space-x-2 sm:space-x-3">

                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$37,500</span>
                    <div class="flex items-end w-full">
                        <div class="relative flex justify-center flex-grow h-8 bg-indigo-200"></div>
                        <div class="relative flex justify-center flex-grow h-6 bg-indigo-400"></div>
                        <div class="relative flex justify-center flex-grow h-24 bg-indigo-600"></div>
                    </div>
                    <span class="absolute bottom-0 text-xs font-bold">Jan</span>
                </div>

                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$45,000</span>
                    <div class="flex items-end w-full">
                        <div class="relative flex justify-center flex-grow h-10 bg-indigo-200"></div>
                        <div class="relative flex justify-center flex-grow h-6 bg-indigo-300"></div>
                        <div class="relative flex justify-center flex-grow h-20 bg-indigo-400"></div>
                    </div>
                    <span class="absolute bottom-0 text-xs font-bold">Feb</span>
                </div>

                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$47,500</span>
                    <div class="flex items-end w-full">
                        <div class="relative flex justify-center flex-grow h-10 bg-indigo-200"></div>
                        <div class="relative flex justify-center flex-grow h-8 bg-indigo-300"></div>
                        <div class="relative flex justify-center flex-grow h-20 bg-indigo-400"></div>
                    </div>
                    <span class="absolute bottom-0 text-xs font-bold">Mar</span>
                </div>

                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$50,000</span>
                    <div class="flex items-end w-full">
                        <div class="relative flex justify-center flex-grow h-10 bg-indigo-200"></div>
                        <div class="relative flex justify-center flex-grow h-6 bg-indigo-300"></div>
                        <div class="relative flex justify-center flex-grow h-24 bg-indigo-400"></div>
                    </div>
                    <span class="absolute bottom-0 text-xs font-bold">Apr</span>
                </div>

                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$47,500</span>
                    <div class="flex items-end w-full">
                        <div class="relative flex justify-center flex-grow h-10 bg-indigo-200"></div>
                        <div class="relative flex justify-center flex-grow h-8 bg-indigo-300"></div>
                        <div class="relative flex justify-center flex-grow h-20 bg-indigo-400"></div>
                    </div>
                    <span class="absolute bottom-0 text-xs font-bold">May</span>
                </div>

                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$55,000</span>
                    <div class="flex items-end w-full">
                        <div class="relative flex justify-center flex-grow h-12 bg-indigo-200"></div>
                        <div class="relative flex justify-center flex-grow h-8 bg-indigo-300"></div>
                        <div class="relative flex justify-center flex-grow h-24 bg-indigo-400"></div>
                    </div>
                    <span class="absolute bottom-0 text-xs font-bold">Jun</span>
                </div>

                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$60,000</span>
                    <div class="flex items-end w-full">
                        <div class="relative flex justify-center flex-grow h-12 bg-indigo-200"></div>
                        <div class="relative flex justify-center flex-grow h-16 bg-indigo-300"></div>
                        <div class="relative flex justify-center flex-grow h-20 bg-indigo-400"></div>
                    </div>
                    <span class="absolute bottom-0 text-xs font-bold">Jul</span>
                </div>

                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$57,500</span>
                    <div class="flex items-end w-full">
                        <div class="relative flex justify-center flex-grow h-12 bg-indigo-200"></div>
                        <div class="relative flex justify-center flex-grow h-10 bg-indigo-300"></div>
                        <div class="relative flex justify-center flex-grow h-24 bg-indigo-400"></div>
                    </div>
                    <span class="absolute bottom-0 text-xs font-bold">Aug</span>
                </div>

                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$67,500</span>
                    <div class="flex items-end w-full">
                        <div class="relative flex justify-center flex-grow h-12 bg-indigo-200"></div>
                        <div class="relative flex justify-center flex-grow h-10 bg-indigo-300"></div>
                        <div class="relative flex justify-center flex-grow h-32 bg-indigo-400"></div>
                    </div>
                    <span class="absolute bottom-0 text-xs font-bold">Sep</span>
                </div>

                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$65,000</span>
                    <div class="flex items-end w-full">
                        <div class="relative flex justify-center flex-grow h-12 bg-indigo-200"></div>
                        <div class="relative flex justify-center flex-grow h-12 bg-indigo-300"></div>
                        <div class="relative flex justify-center flex-grow bg-indigo-400 h-28"></div>
                    </div>
                    <span class="absolute bottom-0 text-xs font-bold">Oct</span>
                </div>

                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$70,000</span>
                    <div class="flex items-end w-full">
                        <div class="relative flex justify-center flex-grow h-8 bg-indigo-200"></div>
                        <div class="relative flex justify-center flex-grow h-8 bg-indigo-300"></div>
                        <div class="relative flex justify-center flex-grow h-40 bg-indigo-400"></div>
                    </div>
                    <span class="absolute bottom-0 text-xs font-bold">Nov</span>
                </div>

                <div class="relative flex flex-col items-center flex-grow pb-5 group">
                    <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$75,000</span>
                    <div class="flex items-end w-full">
                        <div class="relative flex justify-center flex-grow h-12 bg-indigo-200"></div>
                        <div class="relative flex justify-center flex-grow h-8 bg-indigo-300"></div>
                        <div class="relative flex justify-center flex-grow h-40 bg-indigo-400"></div>
                    </div>
                    <span class="absolute bottom-0 text-xs font-bold">Dec</span>
                </div>
            </div>

            <div class="flex w-full mt-3">
                <div class="flex items-center ml-auto">
                    <span class="block w-4 h-4 bg-indigo-800"></span>
                    <span class="ml-1 text-xs font-medium">Existing</span>
                </div>
                <div class="flex items-center ml-4">
                    <span class="block w-4  h-4 bg-indigo-600"></span>
                    <span class="ml-1 text-xs font-medium">Upgrades</span>
                </div>
                <div class="flex items-center ml-4">
                    <span class="block w-4  h-4 bg-indigo-400"></span>
                    <span class="ml-1 text-xs font-medium">New</span>
                </div>
            </div>
        </div>
        <!-- Component End  -->
    </div>
    </div>
</x-app-layout>


<script>
    let cardData = function() {
        return {
            countUp: function(target, startVal, endVal, decimals, duration) {
                const countUp = new CountUp(target, startVal || 0, endVal, decimals || 0, duration || 2);
                countUp.start();
            },
            sessions: [{
                    "label": "Phone",
                    "size": 60,
                    "color": "indigo-600"
                },
                {
                    "label": "Tablet",
                    "size": 30,
                    "color": "indigo-400"
                },
                {
                    "label": "Desktop",
                    "size": 10,
                    "color": "indigo-200"
                }
            ]
        }
    }
</script>

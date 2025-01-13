<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Watch Recipe') }}
        </h2>
    </x-slot>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-white  uppercase bg-gray-500 dark:bg-gray-700 dark:text-gray-400">
                <tr class="divide-x divide-slate-200">
                    <th scope="col" class="px-6 py-3">
                        #Sl No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Recipe Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Expire Date
                    </th>
                    
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($RecipeWatch as $item)
                    <tr class="bg-white border-b hover:bg-gray-50 divide-x divide-slate-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $loop->index + 1 }}
                        </th>
                        <td class="px-3 py-2">
                             <img class="w-[120px] h-20" src="{{ asset($item->recipes->photo) }}" alt="" >
                        </td>
                        <td class="px-2 py-2">
                             {{ $item->recipes->title }}
                        </td>
                        <td class="px-2 py-2">
                             <span class="text-green-600 text-lg font-semibold">{{ $item->recipes->category->name }}</span>
                        </td>
                       <td class="px-2 py-2 text-red-600">
                       {{  Carbon\Carbon::parse($item->expires_at)->addDays(1)->format('l jS \of F Y h:i:s A') }} : {{  Carbon\Carbon::parse($item->expires_at)->addDays(1)->diffForHumans('D') }}
                            {{-- <p>Expires at: {{ Carbon\Carbon::now()->diffForHumans($item->expires_at) }}</p> --}}

                        </td>

                        <td class="px-2 py-2">
                            {{-- {{ $item->expires_at->format('Y') }} --}}
                            {{-- {{ Carbon\Carbon::parse($item->expires_at)->addDay() }} --}}

                            {{ Carbon\Carbon::parse($item->expires_at)->diffForHumans() }}
                        </td> 
                        
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium bg-green-800 text-white text-lg px-2 py-3 rounded">Remove Data</a>
                            
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-2xl text-red-600">No Recipe Watch</td>
                    </tr>
                @endforelse


            </tbody>
        </table>
    </div>


</x-app-layout>

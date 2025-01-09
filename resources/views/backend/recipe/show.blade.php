<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Single Recipe Views') }}
        </h2>
    </x-slot>


    <div class="flex justify-between align-middle bg-gray-500 px-3 py-3 text-white rounded-lg">
        <h2 class="pt-2 text-lg">Single Recipe Details :-</h2>
        <a class="bg-blue-500 px-3 py-2 rounded-lg" href="{{ route('recipe.index') }}">Back</a>
    </div>
    <div class="overflow-x-auto">

        <div class="my-2">
            <h2 class="py-3 text-lg">Recipe Image : </h2>
            <img class="rounded-lg w-[580px] h-[280px]"
                @if ($recipe->photo) src="{{ asset($recipe->photo) }}" @else src="{{ asset('uploads/no-image.png') }}" @endif>
        </div>

        <table class="w-full text-sm bg-gray-100 rounded-sm">
            <tbody>
                <tr class="bg-gray-400 border-b border-blue-400 px-2">
                <td class="px-2 text-lg text-white border-r ">Recipe Title :</td>
                <td scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                    {{ $recipe->title }}
                </td>
            </tr>

            <tr class="bg-gray-600 border-b border-blue-400 px-2">
                <td scope="row" class="px-2 text-lg text-white border-r ">Recipe Type :</td>
                <td scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                    {{ $recipe->recipe_type }}
                </td>
            </tr>

            <tr class="bg-gray-400 border-b border-blue-400 px-2">
                <td class="px-2 text-lg text-white border-r ">Recipe Category :</td>
                <td scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                    {{ $recipe->category->name }}
                </td>
            </tr>

            <tr class="bg-gray-600 border-b border-blue-400 px-2">
                <td class="px-2 text-lg text-white border-r ">Short Description :</td>
                <td scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                    {{ $recipe->short_description }}
                </td>
            </tr>

            <tr class="bg-gray-400 border-b border-blue-400 px-2">
                <td class="px-2 text-lg text-white border-r ">User Name :</td>
                <td scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                    {{ $recipe->user->name }}
                </td>
            </tr>
            </tbody>
        </table>
    </div>

</x-app-layout>

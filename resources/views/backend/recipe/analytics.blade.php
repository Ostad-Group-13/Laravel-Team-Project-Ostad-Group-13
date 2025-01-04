<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post Analytics') }}
        </h2>
    </x-slot>

<h1>Post Analytics</h1>
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Total Views</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->views }}</td>
            </tr>
        @endforeach
    </tbody>
</table>


</x-app-layout>
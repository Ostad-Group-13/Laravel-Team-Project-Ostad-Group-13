<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Subscription') }}
        </h2>
    </x-slot>

    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex justify-between align-items-center">
            <h2 class="py-2 font-semibold pb-4 text-lg">Manage Subscription</h2>
        </div>

        <div class="mt-4">

            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
                    <thead class="">
                        <tr class="bg-gray-100">
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase border-r">SL#</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase">Email</th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($subscription as $subscribe)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $subscribe->email }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-2 text-center text-sm text-red-500">
                                    <strong>No Subscription Found!</strong>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $subscription->links() }}
            </div>
        </div>
    </div>
</x-app-layout>

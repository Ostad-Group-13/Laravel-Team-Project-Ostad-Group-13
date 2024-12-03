<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contact') }}
        </h2>
    </x-slot>

    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex justify-between align-items-center">
            <h2 class="py-2 font-semibold pb-4 text-lg">All Contact List</h2>     
        </div>

        <div class="mt-4">

            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
                    <thead class="">
                        <tr class="bg-gray-100">
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase border-r">SL#</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase">Name</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase border-l">Email</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase  border-l">Subject</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase  border-l">Enquiry Type</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase  border-l">Message</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase border-l">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($contacts as $contact)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $contact->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $contact->email }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $contact->subject }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $contact->enquiry_type }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $contact->message }}</td>
                     
                                <td class="px-4 py-2 text-sm text-gray-700 space-x-2">
                                    <a href="#" class="edit-btn">Edit</a>
                                    
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-2 text-center text-sm text-red-500">
                                    <strong>No Contact Found!</strong>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>

<main>
    <div class="flex flex-wrap -mx-3">
        @if (session()->has('success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                <span class="font-medium">{{ session()->get('success') }}</span>.
            </div>
        @endif
        @if (session()->has('error'))
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                <span class="font-medium">{{ session()->get('error') }}</span>.
            </div>
        @endif
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="flex justify-between items-center px-6 py-4 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6>Request Books</h6>
            </div>
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-b-2xl bg-clip-border">
                <div class="flex-auto px-0 pt-0 pb-2">

                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        Book
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Student Name
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Mobile Number
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Request Date
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($requests as $request)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="flex items-center py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <img class="w-10 h-10 rounded-full"
                                                src="{{ asset('storage/' . $request->cover_image) }}" alt="book">
                                            <div class="pl-3">
                                                <div class="text-base font-semibold">{{ $request->book_name }}</div>
                                                <div class="font-normal text-gray-500">{{ $request->category }}</div>
                                            </div>
                                        </th>
                                        <td class="py-4 px-6">
                                            {{ $request->name }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $request->mobile_number }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $request->request_date }}
                                        </td>
                                        <td class="py-4 px-6 flex">
                                            <div class="flex justify-center">
                                                <button class="cursor-pointer" type="button"
                                                    wire:click="accept({{ $request->user_id }}, {{ $request->book_id }})">
                                                    <svg class="w-6 h-6 text-blue-500" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="flex justify-center">
                                                <button class="cursor-pointer" type="button"
                                                    wire:click="cancel({{ $request->user_id }}, {{ $request->book_id }})">
                                                    <svg class="w-6 h-6 text-red-500" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </button>
                                            </div>
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


</main>


<main>
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="flex justify-between items-center px-6 py-4 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6>Landed Books</h6>
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
                                        Issue Date
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Returning Date
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lands as $land)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="flex items-center py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <img class="w-10 h-10 rounded-full"
                                                src="{{ asset('storage/' . $land->cover_image) }}" alt="book">
                                            <div class="pl-3">
                                                <div class="text-base font-semibold">{{ $land->book_name }}</div>
                                                <div class="font-normal text-gray-500">{{ $land->category }}</div>
                                            </div>
                                        </th>
                                        <td class="py-4 px-6">
                                            {{ $land->name }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $land->mobile_number }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ date('m/d/Y', strtotime($land->issue_date)) }}
                                        </td>
                                        <td class="py-4 px-6">
                                            @php
                                                $date = explode(' ', $land->returning_date);
                                                echo date('m/d/Y', strtotime($date[0]))
                                            @endphp
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

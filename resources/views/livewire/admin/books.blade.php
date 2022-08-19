<main>
    <div class="w-full px-6 mx-auto">
        @if (session()->has('success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                role="alert">
                <span class="font-medium">{{ session()->get('success') }}</span>.
            </div>
        @endif
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="flex justify-between items-center px-6 py-4 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6>Books</h6>
                    <button
                        class="block text-white bg-indigo-500 hover:bg-indigo-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                        type="button" id="add" wire:click="empty_values">
                        Add
                    </button>
                </div>
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-b-2xl bg-clip-border">
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            Book Name
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Category
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $book)
                                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                            <th scope="row"
                                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('storage/' . $book->cover_image) }}"
                                                            class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-soft-in-out text-sm h-9 w-9 rounded-xl"
                                                            alt="user6" />
                                                    </div>
                                                    <div class="flex flex-col justify-center">
                                                        <h6 class="mb-0 leading-normal text-sm">{{ $book->book_name }}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="py-4 px-6">
                                                {{ $book->category }}
                                            </td>
                                            <td class="py-4 px-6">
                                                <div class="flex">
                                                    <button class="cursor-pointer" type="button"
                                                        id="edit"
                                                        wire:click="edit({{ $book->id }})">
                                                        <svg class="w-6 h-6 text-yellow-400" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                    <button class="cursor-pointer" type="button"
                                                        id="del"
                                                        wire:click="edit({{ $book->id }})">
                                                        <svg class="w-6 h-6 text-red-400" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                            </path>
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
        {{ $books->links() }}
    </div>

    <!-- Add -->
    <div wire:ignore.self id="adddialog"
        class="hidden fixed md:w-1/2 z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
        <div class="flex justify-between items-center">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Add Book
            </h3>
            <button type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                id="addcloseButton">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="py-5 border-t border-b border-gray-300">
            <div class="p-6 space-y-6">
                <form wire:submit.prevent="add_book" class="space-y-6" enctype='multipart/form-data'>
                    <div>
                        <label for="book_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Book
                            Name</label>
                        <input type="text" wire:model="book_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-0 focus:border-black"
                            placeholder="Book Name" required>
                        @error('book_name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Category</label>
                        <input type="text" wire:model="category" id="category" placeholder="Category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-0 focus:border-black"
                            required>
                        @error('category')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="cover"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cover
                            Image</label>
                        <input type="file" wire:model="cover"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2focus:outline-none focus:ring-0 focus:border-black"
                            required>
                        @error('cover')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit"
                        class="text-white bg-indigo-700 hover:bg-indigo-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add</button>
                </form>
            </div>
        </div>
    </div>

    {{-- edit --}}
    <div wire:ignore.self id="editdialog"
        class="hidden fixed md:w-1/2 z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
        <div class="flex justify-between items-center">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Edit Book
            </h3>
            <button type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                id="editcloseButton">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="py-5 border-t border-b border-gray-300">
            <div class="p-6 space-y-6">
                <form wire:submit.prevent="update_book" class="space-y-6" enctype='multipart/form-data'>
                    <div>
                        <label for="book_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Book
                            Name</label>
                        <input type="hidden" wire:model="book_id">
                        <input type="text" wire:model="book_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-0 focus:border-black"
                            placeholder="Book Name" required>
                        @error('book_name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Category</label>
                        <input type="text" wire:model="category" id="category" placeholder="Category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-0 focus:border-black"
                            required>
                        @error('category')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="cover"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cover
                            Image</label>
                        <input type="file" wire:model="cover"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2focus:outline-none focus:ring-0 focus:border-black">
                        @error('cover')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit"
                        class="text-white bg-indigo-700 hover:bg-indigo-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update</button>
                </form>
            </div>
        </div>
    </div>

    <div wire:ignore.self id="deldialog"
        class="hidden fixed md:w-1/2 z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
        <div class="flex justify-between items-center">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Delete Book
            </h3>
        </div>
        <div class="p-6 text-center">
            <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200"
                fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                delete this book?</h3>
            <button type="button" wire:click="book_delete"
                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                Yes, I'm sure
            </button>
            <button id="delcloseButton" type="button"
                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                cancel</button>
        </div>
    </div>

    <!-- Overlay element -->
    <div wire:ignore.self id="overlay"
        class="fixed hidden z-40 w-screen h-screen inset-0 bg-gray-900 bg-opacity-60"></div>




</main>

@section('script')
    <script>
        var add = document.getElementById('add');
        var adddialog = document.getElementById('adddialog');
        var addcloseButton = document.getElementById('addcloseButton');
        var overlay = document.getElementById('overlay')
        // show the overlay and the dialog
        add.addEventListener('click', function() {
            adddialog.classList.remove('hidden');
            overlay.classList.remove('hidden');
        });

        // hide the overlay and the dialog
        addcloseButton.addEventListener('click', function() {
            adddialog.classList.add('hidden');
            overlay.classList.add('hidden');
        });

        var edit = document.getElementById('edit');
        var editdialog = document.getElementById('editdialog');
        var editcloseButton = document.getElementById('editcloseButton');

        edit.addEventListener('click', function() {
            editdialog.classList.remove('hidden');
            overlay.classList.remove('hidden');
        });

        // hide the overlay and the dialog
        editcloseButton.addEventListener('click', function() {
            editdialog.classList.add('hidden');
            overlay.classList.add('hidden');
        });

        var del = document.getElementById('del');
        var deldialog = document.getElementById('deldialog');
        var delcloseButton = document.getElementById('delcloseButton');

        del.addEventListener('click', function() {
            deldialog.classList.remove('hidden');
            overlay.classList.remove('hidden');
        });

        // hide the overlay and the dialog
        delcloseButton.addEventListener('click', function() {
            deldialog.classList.add('hidden');
            overlay.classList.add('hidden');
        });

        window.addEventListener('close-modal', event => {
            adddialog.classList.add('hidden');
            editdialog.classList.add('hidden');
            deldialog.classList.add('hidden');
            overlay.classList.add('hidden');
        })

    </script>
@endsection

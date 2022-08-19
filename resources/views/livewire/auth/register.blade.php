<div class="bg-grey-lighter min-h-screen flex flex-col">
    <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
        <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
            <h1 class="mb-8 text-3xl text-center">Register</h1>
            <form wire:submit.prevent="register">
                <input type="text"
                    class="block border focus:ring-0 focus:border-black w-full p-3 rounded focus:outline-none"
                    wire:model="name" placeholder="Full Name" autocomplete="off" />
                @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                <input type="text"
                    class="block border focus:ring-0 focus:border-black w-full p-3 rounded mt-4 focus:outline-none"
                    wire:model="email" placeholder="Email" autocomplete="off" />
                @error('email')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                <input type="text"
                    class="block border focus:ring-0 focus:border-black w-full p-3 rounded mt-4 focus:outline-none"
                    wire:model="mobile_number" placeholder="Mobile Number" autocomplete="off" />
                @error('mobile_number')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                <input type="password"
                    class="block border focus:ring-0 focus:border-black w-full p-3 rounded my-4 focus:outline-none"
                    wire:model="password" placeholder="Password" autocomplete="off" />
                @error('password')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                <button type="#"
                    class="w-full text-center py-3 rounded bg-red-500 text-white hover:bg-red-600 focus:outline-none my-1">Create
                    Account</button>
            </form>

            <div class="text-center text-sm text-grey-dark mt-4">
                By signing up, you agree to the
                <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">
                    Terms of Service
                </a> and
                <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">
                    Privacy Policy
                </a>
            </div>
        </div>

        <div class="text-grey-dark mt-6">
            Already have an account?
            <a href="{{ route('login') }}" class="no-underline border-b border-blue text-red-500" href="../login/">
                Log in
            </a>
        </div>
    </div>
</div>

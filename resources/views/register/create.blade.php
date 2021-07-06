<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register!</h1>
            <form method="POST" action="/register" class="mt-10">
                {{-- cross site request forgery
                    it add an unique token that makes a validation that protect from those attacks--}}
                @csrf
                
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Name
                    </label>
                    <input type="text" name="name" id="name" required
                        {{-- old() remember the value from the last request, from laravel --}}
                        value="{{ old('name') }}" 
                        class="border border-gray-400 p-2 w-full">
                    
                    {{-- this is a validation method from laravel --}}
                    @error("name")
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Username
                    </label>
                    <input type="text" name="username" id="username" required
                        value="{{ old('username') }}" 
                        class="border border-gray-400 p-2 w-full">
                    @error("username")
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Email
                    </label>
                    <input type="email" name="email" id="email" required
                        value="{{ old('email') }}" 
                        class="border border-gray-400 p-2 w-full">
                    @error("email")
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>                
                
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Password
                    </label>
                    <input type="password" name="password" id="password" required
                        class="border border-gray-400 p-2 w-full">
                    @error("password")
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Submit
                    </button>
                </div>

                @if($errors->any())
                    <ul>
                        {{-- $errors is always set even when there's no errors --}}
                        @foreach($errors->all() as $error) 
                            <li class="text-red-500 text-xs">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

            </form>
        </main>
    </section>
</x-layout>
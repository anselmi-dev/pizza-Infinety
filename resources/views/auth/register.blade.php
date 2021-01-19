@extends('auth.layout')

@section('content')
<!-- Container -->
<div class="container mx-auto h-100">
    <div class="flex justify-center px-6">
        <!-- Row -->
        <div class="w-full xl:w-3/4 lg:w-11/12 flex">
            <!-- Col -->
            <div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
                <h3 class="pt-4 text-2xl text-center">
                    {{ __('Register') }}
                </h3>
                <form class="px-8 pt-6 mb-4 bg-white rounded" method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- First-name -->        
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                            {{ __('First name') }}
                        </label>
                        <input
                            id="name"
                            type="text"
                            class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autocomplete="name"
                            autofocus>

                        @error('name')
                            <p class="text-xs italic text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Email -->        
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                            {{ __('E-Mail Address') }}
                        </label>
                        <input
                            id="email"
                            type="email"
                            class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            autofocus>

                        @error('email')
                            <p class="text-xs italic text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Password -->    
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                            {{ __('Password') }}
                        </label>
                        <input
                            class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror"
                            id="password"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                        />
                        @error('password')
                            <p class="text-xs italic text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Password -->    
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="password_confirmation">
                            {{ __('Confirm Password') }}
                        </label>
                        <input
                            class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline @error('password_confirmation') border-red-500 @enderror"
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required autocomplete="new-password"
                        />
                        @error('password_confirmation')
                            <p class="text-xs italic text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <div class="mb-6 text-center">
                        <button
                            class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                            type="submit"
                        >
                            {{ __('Register') }}
                        </button>
                    </div>
                    <div class="text-center">
                        <a
                            class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                            href="{{ route('login') }}"
                        >
                            {{ __('Login') }}
                        </a>
                    </div>
                </form>
            </div>
            <!-- Col -->
            <div
                class="w-full h-auto bg-gray-400 hidden lg:block lg:w-1/2 bg-cover rounded-l-lg"
                style="background-image: url('https://source.unsplash.com/K4mSJ7kc0As/600x800')"
            ></div>
        </div>
    </div>
</div>
@endsection

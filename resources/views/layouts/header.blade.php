<div class="relative bg-white shadow-lg ">
    <div class="px-20 py-6">

      <!-- nav -->
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-center">
          <div class="flex items-center justify-center text-3xl font-bold text-true-gray-800">
            @include('layouts.logo')
            <span>
                Pizza Infinety
            </span>
          </div>
{{--           <div class="hidden lg:flex items-center justify-center antialiased lg:ml-20 pt-1">
            <a class="flex items-center justify-center mr-10 text-2xl text-gray-700 text-opacity-90 font-medium tracking-tight hover:text-cool-gray-600 transition duration-150 ease-in-out"
                href="{{ route('pizzas') }}">
                {{ __('Pizzas') }}
            </a>
          </div> --}}
        </div>
        <div class="hidden md:flex items-center justify-center">
            <a class="text-lg font-medium bg-gray-200 px-6 py-3 rounded-3xl rounded text-true-gray-800 hover:text-cool-gray-700 transition duration-150 ease-in-out"
                href="{{ route('pizzas') }}">
                {{ __('Pizzas') }}
            </a>
            <div class="h-10 mx-3 bg-gray-800 border border-gray-300 hidden lg:flex"></div>
            @guest
                @if (Route::has('login'))
                    <a class="mr-5 text-lg font-medium text-true-gray-800 hover:text-cool-gray-700 transition duration-150 ease-in-out"
                        href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a>
                @endif
                @if (Route::has('register'))
                    <a class="px-6 py-3 rounded-3xl font-medium bg-gradient-to-b from-gray-900 to-black text-white outline-none focus:outline-none hover:shadow-md hover:from-true-gray-900 transition duration-200 ease-in-out"
                        href="{{ route('register') }}">
                        {{ __('Register') }}
                    </a>
                @endif
            @else
                <a class="mr-5 text-lg font-medium text-true-gray-800 hover:text-cool-gray-700 transition duration-150 ease-in-out"
                   href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            @endguest
        </div>
      </div>
      <!-- /nav -->
    </div>
</div>
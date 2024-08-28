<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
        {{-- {{ $logo }} --}}
        <a class="navbar-brand" href="#"><img class="main-logo" src="img/mainstreamlodo.png" alt="" style="width: 170px; height: auto;"/></a>

    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>

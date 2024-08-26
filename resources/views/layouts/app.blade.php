<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
     
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <style>
            .search-box {
                max-width: 200px;
                margin-left: auto;
            }

             /* Basic styling for the modal */
    .form-control {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        padding: 10px 20px;
        border-radius: 5px;
        color: white;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 10px 20px;
        border-radius: 5px;
        color: white;
    }

    .btn-primary:hover, .btn-secondary:hover {
        opacity: 0.9;
    }
        </style>

   
        @include('layouts.head')
        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

        @livewireStyles
     
    </head>

    <body class="font-sans antialiased" id="app">

        @include('layouts.left-sidebar')
       
        <div class="all-content-wrapper">

            @include('layouts.navigationbar')
            
            @yield('content')
            <br>    
           
            @include('layouts.footer')
        </div>


        @include('layouts.javascript2')

        @livewireScripts


    </body>
</html>

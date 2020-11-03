<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
    </head>
    <body>
        <div class="max-w-6xl mx-auto">
          <div class="flex items-center justify-center min-h-screen">
              <div class="max-w-sm w-full sm:w-1/2 lg:w-1/3 py-6 px-3">
                  <div class="bg-white shadow-xl rounded-lg overflow-hidden">
                      <div class="bg-cover bg-center h-56 p-4" style="background-image: url(/img/grupojunin.jpg)">
                      </div>
                      <div class="p-4">
                            <p class="uppercase tracking-wide text-sm font-bold text-gray-700">Acceda al siguiente link</p>
                            <p class="text-3xl text-gray-900">{{$mail}}</p>
                            <p class="text-3xl text-gray-900">{{$cis}}</p>
                            <div class="items-center text-center mb-2 mt-2">
                            <a href="{{url('/verify/verifymail/'. $verify_code)}}" 
                                    class="rounded-full bg-green-500 uppercase px-2 py-1 text-xs font-bold">Verificar</span>
                            </div>
                      </div>
                      <div class="flex items-center justify-center p-4 border-t border-gray-300 text-gray-700">
                          <div class="flex items-center">
                              <span class="text-blue-900 font-bold">
                                <a href="www.grupojunin.com.ar">www.grupojunin.com.ar</a>
                              </span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </body>
</html>
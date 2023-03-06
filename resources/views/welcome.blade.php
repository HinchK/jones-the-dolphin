<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Jones</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Roboto:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="antialiased bg-black">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

                <div class="flex flex-col space-y-4 p-4">
                    @foreach($messages as $message)
                        <div class="flex rounded-lg p-4 @if ($message['role'] === 'assistant') bg-green-200 flex-reverse @else bg-blue-200 @endif ">
                            <div class="ml-4">
                                <div class="text-lg">
                                    @if ($message['role'] === 'assistant')
                                        <a href="#" class="font-medium text-gray-900">LaravelGPT</a>
                                    @else
                                        <a href="#" class="font-medium text-gray-900">You</a>
                                    @endif
                                </div>
                                <div class="mt-1">
                                    <p class="text-gray-600">
                                        {!! \Illuminate\Mail\Markdown::parse($message['content']) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <form class="p-4 flex justify-center items-center font-bold bg-orange-800 text-white-900" action="/" method="post">
                    @csrf
                    <label for="message">HOLLA:</label>
                    <input id="message" type="text" name="message" autocomplete="off" class="border rounded-md  p-2 flex-1" />
                    <a class="bg-gray-800 text-white p-2 rounded-md" href="/reset">RESET</a>
                </form>


                </div>
    </body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <title>DarirGigs | Find Laravel Jobs & Projects</title>
</head>

<body class="mb-48">
    <nav class="flex justify-between items-center mx-4 m-2">
        <a href="{{route('home')}}">
            <h1 class="text-5xl font-bold text-laravel">
                Darir<span class="text-black">GIGS</span>
            </h1>
        </a>

        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
                <li>
                    <span class="font-bold uppercase">
                        Welcom {{ auth()->user()->name }}
                    </span>
                </li>
                <li>
                    <a href="{{route('listings.manage')}}" class="hover:text-laravel"><i class="fa-solid fa-gear"></i>
                        Manage Listings</a>
                </li>
                <li>
                    <form class="inline" method="post" action="/logout">
                        @csrf
                        <button type="submit" class=""><i class="fa-solid fa-door-closed"></i>Logout</button>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{route('register.form')}}" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
                </li>
                <li>
                    <a href="{{route('login.form')}}" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a>
                </li>
            @endauth
        </ul>
    </nav>
    <x-alert-message />
    <main>
        {{ $slot }}
    </main>
    <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Copyright &copy; 2023, All Rights reserved</p>

        <a href="{{route('listings.create')}}" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Post Job</a>
    </footer>
</body>

</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Student Management System')</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f4f6f9;
        }

        nav {
            background: #263445;
            padding: 18px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
        }

        main {
            padding: 30px;
            min-height: 70vh;
        }

        footer {
            background: #263445;
            color: white;
            text-align: center;
            padding: 15px;
        }

        h1 {
            color: #263445;
        }
    </style>
</head>

<body>

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

</body>
</html>

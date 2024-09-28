<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    {{-- Fontes Google --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

    {{-- BootStrap --}}
    <link rel="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/styles.css">
    
</head>

@yield('content')

<body>
    <footer>
        <p>TESTE &copy;</p>
    </footer>
</body>

</html>
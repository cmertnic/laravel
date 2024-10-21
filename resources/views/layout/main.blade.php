<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задание 2</title>
    <link rel="stylesheet" href="/styles/home.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>
        <div class="logo">
            <img src="{{ url('img/logo.png') }}" alt="Example Image">
        </div>
        <ul class="menu">
            <a href="/"><li>Главная</li></a>
            <a href="/array"><li>Массивы</li></a>
            <a href="/reports"><li>жалобы</li></a>
        </ul>
    </header>
    <main>
        @yield("content")
    </main>
    <footer>
<p>Скутин Леонид Андреевич, 2024</p>
    </footer>
</body>

</html>

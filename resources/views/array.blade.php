<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задание 2</title>
    <link rel="stylesheet" href="/styles/array.css">
</head>
<body>
    <header>
    <div class="logo">
            <img src="{{ url('img/logo.png') }}" alt="Example Image">
        </div>
        <ul class="menu">
            <a href="/"><li>Главная</li></a>
            <a href="/array"><li>Массивы</li></a>
        </ul>
    </header>
    <main>
<div class="cards">
        @foreach($array as $item)
                <div class="card">
                    <img src="{{ asset($item['path']) }}" class="card_img_top" alt="{{ $item['title'] }}">
                    <div class="card_body">
                        <h2 class="card_title">{{ $item['title'] }}</h2>
                        <p class="card_text">Цена: {{ $item['price'] }} ₽</p>
                    </div>
                </div>
        @endforeach
    </div>        
    </main>
    
    <footer>
<p>Скутин Леонид Андреевич, 2024</p>
    </footer>
</body>
</html>
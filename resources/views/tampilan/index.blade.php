<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background-image: url('{{ asset('images/background/hero.jpg') }}');
            background-size: cover;
            background-image: center;
        }

        .slider {
            position: relative;
            max-width: 100%;
            box-sizing: border-box;
            overflow: hidden;
            /* background-color: lightskyblue; */
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .slider_item {
            width: 100%;
            flex-shrink: 0;
            padding: 10px;
        }

        .slider_item h1 {
            font-family: "Dancing Script", cursive;
        }

        .slides {
            display: flex;
        }
        .nav-button {
            background-color: rgba(255, 255, 255, 0.7);
            border: none;
            bottom: 0;
            cursor: pointer;
        }
        .prev {
            left: 10px;
        }
        .next {
            right: 10px;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>

    <div class="container  text-white my-3">
        <nav class="d-flex justify-content-between align-items-center">
            <div class="kiri">
                <h1>Edit</h1>
            </div>
            <div class="tengah">
                <ul class="nav justify-content-center">
                    <li class="nav-item"><a href="" class="nav-link text-white link-warning">HOME</a></li>
                    <li class="nav-item"><a href="" class="nav-link text-white link-warning">MENU</a></li>
                    <li class="nav-item"><a href="" class="nav-link text-white link-warning">ABOUT</a></li>
                    <li class="nav-item"><a href="" class="nav-link text-white link-warning">BOOK TABLE</a></li>
                </ul>
            </div>
            <div class="kanan">
                <div class="user-option d-flex justify-content-around align-items-center" style="width: 250px;">
                    <a href="" class="nav-link text-white link-warning" style="">
                        <i class="fa fa-user"></i>
                    </a>
                    <a href="" class="nav-link text-white link-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-cart-check-fill" viewBox="0 0 16 16">
                            <path
                                d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708" />
                    </a>
                    <a href="" class="nav-link text-white link-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                        </svg>
                    </a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-warning rounded-pill px-3 text-white">
                            logout
                        </button>
                    </form>
                </div>

            </div>
        </nav>
        <div class="slider">
            <div class="slides">
                @foreach ($slider as $s)
                    <div class="slider_item">
                        <h1>{{ $s->judul }}</h1>
                        <p>{{ $s->keterangan }}</p>
                        <a href="{{ $s->url }}" target="_blank" class="btn btn-warning rounded-pill">Order</a>
                    </div>
                @endforeach
            </div>
            <div class="button-nav">
                <button class="nav-button prev" style="margin-right:20px;">❮</button>
                <button class="nav-button next">❯</button>
            </div>
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        let currentIndex = 0;
        const slides = document.querySelector('.slides');
        const totalSlides = document.querySelectorAll('.slider_item').length;

        document.querySelector('.next').addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % totalSlides;
            updateSlidePosition();
        });

        document.querySelector('.prev').addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            updateSlidePosition();
        });

        function updateSlidePosition() {
            const offset = -currentIndex * 100; // Offset dalam persentase
            slides.style.transform = `translateX(${offset}%)`;
        }
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ArsyAgro</title>
    <link rel="stylesheet" href="/css/stylehome.css">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Parralax Plugin --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/js/parallax.js-1.5.0/parallax.js"></script>
</head>
<body>
    {{-- Header --}}
    <header class="parallax-window" data-parallax="scroll" data-image-src="/images/header-bg.jpg">
        <nav>
            <h1 class="logo"><a href="/">ArsyAgro</a></h1>
            
            <ul class="navbar-nav ms-auto">
                @auth
                 
                    <a href="/dashboard" class="btn-sign-up">
                      Welcome Back, {{ ucfirst(auth()->user()->name) }}
                      
                    </a>
                   
                 
                @else
                <a href="/login" class="btn-sign-up">Sign In</a>
                @endauth
              </ul>    
        </nav>
        <div class="header-title">Hasil Bumi.</div>
        <div class="header-bottom">
            <p class="today-date">{{ $tanggal }} <span>/ {{ $bulan }}</span></p>
            <ul class="social-media">
                <li><a href="">Instagram</a></li>
                <li><a href="">GitHub</a></li>
                <li><a href="">Youtube</a></li>
            </ul>
        </div>
    </header>
    {{-- About --}}
    <section id="about">
        <div class="about-container">
            <div class="image-gallery">
                <div class="image-box">
                    <img src="/image/img-1.jpg" alt="image">
                    <h2 class="arsy">A</h2>
                </div>
                <div class="image-box">
                    <img src="/image/img-2.jpg" alt="image">
                    <h2 class="arsy">R</h2>
                </div>
                <div class="image-box">
                    <img src="/image/img-3.jpg" alt="image">
                    <h2 class="arsy">S</h2>
                </div>
                <div class="image-box">
                    <img src="/image/img-4.jpg" alt="image">
                    <h2 class="arsy">Y</h2>
                </div>
            </div>
            <div class="about-info">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae amet numquam corrupti laboriosam! Velit, repellat aspernatur quaerat quos non hic eum nostrum similique obcaecati, culpa eligendi architecto, saepe earum provident!
            </div>
        </div>
    </section>
    {{-- Footer --}}
    <footer>Dibuat Oleh Fayyad  <i class="fa fa-heart"></i></footer>
</body>
</html>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.min.css" integrity="sha512-ztsAq/T5Mif7onFaDEa5wsi2yyDn5ygdVwSSQ4iok5BPJQGYz1CoXWZSA7OgwGWrxrSrbF0K85PD5uLpimu4eQ==" crossorigin="anonymous" />
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700;900&display=swap" rel="stylesheet">

    <script src="script.js"></script>
</head>

<body>
    <div class="header">
        <div class="logo">
            <img src="immagini/logo.png" alt="immagine non disponibile">
        </div>
        <ul class="menu">
            <li>
                <a href="home.php">
                    <div class="elenco">HOME</div>
                </a>
            </li>
            <li class="has-children">
                <a href="pagine/shop.php">
                    <div class="elenco">SHOP</div>
                </a>
                <ul class="sub-menu">
                    <li><a href="pagine/shopl.php">labbra</a></li>
                    <li><a href="pagine/shopo.php">occhi</a></li>
                    <li><a href="pagine/shop.php">viso</a></li>
                </ul>
            </li>
            <li>
                <a href="pagine/assistenza.php">
                    <div class="elenco">ASSISTENZA</div>
                </a>
            </li>
        </ul>

        <div class="cta">
            <a href="pagine/accedi.php" class="buttona">Accedi</a>
        </div>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.pkgd.min.js" integrity="sha512-Nx/M3T/fWprNarYOrnl+gfWZ25YlZtSNmhjHeC0+2gCtyAdDFXqaORJBj1dC427zt3z/HwkUpPX+cxzonjUgrA==" crossorigin="anonymous"></script>

    

    <div class="spessore-menu"></div>
    <div class="spessore-bottom"></div>

    <div class="container reveal">
        <div id="slider">
            <button onclick="prec()"> < </button>
            <div id="img_slider">
                <img src="immagini/img1.jpg">
                <img src="immagini/img2.jpg">
                <img src="immagini/img3.jpg">
            </div>
            <button onclick="succ()">></button>
        </div>
    </div>

    <div class="spazio"></div>

    <div class="poster mt-3">
        <div class="poster__content reveal">
            <div class="casella">
                <h3 class="big-text">NEW START</h3>
                <p>Migliora la tua routine di bellezza e cura della pelle grazie ai consigli dei nostri esperti.</p>
            </div>
            <a href="pagine/shop.php" class="button">Shop Now</a>
        </div>

        <div class="poster__img  reveal">
            <img src="immagini/primafoto.png" alt="immagine non disponibile">
        </div>
    </div>

    <div class="spazio"></div>

    <div class="sconto reveal">
        <p>Spedizione gratuita oltre 50€</p>
    </div>

    <div class="spazio"></div>

    <div class="poster mt-3">
        <div class="poster__img  reveal">
            <img src="immagini/secondafoto.png" alt="immagine non disponibile">
        </div>

        <div class="poster__content reveal">
            <div class="casella">
                <h3 class="big-text">START FRESH</h3>
                <p>Studi clinici dimostrano gli effetti positivi dei nostri prodotti occhi</p>
            </div>
            <a href="pagine/shop.php" class="button">Shop Now</a>
        </div>
    </div>

    <div class="footer">
        <ul class="social">
            <li><a href="pagine/iscriviti.php">Iscriviti Ora</a></li>
            <li><a href="pagine/shop.php">Rivenditori</a></li>
            <li><a href="pagine/contatti.php">Contatti</a></li>
        </ul>
        <ul class="social">
            <li><a href="https://www.instagram.com/">Instagram</a></li>
            <li><a href="https://it-it.facebook.com/login/web/">Facebook</a></li>
            <li><a href="https://www.pinterest.it/">Pinterest</a></li>
        </ul>
    </div>
    <script>
        $(document).ready(function() {
            /* Open Panel */
            $(".hamburger").on('click', function() {
                $(".menu").toggleClass("menu--open");
            });

        });
        ScrollReveal().reveal('.reveal', {
            distance: '100px',
            duration: 1500,
            easing: 'cubic-bezier(.215, .61, .355, 1)',
            interval: 400,
        });

        ScrollReveal().reveal('.zoom', {
            duration: 1500,
            easing: 'cubic-bezier(.215, .61, .355, 1)',
            interval: 200,
            scale: 0.65,
            mobile: false,
        });
    </script>
</body>

</html>
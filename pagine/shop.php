<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.min.css" integrity="sha512-ztsAq/T5Mif7onFaDEa5wsi2yyDn5ygdVwSSQ4iok5BPJQGYz1CoXWZSA7OgwGWrxrSrbF0K85PD5uLpimu4eQ==" crossorigin="anonymous" />
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700;900&display=swap" rel="stylesheet">

    <script src="script.js"></script>
</head>

<body>
    <div class="header">
        <div class="logo">
            <img src="../immagini/logo.png" alt="immagine non disponibile">
        </div>
        <ul class="menu">
            <li>
                <a href="../home.php">
                    <div class="elenco">HOME</div>
                </a>
            </li>
            <li class="has-children">
                <a href="../pagine/shop.php">
                    <div class="elenco">SHOP</div>
                </a>
                <ul class="sub-menu">
                    <li><a href="#labbra">labbra</a></li>
                    <li><a href="#occhi">occhi</a></li>
                    <li><a href="#viso">viso</a></li>
                </ul>
            </li>
            <li>
                <a href="../pagine/assistenza.php">
                    <div class="elenco">ASSISTENZA</div>
                </a>
            </li>
            <li>
                <a href="accedi.php">
                    <div class="iconacarrello"><img src="../immagini/iconacarrello.png" alt="immagine non disponibile"></div>
                </a>
            </li>
        </ul>

        <div class="cta">
            <a href="../pagine/accedi.php" class="buttona">Accedi</a>
        </div>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            /* Open Panel */
            $("..hamburger").on('click', function() {
                $("..menu").toggleClass("menu--open");
            });

        });
    </script>

    <div class="spessore-menu"></div>

    <a name="viso"></a><div class="panel-blue mt-3">
        <div class="grid">
            <div class="col panel-blue__dots reveal">
                <div class="dot" style="background: url(../immagini/cipria.jpg) no-repeat center center; background-size: cover;">
                    <span class="tooltip">CIPRIA<div class="buttonbuy">
                    <a href="accedi.php">BUY</a></div></span>
                </div>
                <div class="dot" style="background: url(../immagini/fondotinta.jpg) no-repeat center center; background-size: cover;">
                    <span class="tooltip">FONDOTINTA<div class="buttonbuy">
                    <a href="accedi.php">BUY</a></div></span>
                </div>
                <div class="dot" style="background: url(../immagini/correttore.jpg) no-repeat center center; background-size: cover;">
                    <span class="tooltip">CORRETTORE<div class="buttonbuy">
                    <a href="accedi.php">BUY</a></div></span>
                </div>
                <div class="dot" style="background: url(../immagini/conturing.jpg) no-repeat center center; background-size: cover;">
                    <span class="tooltip">CONTURING<div class="buttonbuy">
                    <a href="accedi.php">BUY</a></div></span>
                </div>
            </div>
            <div class="col panel-blue__text reveal">
                <div class="grid">
                    <div class="colreveal">
                        <h3 class="big-text1 tw">VISO</h3>
                    </div>
                    <div class="colreveal">
                        <p class="mt-sma-0">Un bel trucco inizia senza dubbio anche da una bella base viso e da un pelle il più possibile priva di imperfezioni come rossori o occhiaie.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="spazio"></div>

    <a name="labbra"></a><div class="panel-blue mt-3">
        <div class="grid">
            <div class="col panel-blue__dots reveal">
                <div class="dot" style="background: url(../immagini/rossetto.jpg) no-repeat center center; background-size: cover;">
                    <span class="tooltip">ROSSETTO<div class="buttonbuy">
                    <a href="accedi.php">BUY</a></div></span>
                </div>
                <div class="dot" style="background: url(../immagini/lucidalabbra.jpg) no-repeat center center; background-size: cover;">
                    <span class="tooltip">LUCIDALABBRA<div class="buttonbuy">
                    <a href="accedi.php">BUY</a></div></span>
                </div>
                <div class="dot" style="background: url(../immagini/tintalabbra.jpg) no-repeat center center; background-size: cover;">
                    <span class="tooltip">TINTALABBRA<div class="buttonbuy">
                    <a href="accedi.php">BUY</a></div></span>
                </div>
                <div class="dot" style="background: url(../immagini/burrocacao.jpg) no-repeat center center; background-size: cover;">
                    <span class="tooltip">BURROCACAO<div class="buttonbuy">
                    <a href="accedi.php">BUY</a></div></span>
                </div>
            </div>
            <div class="col panel-blue__text reveal">
                <div class="grid">
                    <div class="colreveal">
                        <h3 class="big-text1 tw">LABBRA</h3>
                    </div>
                    <div class="colreveal">
                        <p class="mt-sma-0">Labbra secche e screpolate? Un buon trattamento labbra è indispensabile tanto quanto la protezione della tua pelle!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="spazio"></div>

    <a name="occhi"></a><div class="panel-blue mt-3">
        <div class="grid">
            <div class="col panel-blue__dots reveal">
                <div class="dot" style="background: url(../immagini/mascara.jpg) no-repeat center center; background-size: cover;">
                    <span class="tooltip">MASCARA<div class="buttonbuy">
                    <a href="accedi.php">BUY</a></div></span>
                </div>
                <div class="dot" style="background: url(../immagini/ombretto.jpg) no-repeat center center; background-size: cover;">
                    <span class="tooltip">OMBRETTO<div class="buttonbuy">
                    <a href="accedi.php">BUY</a></div></span>
                </div>
                <div class="dot" style="background: url(../immagini/eyeliner.jpg) no-repeat center center; background-size: cover;">
                    <span class="tooltip">EYELINER<div class="buttonbuy">
                    <a href="accedi.php">BUY</a></div></span>
                </div>
                <div class="dot" style="background: url(../immagini/matita.jpg) no-repeat center center; background-size: cover;">
                    <span class="tooltip">MATITA<div class="buttonbuy">
                    <a href="accedi.php">BUY</a></div></span>
                </div>
            </div>
            <div class="col panel-blue__text reveal">
                <div class="grid">
                    <div class="colreveal">
                        <h3 class="big-text1 tw">OCCHI</h3>
                    </div>
                    <div class="colreveal">
                        <p class="mt-sma-0">La formulazione dei nuovi prodotti è arricchita con vitamina E ed estratti di camomilla per offrire alla palpebra un comfort mai visto prima.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="spazio"></div>
    <div class="join reveal">
        <p><a href="../pagine/accedi.php" class="join"># Join the IG Makeup Community</a></p>
    </div>
    <div class="spazio"></div>

    <div class="footer">
        <ul class="social">
            <li><a href="../pagine/iscriviti.php">Iscriviti Ora</a></li>
            <li><a href="../pagine/shop.php">Rivenditori</a></li>
            <li><a href="../pagine/contatti.php">Contatti</a></li>
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
<?php

include_once('admin/components/db.php');
$db = new Database();
$lang = $_GET['lang'] ?? 'tr';

$posts = $db->getPosts($lang, false);
$slides = $db->getSlides();
$languages = $db->getLanguages();
?>

<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
  <title>
    Golden90
  </title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  <link rel="stylesheet" href="css/site.css?time=<?= time() ?>">
</head>

<body>
  <div class="wrapper" id="overview">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="/"><img src="img/logo.png" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <?php foreach ($posts['nav_link'] as $nav_link) : ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= $nav_link['link'] ?>">
                  <img src="<?= $nav_link['icon'] ?>" />
                  <span><?= $nav_link['text'] ?></span>
                </a>
              </li>
            <?php endforeach ?>
          </ul>
          <!-- <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="https://182golden90.com/Football"><img src="img/spor.svg" /></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://182golden90.com/Live"><img src="img/canli.svg" /></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://182golden90.com/Casino/Slots"><img src="img/casino.svg" /></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://182golden90.com/Casino/LiveCasino"><img src="img/canlicasino.svg" /></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://182golden90.com/VirtualSports"><img src="img/sanalspor.svg" /></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://182golden90.com/Betzone"><img src="img/betzone.svg" /></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://182golden90.com/Promotions"><img src="img/promo.svg" /></a>
                        </li>
                    </ul> -->
          <ul class="navbar-nav mr-right align-items-center">
            <li class="nav-item">
              <div class="dropdown">
                <button class="btn language_btn btn-secondary dropdown-toggle nav__btn" type="button" data-toggle="dropdown" aria-expanded="false">
                  <img src="img/flags/<?= $lang ?>.svg" alt="" class="">
                  <span><?= $lang ?></span>
                </button>
                <div class="dropdown-menu language_dropdown_menu">
                  <?php foreach ($languages as $i => $language) : ?>
                    <a class="dropdown-item" href="?lang=<?= $language['keyword'] ?>"><?= $language['name'] ?></a>
                  <?php endforeach ?>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link login-btn" href="https://182golden90.com/Register"><img src="img/UYEOL.svg" /></a>
            </li>
            <li class="nav-item">
              <a href="<?= $posts['login']['link'] ?>" class="btn btn-secondary nav__btn"><?= $posts['login']['text'] ?></a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="section mainslider">
      <?php foreach ($slides as $i => $slide) : ?>
        <div>
          <div class="slide" style="background-image: url('<?= $slide['picture'] ?>');" data-index="<?= $i ?>"></div>
        </div>
      <?php endforeach ?>
    </div>
    <div class="section mob-mainslider">
      <?php foreach ($slides as $i => $slide) : ?>
        <div>
          <div class="slide" style="background-image: url('<?= $slide['picture_mobile'] ?>');" data-index="<?= $i ?>"></div>
        </div>
      <?php endforeach ?>
    </div>
    <div class="section slider-footer">
      <div class="container-fluid">
        <div class="">
          <div class="navigate-slider">
            <div><a href="https://182golden90.com/Football" class="navigate-link"><img src="img/futbol.png" /></a></div>
            <div><a href="https://182golden90.com/Tennis" class="navigate-link"><img src="img/tenis.png" /></a></div>
            <div><a href="https://182golden90.com/Handball" class="navigate-link"><img src="img/hantbol.png" /></a></div>
            <div><a href="https://182golden90.com/Basketball" class="navigate-link"><img src="img/basketbol.png" /></a></div>
            <div><a href="https://182golden90.com/Volleyball" class="navigate-link"><img src="img/voleybol.png" /></a></div>
            <div><a href="https://182golden90.com/Tennis" class="navigate-link"><img src="img/masa tenisi.png" /></a></div>
            <div><a href="https://182golden90.com/American%20Football" class="navigate-link"><img src="img/rugby.png" /></a></div>
            <div><a href="https://182golden90.com/boxing" class="navigate-link"><img src="img/boks-label.png" /></a></div>
          </div>
          <div class="center-line"></div>
          <div class="relation-button"><a href="https://182golden90.com"><img src="img/tum_oyunlar.png" /></a>
          </div>
        </div>
      </div>
    </div>
    <div class="section slots">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3 col-sm-6"><a href="https://182golden90.com/Casino/Slots"><img src="img/slots.png" /></a></div>
          <div class="col-md-3 col-sm-6"><a href="https://182golden90.com/live/Football"><img src="img/calnibahis.png" /></a></div>
          <div class="col-md-3 col-sm-6"><a href="https://182golden90.com/Casino/LiveCasino"><img src="img/canli casino.png" /></a></div>
          <div class="col-md-3 col-sm-6"><a href="https://sports.golden90.link/Football/International/UEFA%20Champions%20League"><img src="img/wc2022.png" /></a></div>
        </div>
      </div>
    </div>
    <div class="section section-cards">
      <div class="container-fluid">
        <div class="text-center pb-3 pt-2 sloter-header">
          <img src="img/slots-topic.png" />
        </div>
        <div class="">
          <div class="slider-cards">
            <a href="https://182golden90.com/Casino/slots/pragmaticplay/pragmaticplay/vs20sbxmas/Sweet%20Bonanza%20Xmas" class="card-item"><img src="img/sweetbonanza.png" /></a>
            <a href="https://182golden90.com/Casino/slots/pragmaticplay/pragmaticplay/vs20olympgate/Gates%20of%20Olympus" class="card-item"><img src="img/gates_of_olympus.png" /></a>
            <a href="https://182golden90.com/Casino/slots/pragmaticplay/pragmaticplay/vs20fruitsw/Sweet%20Bonanza" class="card-item"><img src="img/seetbonanza2.png" /></a>
            <a href="https://182golden90.com/Casino/slots/pragmaticplay/pragmaticplay/vs20cm/Sugar%20Rush" class="card-item"><img src="img/sugar_rush.png" /></a>
            <a href="https://182golden90.com/Casino/slots/pragmaticplay/pragmaticplay/vs12bbb/Bigger%20Bass%20Bonanza" class="card-item"><img src="img/biggerbass.png" /></a>
            <a href="https://182golden90.com/Casino/slots/pragmaticplay/pragmaticplay/vs20goldfever/Gems%20Bonanza" class="card-item"><img src="img/gemsbonanza.png" /></a>
            <a href="https://182golden90.com/Casino/slots/pragmaticplay/pragmaticplay/vs20sbxmas/Sweet%20Bonanza%20Xmas" class="card-item"><img src="img/sweetbonanza.png" /></a>
            <a href="https://182golden90.com/Casino/slots/pragmaticplay/pragmaticplay/vs20olympgate/Gates%20of%20Olympus" class="card-item"><img src="img/gates_of_olympus.png" /></a>
            <a href="https://182golden90.com/Casino/slots/pragmaticplay/pragmaticplay/vs20fruitsw/Sweet%20Bonanza" class="card-item"><img src="img/seetbonanza2.png" /></a>
            <a href="https://182golden90.com/Casino/slots/pragmaticplay/pragmaticplay/vs20cm/Sugar%20Rush" class="card-item"><img src="img/sugar_rush.png" /></a>
            <a href="https://182golden90.com/Casino/slots/pragmaticplay/pragmaticplay/vs12bbb/Bigger%20Bass%20Bonanza" class="card-item"><img src="img/biggerbass.png" /></a>
            <a href="https://182golden90.com/Casino/slots/pragmaticplay/pragmaticplay/vs20goldfever/Gems%20Bonanza" class="card-item"><img src="img/gemsbonanza.png" /></a>
          </div>
        </div>
      </div>
    </div>
    <div class="section roundcards pt-5">
      <div class="container-fluid pb-5">
        <div class="row">
          <div class="col w-20 col-sm-6 col-6  text-center"><a href="https://182golden90.com/Casino/Roulette"><img src="img/ROULETTE.png" /></a></div>
          <div class="col w-20 col-sm-6 col-6 text-center"><a href="https://182golden90.com/Casino/BlackJack"><img src="img/BLACJJACK.png" /></a></div>
          <div class="col w-20 col-sm-6 col-6 text-center"><a href="https://182golden90.com/VirtualSports"><img src="img/SANARSPOR.png" /></a></div>
          <div class="col w-20 col-sm-6 col-6 text-center"><a href="https://182golden90.com/Betzone"><img src="img/BETZONE.png" /></a></div>
          <div class="col w-20 offset-sm-3 col-sm-6 col-6 offset-3 text-center"><a href="https://182golden90.com/Promotions"><img src="img/PROMO.png" /></a></div>
        </div>
      </div>
    </div>
    <div class="logos container-fluid">
      <img src="img/logos.jpg" />
    </div>
    <div class="section footer py-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-2 col-md-2 col-sm-4 col-6">
            <strong>Hakkında</strong>
            <uL class="no-style">
              <li><a href="https://182golden90.com/page/About-Us">Hakkımızda</a></li>
              <li><a href="https://182golden90.com/page/Terms-And-Conditions">Şartlar ve Koşullar</a></li>
              <li><a href="https://182golden90.com/page/Contact">İletşime geçin</a></li>
              <li><a href="https://182golden90.com/page/Privacy-Policy">Gizlilik Politikası</a> </li>
              <li><a href="https://182golden90.com/page/Minors-Protection">Küçükleri koruma</a></li>
              <li><a href="https://182golden90.com/page/Gaming-Addiction">Oyun bağımlılığı</a></li>
              <li><a href="https://182golden90.com/page/Self-Exclusion">Hesap dondurma</a></li>
              <li><a href="https://182golden90.com/page/Dispute-Complaints-Policy">Dispute Complaints
                  Policy</a></li>
            </uL>
          </div>
          <div class="col-xl-2 col-md-2 col-sm-4 col-6">
            <strong>Kullanıcı</strong>
            <uL class="no-style">
              <li><a href="https://182golden90.com/register">Üye Ol</a></li>
              <li><a href="https://182golden90.com/login">Giriş</a></li>
              <li><a href="https://182golden90.com/ForgotPassword">Şifremi unuttum</a></li>
              <li><a href="https://182golden90.com/page/Bonus">Bonus</a> </li>
              <li><a href="https://182golden90.com/page/FAQ">FAQ</a></li>
            </uL>
          </div>
          <div class="col-xl-2 col-md-2 col-sm-4 col-6">
            <strong>Spor Bahisleri</strong>
            <uL class="no-style">
              <li><a href="https://182golden90.com/Football">Spor</a></li>
              <li><a href="https://182golden90.com/Live">Canlı</a></li>
              <li><a href="https://182golden90.com/Football">Futbol</a></li>
              <li><a href="https://182golden90.com/Basketball">Basketbol</a> </li>
              <li><a href="https://182golden90.com/Tennis">Tenis</a></li>
              <li><a href="https://182golden90.com/page/Betting-Rules">Bahis kuralları</a></li>
            </uL>
          </div>
          <div class="col-xl-2 col-md-2 col-sm-4 col-6">
            <strong>Casino</strong>
            <uL class="no-style">
              <li><a href="https://182golden90.com/Casino/Roulette">Rulet</a></li>
              <li><a href="https://182golden90.com/Casino/BlackJack">Blackjack</a></li>
              <li><a href="https://182golden90.com/Casino/Baccarat">Bakarat</a></li>
              <li><a href="https://182golden90.com/Casino/Slots">Slotlar</a> </li>
              <li><a href="https://182golden90.com/page/Casino-Rules">Casino kuralları</a></li>
            </uL>
          </div>
          <div class="col-xl-2 col-md-2 col-sm-4 col-6">
            <strong>Poker</strong>
            <uL class="no-style">
              <li><a href="https://182golden90.com/page/Poker-Rules">Poker kuralları</a></li>
              <li><a href="https://182golden90.com/">3D Poker indir</a></li>
              <li><a href="https://182golden90.com/page/Tournaments">Turnuvalar</a></li>
            </uL>
          </div>
          <div class="col-xl-2 col-md-2 col-sm-4 col-6">
            <strong>Şirket ortaklığı</strong>
            <uL class="no-style">
              <li><a href="https://182golden90.com/page/Partner">Ortak</a></li>
            </uL>
          </div>
        </div>
      </div>
    </div>
    <div class="section copyright py-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <img class="pr-3 mob-18" src="img/18.png" /> Kumar bağımlılık yapabilir. Sorumlu Oynayın.
          </div>
          <div class="col-md-6 text-right pt-4 mob-small-text">
            <a class="text-white" href="https://182golden90.com/page/Anti-Money-Laundering-Policy">Kara Para
              Aklamayı Önleme Politikası</a> | <a class="text-white" href="https://182golden90.com/page/Know-Your-Customer-Policy">Müşteri Politikanızı
              Bilin.</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery.slim.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="plugins/slick/slick.js"></script>
  <script type="text/javascript">
    $(function() {
      $('a[href]').each(function() {
        let url = $(this).attr('href');
        $(this).attr('href', url.replace('https://182golden90.com', 'https://sports.' + window.location.host).replace('www.', ''));
      })
    })
    $('.mob-mainslider').slick({
      arrows: false,
      dots: false,
      speed: 300,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000
    });

    $('.mainslider').slick({
      autoplay: true,
      autoplaySpeed: 2000
    });
    $('.navigate-slider').slick({
      dots: false,
      arrows: false,
      speed: 300,
      slidesToShow: 8,
      slidesToScroll: 1,
      responsive: [{
          breakpoint: 992,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 4,
            centerMode: true,
            centerPadding: '60px',
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 4,
            centerMode: true,
            centerPadding: '60px',
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: '60px',
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });

    $('.slider-cards').slick({
      dots: false,
      arrows: true,
      speed: 300,
      slidesToShow: 6,
      slidesToScroll: 1,
      responsive: [{
          breakpoint: 991,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: false,
            arrows: false,
            centerMode: true,
            centerPadding: '60px',
          }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: false,
            centerMode: true,
            centerPadding: '60px',
          }
        },
        {
          breakpoint: 479,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            centerMode: true,
            centerPadding: '60px',
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
  </script>
</body>

</html>
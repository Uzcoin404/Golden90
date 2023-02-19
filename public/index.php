<?php
require('src/components/db.php');

$db = new Database();
$lang = $_GET['lang'] ?? 'tr';

$posts = $db->getPosts($lang);
// $slides = $db->getSlides();
$languages = $db->getLanguages();
// echo "<br>";
// print_r($posts);
// echo "</br>";

?>

<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
  <title>Golden90</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/public/css/bootstrap.min.css">
  <link rel="stylesheet" href="/public/plugins/slick/slick.css">
  <link rel="stylesheet" href="/public/plugins/slick/slick-theme.css">
  <link rel="stylesheet" href="/public/css/site.css?v=<?= time() ?>">
</head>

<body>
  <div class="wrapper" id="overview">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-xl navbar-light">
        <a class="navbar-brand" href="<?= $posts['logo']['icon'] ?>">
          <img src="<?= $posts['logo']['icon'] ?>" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <?php foreach ($posts['nav_link'] as $nav_link) : ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= $nav_link['link'] ?>">
                  <img src="<?= $nav_link['icon'] ?>" />
                  <?= $nav_link['html'] ?>
                </a>
              </li>
            <?php endforeach ?>
          </ul>
          <div class="row nav__actions flex-nowrap mt-4 mt-xl-0">
            <div class="dropdown">
              <button class="btn language_btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                <img src="/public/img/flags/<?= $lang ?>.svg" alt="" class="">
                <span><?= $lang ?></span>
              </button>
              <div class="dropdown-menu language_dropdown_menu">
                <?php foreach ($languages as $i => $language) : if ($language['status']) : ?>
                    <a href="?lang=<?= $language['keyword'] ?>" class="dropdown-item">
                      <img src="<?= $language['icon'] ?>" alt="" class="flag__icon">
                      <?= $language['name'] ?>
                    </a>
                <?php endif;
                endforeach ?>
              </div>
            </div>
            <a class="btn nav__btn reg__btn text-center" href="<?= $posts['sign_up']['link'] ?>">
              <?= $posts['sign_up']['html'] ?>
            </a>
            <a href="<?= $posts['login']['link'] ?>" class="btn btn-secondary nav__btn"><?= $posts['login']['html'] ?></a>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <div class="section mainslider">
      <?php foreach ($posts['slides'] as $i => $slide) : ?>
        <div>
          <div class="slide" style="background-image: url('<?= $slide['icon'] ?>');" data-index="<?= $i ?>"></div>
        </div>
      <?php endforeach ?>
    </div>
    <div class="section mob-mainslider">
      <?php foreach ($posts['slides'] as $i => $slide) : ?>
        <div>
          <div class="slide" style="background-image: url('<?= $slide['icon2'] ?>');" data-index="<?= $i ?>"></div>
        </div>
      <?php endforeach ?>
    </div>
    <div class="section slider-footer">
      <div class="container-fluid">
        <div>
          <div class="navigate-slider">
            <?php foreach ($posts['sport'] as $sport) : ?>
              <div>
                <a href="<?= $sport['link'] ?>" class="navigate-link">
                  <img src="<?= $sport['icon'] ?>" alt="" />
                </a>
              </div>
            <?php endforeach ?>
          </div>
          <div class="center-line"></div>
          <a href="<?= $posts['lines_button']['link'] ?>" class="relation-button position-relative">
            <span><?= $posts['lines_button']['html'] ?></span>
            <img src="<?= $posts['lines_button']['icon'] ?>" />
          </a>
        </div>
      </div>
    </div>
    <div class="section slots">
      <div class="container-fluid">
        <div class="slots-slider">
          <?php foreach ($posts['cards_1'] as $card) : ?>
            <a href="<?= $card['link'] ?>" class="mb-4">
              <img src="<?= $card['icon'] ?>" />
            </a>
          <?php endforeach ?>
        </div>
      </div>
    </div>
    <div class="section section-cards">
      <div class="container-fluid">
        <div class="text-center pb-3 pt-2 sloter-header">
          <img src="/public/img/slots-topic.png" />
        </div>
        <div class="">
          <div class="slider-cards">
            <?php foreach ($posts['popular_slots'] as $card) : ?>
              <a href="<?= $card['link'] ?>" class="card-item"><img src="<?= $card['icon'] ?>" /></a>
            <?php endforeach ?>
          </div>
        </div>
      </div>
    </div>
    <div class="section roundcards pt-5">
      <div class="container-fluid pb-5">
        <div class="roundcards-slider">
          <?php foreach ($posts['cards_2'] as $card) : ?>
            <a href="<?= $card['link'] ?>"><img src="<?= $card['icon'] ?>" /></a>
          <?php endforeach ?>
        </div>
      </div>
    </div>
    <div class="logos container-fluid">
      <img src="<?= $posts['footer_logos']['icon'] ?>" alt="" />
    </div>
    <div class="section footer py-5">
      <div class="container-fluid">
        <div class="row">
          <?php foreach ($posts['footer'] as $footer_item) : ?>
            <?= var_dump($footer_item) ?>
          <?php endforeach ?> -->
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
          <div class="col-md-6 d-flex align-items-center">
            <img class="pr-3 mob-18" src="<?= $posts['18_img']['icon'] ?>" />
            <?= $posts['copyright_text1']['html'] ?>
          </div>
          <div class="col-md-6 text-right pt-4 mob-small-text">
            <a class="text-white" href="<?= $posts['copyright_text2']['link'] ?>"><?= $posts['copyright_text2']['html'] ?></a>
            | <a class="text-white" href="<?= $posts['copyright_text3']['link'] ?>"><?= $posts['copyright_text3']['html'] ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="/public/js/jquery.slim.min.js"></script>
  <script src="/public/js/bootstrap.bundle.min.js"></script>
  <script src="/public/plugins/slick/slick.js"></script>
  <script src="/public/js/script.js?time=<?= time() ?>"></script>
</body>

</html>
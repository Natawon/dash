<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TB7MV3X"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="navbar info-nav d-none d-lg-block">
  <div class="container">
    <li class="nav-item">
      <a class="nav-link" href="tel:02-412-8880"><i class="fas fa-phone pr-1"></i> 02-412-8880</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="tel:061-017-6063"><i class="fas fa-mobile pr-1"></i> 061-017-6063</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="tel:083-885-2289"><i class="fas fa-mobile pr-1"></i> 083-885-2289</a>
    </li>
    <li class="nav-item">
      <a class="nav-link boderrightt" href="mailto:info@frogdigital.co"><i class="fas fa-envelope pr-1"></i> info@frogdigital.co</a>
    </li>
    <ul class="navbar text-uppercase ml-auto pr-2 p-0">
      <li class="nav-item">
        <a class="nav-link face" href="https://www.facebook.com/FrogGenius/?ref=br_rs" target="_blank"><i class="fab fa-facebook-square"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link face" href="http://nav.cx/gOBlBBU" target="_blank"><i class="fab fa-line"></i></a>
      </li>
    </ul>
  </div>
</div>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark" id="mainNav">
  <div class="container">
    <!-- <a class="navbar-brand" href="/"><img src="assets/img/all/FrogGenius_logo_website.png" title="froggenius" alt="logosizee" class="logosizee"></a> -->
    <a class="navbar-brand" href="/"><img src="<?=constant("_BASE_DIR_LOGO").$configuration["logo"]?>" title="froggenius" alt="logosizee" class="logosizee"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav text-uppercase ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/#aboutus">ABOUT US</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/#services">SERVICES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/#portfolio">PORTFOLIO</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
            NEWS
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="/news">ข่าวสารทั้งหมด</a>
            <?php foreach ($news_groups as $rs_news_groups) {?>
              <a class="dropdown-item" href="/news/<?=$rs_news_groups['id']?>"><?=$rs_news_groups['title']?></a>
            <?php } ?>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/#freetrial"><?=$txtbtntrial1?></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
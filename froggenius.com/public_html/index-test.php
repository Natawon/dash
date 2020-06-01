<?php
exit();
include 'head.php';

$event_banners_today = event_banners_today();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?=$configuration['title']?></title>
    <meta property="og:title" content="<?=$configuration['title']?>"/>
    <meta property="og:url" content="https://www.froggenius.com/"/>
    <meta property="og:image" content="https://froggenius.com/assets/img/all/facebook_shared.png"/>
    <meta property="og:type" content="website"/>
    <meta property="og:description" content="<?=$configuration['meta_description']?>"/>
    <meta property="og:image:alt" content="e-learning business solution"/>

    <style type="text/css">
      @media only screen
      and (min-width: 768px)
      and (max-width: 1024px)
      and (orientation: landscape) {
        .parallaxindex {
          background-attachment: initial;
        }
      }
      @media only screen
      and (min-width: 1024px)
      and (max-width: 1366px)
       {
        .parallaxindex {
          background-attachment: initial;
        }
      }

      .tooltip {
        word-break: break-word;
      }
      .tooltip-inner {
        font-size: .8rem;
        max-width: 315px;
      }
    </style>
  </head>

  <body id="page-top">
    <?php include 'navbar.php'; ?>

    <?php /* if ($configuration["event_banner_status"] == 1) { ?>
      <div>
        <img src="<?=constant("_BASE_DIR_EVENT_BANNER").$configuration["event_banner"]?>" class="w-100" alt="">
      </div>
    <?php } */ ?>

    <?php if (!empty($event_banners_today)) { ?>
      <div>
        <img src="<?=constant("_BASE_DIR_EVENT_BANNERS_PICTURE").$event_banners_today["picture"]?>" class="w-100" alt="">
      </div>
    <?php } ?>

    <!-- Header -->
    <header class="masthead">
      <div class="container d-none d-lg-block">
        <div class="row">

          <div class="col-md-5">
            <div class="intro-text">
              <div class="bgtran">
                <div class="intro-lead-in"><h1 class="etxt etxtShadow">All-in-one solution for your online academy </h1> <h2 class="etxt2"><?=$txt1?></h2></div>
                <div class="intro-heading"><?=$txt3?> <br> <?=$txt4?></div>
                <a class="btn buttonmain2" href="#freetrial"><?=$txtbtntrial1?></a>
              </div>
            </div>
          </div>

          <div class="col-md-7">
            <div class="intro-text">
              <div class="bgtran2">
                <div id="playerOne"></div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </header>

    <!-- show for middle size -->
    <div class="container-fluid d-md-block d-lg-none text-center">
      <div class="col-md-12 bgmaincolor">
        <div class="intro-lead-in"><span class="headFont">All-in-one solution for your online academy</span><br><span class="subheadFont"><?=$txt1?></span></div>
      </div>
      <div>
        <div id="playerOne2"></div>
      </div>
      <div class="padbottom20">
        <div class="col-12 text-center">
          <p class="contexthead desheadFont"><?=$txt3?><br><?=$txt4?></p>
          <a class="btn buttonmain2" href="#freetrial"><?=$txtbtntrial1?></a>
        </div>
      </div>
    </div>

    <!-- sectionone -->
    <section id="aboutus">
      <div class="container text-center">
          <!-- Style Tooltip -->
          <h1 class="d-none d-md-block"><span class="text-primary"><?=$txtathena?></span> <span class="text-subprimary"><?=$txtelearning?></span>
            <button type="button" class="btn btn-link tooltip-whatsit p-0" data-toggle="tooltip" data-html="true" title="<?=$html_whats_lms?>">
              <i class="far fa-question-circle"></i>
            </button>
          </h1>
          <h1 class="d-block d-md-none"><span class="text-primary"><?=$txtathena?></span><br><span class="text-subprimary"><?=$txtelearning?></span>
            <button type="button" class="btn btn-link tooltip-whatsit p-0" data-toggle="tooltip" data-html="true" title="<?=$html_whats_lms?>">
              <i class="far fa-question-circle"></i>
            </button>
          </h1>
          <!-- Style Tooltip -->

          <?php /* ?>
          <!-- Style Text -->
          <h1 class="d-none d-md-block"><span class="text-primary"><?=$txtathena0?></span> <span class="text-subprimary"><?=$txtelearning0?></span></h1>
          <h1 class="d-block d-md-none"><span class="text-primary"><?=$txtathena0?></span><br><span class="text-subprimary"><?=$txtelearning0?></span></h1>
          <p class="d-none d-lg-block fontsize13em"><?=$txt0_1?></p>
          <p class="d-block d-lg-none"><?=$txt0_2?></p>
          <h1 class="d-none d-md-block pt-4"><span class="text-primary"><?=$txtathena?></span> <span class="text-subprimary"><?=$txtelearning?></span></h1>
          <h1 class="d-block d-md-none pt-4"><span class="text-primary"><?=$txtathena?></span><br><span class="text-subprimary"><?=$txtelearning?></span></h1>
          <!-- Style Text -->
          <?php */ ?>

          <p class="d-none d-lg-block fontsize13em"><?=$txt1_1?></p>
          <p class="d-block d-lg-none"><?=$txt1_1?></p>
          <div class="d-none d-lg-block">
          <a class="btn buttonmain" href="#freetrial"><?=$txtbtntrial1?></a>
        </div>
      </div>
    </section>

     <!-- sectiontwo -->
    <section id="services"> 

      <div class="container">

        <div class="row">
          <div class="col-lg-12 text-center txtheadspace">
            <h2 class="section-heading d-none d-lg-block"><span class="text-primary"><?=$txt3_1?></span> <span class="text-subprimary"><?=$txt3_2?></span></h2>
            <h2 class="section-heading d-block d-lg-none"><span class="text-primary"><?=$txt3_1?></span><br><span class="text-subprimary"><?=$txt3_2?></span></h2>
          </div>
        </div>

        <div class="d-none d-md-block moveanimated animated">
          <div class="row padbottom20">
            <div class="col-2"><div class="textcenterr"><img src="assets/img/all/icon_set1/set1_1@2x.png" class="rounded-main"></div></div>
            <div class="col-4 margincenter"><?=$txtcontent3_1?></div>
            <div class="col-2"><div class="textcenterr"><img src="assets/img/all/icon_set1/set1_4@2x.png" class="rounded-main" ></div></div>
            <div class="col-4 margincenter"><?=$txtcontent3_2?></div>
          </div>
          <div class="row padbottom20">
            <div class="col-2"><div class="textcenterr"><img src="assets/img/all/icon_set1/set1_3@2x.png" class="rounded-main" ></div></div>
            <div class="col-4 margincenter"><?=$txtcontent3_3?></div>
            <div class="col-2"><div class="textcenterr"><img src="assets/img/all/icon_set1/set1_2@2x.png" class="rounded-main" ></div></div>
            <div class="col-4 margincenter"><?=$txtcontent3_4?></div>
          </div>
          <div class="row padbottom20">
            <div class="col-2 margincenter"><div class="textcenterr"><img src="assets/img/all/icon_set1/set1_5@2x.png" class="rounded-main" ></div></div>
            <div class="col-4 margincenter"><?=$txtcontent3_5?></div>
            <div class="col-2 margincenter"><div class="textcenterr"><img src="assets/img/all/icon_set1/set1_6@2x.png" class="rounded-main" > </div></div>
            <div class="col-4 margincenter"><?=$txtcontent3_6?></div>
          </div>
        </div>

        <div class="d-block d-md-none">
          <div class="row">
            <div class="col-3 padbottom20 moveanimated animated"><img src="assets/img/all/icon_set1/set1_1@2x.png" class="rounded-main2" ></div>
            <p class="col-9 padbottom20 margincenter moveanimated animated"><?=$txtcontent3_1?></p>
            <div class="col-3 padbottom20 moveanimated animated"><img src="assets/img/all/icon_set1/set1_4@2x.png" class="rounded-main2" ></div>
            <p class="col-9 padbottom20 margincenter moveanimated animated"><?=$txtcontent3_2?></p>
            <div class="col-3 padbottom20 moveanimated animated"><img src="assets/img/all/icon_set1/set1_3@2x.png" class="rounded-main2" ></div>
            <p class="col-9 padbottom20 margincenter moveanimated animated"><?=$txtcontent3_3?></p>
            <div class="col-3 padbottom20 moveanimated animated"><img src="assets/img/all/icon_set1/set1_2@2x.png" class="rounded-main2" ></div>
            <p class="col-9 padbottom20 margincenter moveanimated animated"><?=$txtcontent3_4?></p>
            <div class="col-3 padbottom20 moveanimated animated"><img src="assets/img/all/icon_set1/set1_5@2x.png" class="rounded-main2" ></div>
            <p class="col-9 padbottom20 margincenter moveanimated animated"><?=$txtcontent3_5?></p>
            <div class="col-3 padbottom20 moveanimated animated margincenter"><img src="assets/img/all/icon_set1/set1_6@2x.png" class="rounded-main2" ></div>
            <p class="col-9 padbottom20 margincenter moveanimated animated"><?=$txtcontent3_6?></p>
          </div>
        </div>

      </div>

      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center txtheadspace">
            <h2 class="fontsize15em d-none d-lg-block"><p><?=$txt3_3?> <?=$txt3_4?></p></h2>
            <h2 class="fontsize15em d-block d-lg-none"><p><?=$txt3_3?> <?=$txt3_4?></p></h2>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-12 moveanimated animated padding0">
            <img src="assets/img/all/image_section2_analytics_and_graph.png" class="mxwidth100 padding40px"> 
          </div>
          <div class="col-md-4 moveanimated animated">
            <img src="assets/img/all/icon_set2/set2_1@2x.png" class="rounded-circle" > 
            <p class="service-content"><?=$txtcontent3_12?></p>
          </div>
          <div class="col-md-4 moveanimated animated">
            <img src="assets/img/all/icon_set2/set2_2@2x.png" class="rounded-circle"> 
            <p class="service-content"><?=$txtcontent3_13?></p>
          </div>
          <div class="col-md-4 moveanimated animated">
            <img src="assets/img/all/icon_set2/set2_3@2x.png" class="rounded-circle"> 
            <p class="service-content"><?=$txtcontent3_14?></p>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center txtheadspace padding0">
            <h2 class="section-heading text-uppercase d-none d-lg-block"><span class="text-primary"><?=$txt3_5?></span> <span class="text-subprimary"><?=$txt3_6?></span></h2>
            <h2 class="section-heading text-uppercase d-block d-lg-none"><span class="text-primary"><?=$txt3_5?></span><br><span class="text-subprimary"><?=$txt3_6?></span></h2>
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-md-6 d-none d-lg-block">
            <img src="assets/img/all/image2-1.jpg">
          </div>
          <div class="col-12 col-md-6 d-none d-lg-block moveanimated animated">
            <div class="row">
              <div class="col-3"><img src="assets/img/all/icon_set3/set3_1@2x.png" class="rounded-main2"></div>
              <div class="col-9 margincenter"><?=$txtcontent3_7?></div>
              <div class="col-3"><img src="assets/img/all/icon_set3/set3_2@2x.png" class="rounded-main2"></div>
              <div class="col-9 margincenter"><?=$txtcontent3_8?></div>
              <div class="col-3"><img src="assets/img/all/icon_set3/set3_3@2x.png" class="rounded-main2"></div>
              <div class="col-9 margincenter"><?=$txtcontent3_9?></div>
              <div class="col-3"><img src="assets/img/all/icon_set3/set3_4@2x.png" class="rounded-main2"></div>
              <div class="col-9 margincenter"><?=$txtcontent3_10?></div>
              <div class="col-3"><img src="assets/img/all/icon_set3/set3_5@2x.png" class="rounded-main2"></div>
              <div class="col-9 margincenter"><?=$txtcontent3_11?></div>
            </div>
          </div>
        </div>

        <div class="col-12 moveanimated animated d-block d-lg-none padding0 padding60px">
          <div class="row">
            <div class="col-3"><img src="assets/img/all/icon_set3/set3_1@2x.png" class="rounded-main2"></div>
            <div class="col-9 margincenter"><?=$txtcontent3_7?></div>
            <div class="col-3"><img src="assets/img/all/icon_set3/set3_2@2x.png" class="rounded-main2"></div>
            <div class="col-9 margincenter"><?=$txtcontent3_8?></div>
            <div class="col-3"><img src="assets/img/all/icon_set3/set3_3@2x.png" class="rounded-main2"></div>
            <div class="col-9 margincenter"><?=$txtcontent3_9?></div>
            <div class="col-3"><img src="assets/img/all/icon_set3/set3_4@2x.png" class="rounded-main2"></div>
            <div class="col-9 margincenter"><?=$txtcontent3_10?></div>
            <div class="col-3"><img src="assets/img/all/icon_set3/set3_5@2x.png" class="rounded-main2"></div>
            <div class="col-9 margincenter"><?=$txtcontent3_11?></div>
          </div>
        </div> 
      </div>
    </section>

    <section id="portfolio">
      <div class="container text-center">
          <div class="col-lg-12 text-center txtheadspace padding0">
            <h1 class="d-none d-md-block"><span class="text-subprimary"><?=$txt5?></span></h1>
            <h1 class="d-block d-md-none"><span class="text-subprimary"><?=$txt5?></span></h1>
          </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <figure class="figure">
              <img src="assets/img/all/portfolio/elearning.set1.jpg" class="figure-img img-fluid rounded" alt="SET e-Learning">
              <figcaption class="figure-caption text-center"><p>SET e-Learning</figcaption>
            </figure>
          </div>
          <div class="col-md-4">
            <figure class="figure">
              <img src="assets/img/all/portfolio/winnerestate.jpg" class="figure-img img-fluid rounded" alt="Winner Estate">
              <figcaption class="figure-caption text-center"><p>Winner Estate</p></figcaption>
            </figure>
          </div>
          <div class="col-md-4">
            <figure class="figure">
              <img src="assets/img/all/portfolio/niaacademy.jpg" class="figure-img img-fluid rounded" alt="NIA Academy">
              <figcaption class="figure-caption text-center"><p>NIA Academy</p></figcaption>
            </figure>
          </div>

          <div class="col-md-4">
            <figure class="figure">
              <img src="assets/img/all/portfolio/ntc.jpg" class="figure-img img-fluid rounded" alt="NTC">
              <figcaption class="figure-caption text-center"><p>NTC</p></figcaption>
            </figure>
          </div>

          <div class="col-md-4">
            <figure class="figure">
              <img src="assets/img/all/portfolio/pravinia.jpg" class="figure-img img-fluid rounded" alt="Pravinia">
              <figcaption class="figure-caption text-center"><p>Pravinia</p></figcaption>
            </figure>
          </div>

          <div class="col-md-4">
            <figure class="figure">
              <img src="assets/img/all/portfolio/beyondtraining.jpg" class="figure-img img-fluid rounded" alt="Beyond Training">
              <figcaption class="figure-caption text-center"><p>Beyond Training</p></figcaption>
            </figure>
          </div>

          <div class="col-md-4">
            <figure class="figure">
              <img src="assets/img/all/portfolio/takeda.jpg" class="figure-img img-fluid rounded" alt="Takeda Academy">
              <figcaption class="figure-caption text-center"><p>Takeda Academy</p></figcaption>
            </figure>
          </div>

          <div class="col-md-4">
            <figure class="figure">
              <img src="assets/img/all/portfolio/fvsgroup1.jpg" class="figure-img img-fluid rounded" alt="FVS Group">
              <figcaption class="figure-caption text-center"><p>FVS Group</p></figcaption>
            </figure>
          </div>

          <div class="col-md-4">
            <figure class="figure">
              <img src="assets/img/all/portfolio/startupthailandacademy.jpg" class="figure-img img-fluid rounded" alt="Startup Thailand Academy">
              <figcaption class="figure-caption text-center"><p>Startup Thailand Academy</p></figcaption>
            </figure>
          </div>

          <div class="col-md-4">
            <figure class="figure">
              <img src="assets/img/all/portfolio/live.thaiquest1.jpg" class="figure-img img-fluid rounded" alt="Thai Quest">
              <figcaption class="figure-caption text-center"><p>Thai Quest</p></figcaption>
            </figure>
          </div>

          <div class="col-md-4">
            <figure class="figure">
              <img src="assets/img/all/portfolio/leadera.co1.jpg" class="figure-img img-fluid rounded" alt="LeaderA">
              <figcaption class="figure-caption text-center"><p>LeaderA</p></figcaption>
            </figure>
          </div>

          <div class="col-md-4">
            <figure class="figure">
              <img src="assets/img/all/portfolio/setlive1.jpg" class="figure-img img-fluid rounded" alt="SET Live">
              <figcaption class="figure-caption text-center"><p>SET Live</p></figcaption>
            </figure>
          </div>
          
        </div>
      </div>
      </div>
    </section>

    <section id="sectionone2">

      <div class="container d-none d-lg-block">
        <div class="row">
          <h2 class="col-12 col-md-5 margincenter">
            <span class="text-primary"><?=$txt1_2?></span><br>
            <span class="text-subprimary"><?=$txt1_3?></span>
          </h2>
          <div class="col-12 col-md-7 mxwidth100 hrvertical">
            <div class="row">
              <div class="col-4"><a href="https://elearning.set.or.th/" target="_bank"><img src="assets/img/all/Clientlogo/set.jpg" class="mxwidth100" title="set e-learning" alt="set e-learning"></a></div>
              <div class="col-4"><a href="#" target="_bank"><img src="assets/img/all/Clientlogo/startup.jpg" class="mxwidth100" title="staruupthailand" alt="staruupthailand"></a></div>
              <div class="col-4"><a href="#" target="_bank"><img src="assets/img/all/Clientlogo/nia.jpg" class="mxwidth100" title="niaacdemy" alt="niaacdemy"></a></div>
              <div class="col-4"><a href="http://www.winnerestate.net/" target="_bank"><img src="assets/img/all/Clientlogo/winner.jpg" class="mxwidth100" title="winner" alt="winner"></a></div>
              <div class="col-4"><a href="https://www.pravinia.com/" target="_bank"><img src="assets/img/all/Clientlogo/pravinia.jpg" class="mxwidth100" title="pravinia" alt="pravinia"></a></div>
              <div class="col-4"><a href="#" target="_bank"><img src="assets/img/all/Clientlogo/ntc.jpg" class="mxwidth100" title="ntc" alt="ntc"></a></div>
              <div class="col-4"><a href="#" target="_bank"><img src="assets/img/all/Clientlogo/leadera.jpg" class="mxwidth100" title="leadera" alt="leadera"></a></div>
              <div class="col-4"><a href="http://www.fvsgroup.net/" target="_bank"><img src="assets/img/all/Clientlogo/fvs.jpg" class="mxwidth100" title="fvs" alt="fvs"></a></div>
              <div class="col-4"><a href="http://www.takedaacademy.com/" target="_bank"><img src="assets/img/all/Clientlogo/takeda.jpg" class="mxwidth100" title="takeda" alt="takeda"></a></div>
              <div class="col-4"><a href="#" target="_bank"><img src="assets/img/all/Clientlogo/thaiquest.jpg" class="mxwidth100" title="thaiquest" alt="thaiquest"></a></div>
              <div class="col-4"><a href="#" target="_bank"><img src="assets/img/all/Clientlogo/biogenetech.jpg" class="mxwidth100" title="biogenetech" alt="biogenetech"></a></div>
              <div class="col-4"><a href="#" target="_bank"><img src="assets/img/all/Clientlogo/ditp.jpg" class="mxwidth100" title="ditp" alt="ditp"></a></div>
              <div class="col-4"><a href="http://www.astellasvirtualevent.com" target="_bank"><img src="assets/img/all/Clientlogo/astellas.jpg" class="mxwidth100" title="astellas" alt="astellas"></a></div>
              <div class="col-4"><a href="#" target="_bank"><img src="assets/img/all/Clientlogo/thaiunion.jpg" class="mxwidth100" title="thaiunion" alt="thaiunion"></a></div>
              <div class="col-4"><a href="http://techsauce.liveloom.com/" target="_bank"><img src="assets/img/all/Clientlogo/techsauce.jpg" class="mxwidth100" title="techsauce" alt="techsauce"></a></div>
              <div class="col-4"><a href="#" target="_bank"><img src="assets/img/all/Clientlogo/beyondtraining.jpg" class="mxwidth100" title="beyondtraining" alt="beyondtraining"></a></div>
              <div class="col-4"><a href="https://www.pim.ac.th/th" target="_bank"><img src="assets/img/all/Clientlogo/pim.jpg" class="mxwidth100" title="pim" alt="pim"></a></div>
              <div class="col-4"><a href="https://www.viriyah.co.th/th/" target="_bank"><img src="assets/img/all/Clientlogo/viriyah.jpg" class="mxwidth100" title="viriyah" alt="viriyah"></a></div>
              
            </div>
          </div>
        </div>
      </div>

      <div class="container d-block d-lg-none">
        <div class="row">
          <h2 class="col-12 margincenter h2font">
            <span class="text-primary"><?=$txt1_2?></span><br>
            <span class="text-subprimary"><?=$txt1_3?></span>
          </h2>
          <div class="col-12">
            <hr class="midclient">
          </div>
          <div class="col-12">
            <div class="row">
              <div class="col-4"><a href="https://elearning.set.or.th/" target="_bank"><img src="assets/img/all/Clientlogo/set.jpg" class="mxwidth100" title="set e-learning" alt="set e-learning"></a></div>
              <div class="col-4"><a href="#" target="_bank"><img src="assets/img/all/Clientlogo/startup.jpg" class="mxwidth100" title="staruupthailand" alt="staruupthailand"></a></div>
              <div class="col-4"><a href="#" target="_bank"><img src="assets/img/all/Clientlogo/nia.jpg" class="mxwidth100" title="niaacdemy" alt="niaacdemy"></a></div>
              <div class="col-4"><a href="http://www.winnerestate.net/" target="_bank"><img src="assets/img/all/Clientlogo/winner.jpg" class="mxwidth100" title="winner" alt="winner"></a></div>
              <div class="col-4"><a href="https://www.pravinia.com/" target="_bank"><img src="assets/img/all/Clientlogo/pravinia.jpg" class="mxwidth100" title="pravinia" alt="pravinia"></a></div>
              <div class="col-4"><a href="#" target="_bank"><img src="assets/img/all/Clientlogo/ntc.jpg" class="mxwidth100" title="ntc" alt="ntc"></a></div>
              <div class="col-4"><a href="#" target="_bank"><img src="assets/img/all/Clientlogo/leadera.jpg" class="mxwidth100" title="leadera" alt="leadera"></a></div>
              <div class="col-4"><a href="http://www.fvsgroup.net/" target="_bank"><img src="assets/img/all/Clientlogo/fvs.jpg" class="mxwidth100" title="fvs" alt="fvs"></a></div>
              <div class="col-4"><a href="http://www.takedaacademy.com/" target="_bank"><img src="assets/img/all/Clientlogo/takeda.jpg" class="mxwidth100" title="takeda" alt="takeda"></a></div>
              <div class="col-4"><a href="#" target="_bank"><img src="assets/img/all/Clientlogo/thaiquest.jpg" class="mxwidth100" title="thaiquest" alt="thaiquest"></a></div>
              <div class="col-4"><a href="#" target="_bank"><img src="assets/img/all/Clientlogo/biogenetech.jpg" class="mxwidth100" title="biogenetech" alt="biogenetech"></a></div>
              <div class="col-4"><a href="#" target="_bank"><img src="assets/img/all/Clientlogo/ditp.jpg" class="mxwidth100" title="ditp" alt="ditp"></a></div>
              <div class="col-4"><a href="http://www.astellasvirtualevent.com" target="_bank"><img src="assets/img/all/Clientlogo/astellas.jpg" class="mxwidth100" title="astellas" alt="astellas"></a></div>
              <div class="col-4"><a href="#" target="_bank"><img src="assets/img/all/Clientlogo/thaiunion.jpg" class="mxwidth100" title="thaiunion" alt="thaiunion"></a></div>
              <div class="col-4"><a href="http://techsauce.liveloom.com/" target="_bank"><img src="assets/img/all/Clientlogo/techsauce.jpg" class="mxwidth100" title="techsauce" alt="techsauce"></a></div>
              <div class="col-4"><a href="#" target="_bank"><img src="assets/img/all/Clientlogo/beyondtraining.jpg" class="mxwidth100" title="beyondtraining" alt="beyondtraining"></a></div>
              <div class="col-4"><a href="https://www.pim.ac.th/th" target="_bank"><img src="assets/img/all/Clientlogo/pim.jpg" class="mxwidth100" title="pim" alt="pim"></a></div>
              <div class="col-4"><a href="https://www.viriyah.co.th/th/" target="_bank"><img src="assets/img/all/Clientlogo/viriyah.jpg" class="mxwidth100" title="viriyah" alt="viriyah"></a></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- sectiontwo -->
    <div class="d-none d-lg-block">
      <section class="parallaxindex" id="sectiontwo"></section>
    </div>

    <div class="d-block d-lg-none parallaxindexsmsize"></div>

    <div class="container"><hr></div>

    <section id="box-news" class="well well-sm">
      <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center txtheadspace padding0">
              <h2 class="section-heading text-uppercase"><span class="text-subprimary">ข่าวสารต่างๆ</span></h2>
            </div>
        </div>
        <div class="row">
          <?php foreach ($newsmain['data'] as $rs_newsmain) {?>
            <div class="col-md-4">
              <article class="thumbnail thumbnail-4 section-border well slow-hover">
                <div class="image-slow-wrapper">
                  <a href="/news/detail/<?=$rs_newsmain['id']?>/<?=$oFunc->get_slug($rs_newsmain['title']);?>">
                    <img class="" alt="<?=$rs_newsmain['title']?>" src="data-file/news/thumbnail/<?=$rs_newsmain['thumbnail']?>">
                  </a>
                </div>
                <div class="caption">
                  <h4 class=""><a href="/news/detail/<?=$rs_newsmain['id']?>/<?=$oFunc->get_slug($rs_newsmain['title']);?>"><?=$rs_newsmain['title']?></a></h4>
                  <p class="text-dark-variant-2"><?=$rs_newsmain['subject']?></p>
                  <div class="blog-info">
                    <div class="pull-left">
                        <time datetime="" class="meta datetime"><i class="fas fa-calendar-alt"></i> <?=$oFunc->genDate(strtotime($rs_newsmain['create_datetime']));?></time>
                    </div>
                    <a class="btn btn-frog btn-sm" href="/news/detail/<?=$rs_newsmain['id']?>/<?=$oFunc->get_slug($rs_newsmain['title']);?>">อ่านเพิ่มเติม <i class="fa fa-angle-double-right"></i></a>
                  </div>
                </div>
              </article>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>

    <!-- sectionfour -->
    <section id="sectionfour" class="d-none d-md-block">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading"><span class="text-primary"><?=$txt4_1?></span></h2>
            <h3 class="section-subheading"><span class="whitee"><?=$txtcontent4_1?><br><br><?=$txtcontent4_2?><br><br><?=$txtcontent4_3?></span></h3>
            <a class="btn buttonmain" href="#freetrial"><?=$txtbtntrial1?></a>
            <br><br>
          </div>
        </div>
      </div>
    </section>

    <div class="container-fluid d-block d-md-none text-center sectionfourclssm" >
      <div class="col-md-12" >
        <h2><?=$txt4_1?></h2>
        <p><?=$txtcontent4_1?> <?=$txtcontent4_2?> <?=$txtcontent4_3?></p>
        <div class="">
            <a class="btn buttonmain2 w-100" href="#freetrial"><?=$txtbtntrial1?></a>
        </div>
      </div>
    </div>

    <iframe name="hiddenFrame" width="0" height="0" border="0" style="display: none;"></iframe>

    <!-- freetrial -->
    <section id="freetrial">
      <div class="container text-center">
        <div class="row">
          <div class="col-12">
            <h2 class="section-heading"><span class="text-primary">ติดต่อเรา</span> <span class="text-subprimary">เพื่อทดลองใช้</span></h2>
          </div>
          <div class="col-md-12 pl-lg-5 pr-lg-5">
            <div class="col-12 pt-4 pb-4 card pl-lg-5 pr-lg-5">
              <h3 class="section-subheading"><span class="text-subprimary">แบบฟอร์มการให้บริการ</span></h3>
              <form id="sendmaill">
                <div class="form-group">
                  <input type="text" class="form-control" id="name" name="name" placeholder="*ชื่อ-นามสกุล" required>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" id="email" name="email" placeholder="*อีเมล์" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="tel" name="tel" placeholder="*เบอร์ติดต่อ" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="company" name="company" placeholder="URL เว็บไซต์ของลูกค้าหรือบริษัท">
                </div>
                <div class="form-group">
                  <textarea class="form-control" id="remark" name="remark" placeholder="รายละเอียดอื่นๆ"></textarea>
                </div>
                <div class="row">
                  <div class="col-md-8 mx-auto">
                    <button class="buttonmain2 w-100" type="submit" name="send" id="submitmail">Request Demo</button>
                  </div>
                </div>
              </form> 
            </div>
          </div>
          <div class="col-12 padding20px" >
            <hr class="whitehr">
            <div class="d-none d-md-block">
              <div class="row">
                <div class="col-6"><img src="assets/img/all/icon_footer/phone@2x.png" class="iconcontact"><span class="contacrtxt"><a href="tel:<?=$numberphone?>"><?=$numberphone?></a> / <a href="tel:<?=$numberphone2?>"><?=$numberphone2?></a> / <a href="tel:<?=$numberphone3?>"><?=$numberphone3?></a></span></div>
                <div class="col-6"><img src="assets/img/all/icon_footer/email@2x.png" class="iconcontact"><span class="contacrtxt"><a href="mailto:<?=$txtmail?><?=$txtmail2?>"><span class="prr2"><?=$txtmail?></span><?=$txtmail2?></a></span></div>
              </div>
            </div>
            <div class="row d-block d-md-none">
              <div class="col-12 alignleft"><img src="assets/img/all/icon_footer/phone@2x.png" class="iconcontact"><span class="contacrtxt"><a href="tel:<?=$numberphone?>"><?=$numberphone?></a> / <a href="tel:<?=$numberphone2?>"><?=$numberphone2?></a> / <a href="tel:<?=$numberphone3?>"><?=$numberphone3?></a></span></div>
              <div class="col-12 alignleft"><img src="assets/img/all/icon_footer/email@2x.png" class="iconcontact"><span class="contacrtxt"><a href="mailto:<?=$txtmail?><?=$txtmail2?>"><span class="prr2"><?=$txtmail?></span><?=$txtmail2?></a></span></div>
              <div class="col-12 alignleft height40">
                <a href="https://www.facebook.com/FrogGenius/?ref=br_rs" target="_blank">
                <i class="fab fa-facebook-square fff"></i>
                <span class="contacrtxt textfff">FrogGenius</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml: true,
          version: 'v5.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Your customer chat code -->
    <div class="fb-customerchat" attribution=setup_tool page_id="928397977550815" theme_color="#57a7f0" logged_in_greeting="สวัสดีค่ะ อยากให้เราช่วยเหลืออะไรไหมคะ" logged_out_greeting="สวัสดี! ให้เราช่วยอะไรได้บ้าง"></div>

  <?php include 'footer.php';?>

  <script src="/bower_components/jwplayer-7.8.2/jwplayer.js"></script>
  <script>jwplayer.key="ysQTVfHC5iQ8flS72k460WTgxEPDzPg90dTu2NzjVT0=";</script>

  <script>

    var playerOne = jwplayer("playerOne");
      playerOne.setup({
      "playlist": [
        {
          "file": "https://www.youtube.com/watch?v=jC1ZDnN42q0",
          "title": "FrogGenius",
          "image": "https://froggenius.com/assets/img/all/thumb.jpg"
        },
      ],
      aspectratio: "16:9",
      width: "100%",
      autostart: "true"
    });

    var playerOne2 = jwplayer("playerOne2");
      playerOne2.setup({
      "playlist": [
        {
          "file": "https://www.youtube.com/watch?v=jC1ZDnN42q0",
          "title": "FrogGenius",
          "image": "https://froggenius.com/assets/img/all/thumbp.jpg"
        },
      ],
      aspectratio: "16:9",
      width: "100%",
    });

    playerOne.on('play', function() {
      playerOne2.pause(true);
    });

    playerOne2.on('play', function() {
      playerOne.pause(true);
    });

    setTimeout(() => {
      $('.jw-icon.jw-icon-display.jw-button-color.jw-reset').addClass('d-none');
      $('.jw-display-icon-container.jw-background-color.jw-reset').addClass('d-none');
    }, 1500);
    
  </script>



  </body>
</html>
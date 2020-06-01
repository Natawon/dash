<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'head.php';?>
        <title><?=$configuration['title']?></title>
        <meta property="og:title" content="<?=$configuration['title']?>"/>
        <meta property="og:url" content="https://www.froggenius.com/"/>
        <meta property="og:image" content="https://froggenius.com/assets/img/all/facebook_shared.png"/>
        <meta property="og:type" content="website"/>
        <meta property="og:description" content="<?=$configuration['meta_description']?>"/>
        <meta property="og:image:alt" content="e-learning business solution"/>
    
    </head>

    <body id="page-top">
        <?php include 'navbar.php'; ?>
        <div class="fornew"></div>
        <section id="box-news" class="well well-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                        <div class="mt-5">
                            <img src="assets/img/all/thankyou.png" class="img-fluid" alt="Thank you for your interest in our product.">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="text-center txtheadspace padding0">
                            <h2 class="section-heading text-uppercase d-none d-lg-block"><span class="text-primary">ขอขอบพระคุณ</span> <span class="text-subprimary">ที่ท่านให้ความสนใจในบริการของเรา</span></h2>
                            <h2 class="section-heading text-uppercase d-block d-lg-none"><span class="text-primary">ขอขอบพระคุณ</span> <span class="text-subprimary">ที่ท่านให้ความสนใจในบริการของเรา</span></h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mt-4 text-center">
                            <a href="/">กลับสู่หน้าแรก</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'footer.php'; ?>
    </body>
</html>
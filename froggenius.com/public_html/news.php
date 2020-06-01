<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            include 'head.php';
            $_title = 'ข่าวสาร - FrogGenius';
        ?>
        <title><?=$_title?></title>
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
                    <?php foreach ($news['data'] as $rs_news) {?>
                        <div class="col-md-6 col-lg-4">
                            <article class="thumbnail thumbnail-4 section-border well slow-hover">
                                <div class="image-slow-wrapper">
                                    <a href="/news/detail/<?=$rs_news['id']?>/<?=$oFunc->get_slug($rs_news['title']);?>">
                                        <img class="" alt="<?=$rs_news['title']?>" src="data-file/news/thumbnail/<?=$rs_news['thumbnail']?>">
                                    </a>
                                </div>
                                <div class="caption">
                                    <h4 class=""><a href="/news/detail/<?=$rs_news['id']?>/<?=$oFunc->get_slug($rs_news['title']);?>"><?=$rs_news['title']?></a></h4>
                                    <p class="text-dark-variant-2"><?=$rs_news['subject']?></p>
                                    <div class="blog-info">
                                        <div class="pull-left">
                                            <time datetime="" class="meta datetime"><i class="fas fa-calendar-alt"></i> <?=$oFunc->genDate(strtotime($rs_news['create_datetime']));?></time>
                                        </div>
                                        <a class="btn btn-frog btn-sm" href="/news/detail/<?=$rs_news['id']?>/<?=$oFunc->get_slug($rs_news['title']);?>">อ่านเพิ่มเติม <i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <?php include 'footer.php'; ?>
    </body>
</html>
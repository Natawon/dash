<!DOCTYPE html>
<html lang="en">
    <head>
        <?php 
            include 'head.php'; 
            if ($newsid['status'] == 0) {
            	header('Location: /news');
            }
            $news_groups_id = news_groups_id($newsid['news_groups_id']);
            $_title = $newsid['title']." - FrogGenius";
        ?>
        <title><?=$_title?></title>
        <meta property="og:title" content="<?=$newsid['title']?>"/>
        <meta property="og:url" content="https://www.froggenius.com/news/detail/<?=$newsid['id']?>"/>
        <meta property="og:image" content="https://froggenius.com/data-file/news/thumbnail/<?=$newsid['thumbnail']?>"/>
        <meta property="og:type" content="website"/>
        <meta property="og:description" content="<?=$newsid['subject']?>"/>
        <meta property="og:image:alt" content="e-learning business solution"/> 
        <link href="https://fonts.googleapis.com/css?family=Trirong:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    </head>

    <body id="page-top">

        <?php include 'navbar.php'; ?>
        <link href="assets/css/newsdetail.css" rel="stylesheet">
        <div class="pt-2 divtop"></div>

        <div class="container pt-5">

            <ul class="nav pb-5">
                <li class="nav-item">
                    <a class="basethumb" href="/">หน้าแรก</a>
                </li>
                <li class="nav-item"> 
                    <div class="basethumb disabled">/</div>
                </li>
                <li class="nav-item">
                    <?php if (empty($newsid['news_groups_id'])) { ?>
                        <a class="basethumb" href="news">ข่าวสารทั้งหมด</a>
                    <?php } else { ?>
                        <a class="basethumb" href="news/<?=$newsid['news_groups_id']?>"><?=$news_groups_id['title']?></a>
                    <?php } ?>
                </li>
                <li class="nav-item">
                    <div class="basethumb disabled">/</div>
                </li>
                <li class="nav-item">
                    <a class="basethumb disabled basethumb"><?=$newsid['title']?></a>
                </li>
            </ul>

            <h1 class="titletext"><?=$newsid['title']?></h1>

            <div class="blog-info pt-3">
                <div class="pull-md-left">
                    <time class="meta"><i class="far fa-calendar-alt"></i> <?=$oFunc->genDate(strtotime($newsid['create_datetime']));?></time>
                    <?php
                        if (!empty($oFunc->convertToArray($newsid['tag']))) {
                    ?>
                    <span class="meta">
                        <i class="fas fa-tag"></i>
                        <?php foreach ($oFunc->convertToArray($newsid['tag']) as $newsTag) { ?>
                            <a class="post-tag mt-1"><?=$newsTag;?></a>
                        <?php } ?>
                    </span>
                    <?php } ?>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12 text-center">
                            <img src="data-file/news/picture/<?=$newsid['picture']?>" class="contentimg">
                            <br><br>
                        </div>
                        <div class="col-12 contentnews">
                            <p class="textdescrip">
                                <?=$newsid['description']?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h2 class="pt-2 pdle-20">ข่าวสารอื่นๆ</h2>

                    <?php foreach ($newsrandomshow['data'] as $rs_newsrandomshow) {?>
                        <div class="col-12">
                            <article class="thumbnail thumbnail-4 section-border well slow-hover">
                                <div class="image-slow-wrapper">
                                    <a href="/news/detail/<?=$rs_newsrandomshow['id']?>/<?=$oFunc->get_slug($rs_newsrandomshow['title']);?>">
                                        <img class="" alt="<?=$rs_newsrandomshow['title']?>" src="data-file/news/thumbnail/<?=$rs_newsrandomshow['thumbnail']?>">
                                    </a>
                                </div>
                                <div class="caption">
                                    <h4 class=""><a href="/news/detail/<?=$rs_newsrandomshow['id']?>/<?=$oFunc->get_slug($rs_newsrandomshow['title']);?>"><?=$rs_newsrandomshow['title']?></a></h4>
                                    <p class="text-dark-variant-2"><?=$rs_newsrandomshow['subject']?></p>
                                    <div class="blog-info">
                                        <div class="pull-left">
                                            <time datetime="" class="meta datetime"><i class="fas fa-calendar-alt"></i> <?=$oFunc->genDate(strtotime($rs_newsrandomshow['create_datetime']));?></time>
                                        </div>
                                        <a class="btn btn-frog btn-sm" href="/news/detail/<?=$rs_newsrandomshow['id']?>/<?=$oFunc->get_slug($rs_newsrandomshow['title']);?>">อ่านเพิ่มเติม <i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>
        <?php include 'footer.php'; ?>
        
    </body>
</html>
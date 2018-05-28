<?php get_header(); ?>
<style>
    #main {
    padding-top: 30px;
    }
</style>
<div id="pathway">
    <div class="container">
        <a href="<?php bloginfo('home') ?>">Trang chủ /</a>
        <a title="Tìm kiếm" href=""><span>Tìm kiếm</span>  </a>
    </div>
</div>
<!-- START MAIN-->
<div id="main" class="wapper">
    <div class="container">
        <div class="row">
            <div class="left col-lg-8 l-news">
                <div class="frm-news list-news hot-news">
                    <div class="title-section clearfix"><a href="" class="pull-left">Tìm kiếm</a></div>
                    <h3>Kết quả tìm kiếm cho: <?php echo $s; ?></h3>
                    <ul class="content">
                    <?php 
                        if(have_posts()):
                            while(have_posts()) : the_post();?>
                                <li>
                                    <a href="<?php the_permalink();?>" class="pull-left thumb"><?php post_thumbnail_hf(200,125); ?></a>
                                    <div class="title-news"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></div>
                                    <div class="post">
                                        <i class="icon icon-post"></i><a href="<?php the_permalink();?>" class="txtRed"></a><i class="icon icon-date"></i><span><?php the_time('l, j/m/Y')?></span>
                                    </div>
                                    <div class="news-lead"><?php the_excerpt(); ?></div>
                                </li>
                            <?php endwhile;
                        endif;
                    ?>
                    </ul>
                    <?php twentyfourteen_paging_nav(); ?>
                </div>
            <!--END HOT NEWS-->
            </div>
            <?php get_sidebar(); ?>
<?php get_footer(); ?>
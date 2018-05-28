<?php get_header(); ?>
<style>
    #main {
    padding-top: 30px;
    }
</style>
<div id="pathway">
    <div class="container">
        <a href="<?php bloginfo('home') ?>">Trang chủ /</a>
        <a title="<?php echo get_the_category_by_ID($cat); ?>" href="<?php get_category_link($cat);?>"><span><?php echo get_the_category_by_ID($cat); ?></span>  </a>
    </div>
</div>
<!-- START MAIN-->
<div id="main" class="wapper">
    <div class="container">
        <div class="row">
            <div class="left col-lg-8 l-news">
                <div class="frm-news list-news hot-news">
                    <div class="title-section clearfix"><i class="icon-title"></i><a href="<?php get_category_link($cat);?>" class="pull-left"><?php echo get_the_category_by_ID($cat); ?></a></div>
                    <ul class="content">
                    <?php 
                        $args = array(
                            'post_type' => 'post',
                            'showposts' => $default_posts_per_page,
                            'order' => 'DESC',
                            'cat' => $cat,
                            
                        );
                        $query = new WP_Query($args);
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
            <!--<div class="col-lg-12 ic-ads col-sm-12"><img src="image/media/quang-cao-4.jpg"></div>-->
            </div>
            <?php get_sidebar(); ?>
<?php get_footer(); ?>
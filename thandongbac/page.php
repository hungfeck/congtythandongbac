<?php get_header(); ?>
<?php
    $cat = get_the_category(get_the_ID());
?>
<style>
    #main {
    padding-top: 30px;
    }
</style>
<div id="pathway">
    <div class="container">
        <a href="<?php bloginfo('home') ?>">Trang chủ /</a>
        <a title="<?php the_title();?>" href="<?php the_permalink(); ?>"><span><?php the_title();?></span> / </a>
    </div>
</div>
<!-- START MAIN-->
<div id="main" class="wapper">
    <div class="container">
        <div class="row">
            <!-- <script src="Scripts/ImgFullscreen.js?v=3"></script> -->
            <div class="left col-lg-8">
                <div class="frm-news">
                    <div class="title-news"><?php the_title();?></div>
                    <div class="content" id="article_content">
                    <?php
                        if ( have_posts() ) :
                            while ( have_posts() ) : the_post();
                                the_content();
                            endwhile;
                        else :
                            echo wpautop( 'Sorry, no posts were found' );
                        endif;
                    ?>
                    </div>
                    <div class="share-inter"></div><!--.share-inter-->
                </div>
                
            </div>
            <?php get_sidebar(); ?>
<?php get_footer(); ?>

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
        <a title="<?php echo $cat[0]->name;?>" href="<?php echo get_category_link($cat[0]->term_id); ?>"><span><?php echo $cat[0]->name;?></span> / </a>
        <!-- <a title="Tin tức" href="/tin-tuc.htm"><span>Tin tức</span>  </a> -->
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
                    <div class="post">
                        <i class="icon icon-date"></i>
                        <span><?php the_time('l, j/m/Y')?></span>
                    </div>
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
                
                <div class="sub-news">
                    <div class="title-sub-news">Bài viết khác</div>
                    <div class="content">
                        <div class="row">
                            </div> -->
                            <?php similar_article(); ?>
                        </div>
                        <div class="tag-news hide">
                        <ul class="list-news">
                            <li class="clearfix">
                                <div class="event pull-left">
                                    <span class="month">Tháng 5</span><br/>
                                    <span class="date">24</span>
                                </div>
                                <a onMouseover="ddrivetip('Triển khai Tháng hành động phòng, chống ma túy, mại dâm, AIDS năm 2018','')" onMouseout="hideddrivetip()" href="/trien-khai-thang-hanh-dong-phong-chong-ma-tuy-mai-dam-aids-nam-2018/trien-khai-thang-hanh-dong-phong-chong-ma-tuy-mai-dam-aids-nam-2018-201805241533474802.htm">Triển khai Tháng hành động phòng, chống ma túy, mại dâm, AIDS năm 2018</a>
                                <div class="post">
                                    <i class="icon icon-post"></i> <a href="javascritp:void(0)" class="txtRed"></a><i class="icon icon-date"></i><span>Thứ  Năm, ngày 24/05/2018</span>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="event pull-left">
                                    <span class="month">Tháng 5</span><br/>
                                    <span class="date">24</span>
                                </div>
                                <a onMouseover="ddrivetip('Ngày hội thể thao cơ sở Công ty than Hạ Long năm 2018','')" onMouseout="hideddrivetip()" href="/ngay-hoi-the-thao-co-so-cong-ty-than-ha-long-nam-2018/ngay-hoi-the-thao-co-so-cong-ty-than-ha-long-nam-2018-201805241509247702.htm">Ngày hội thể thao cơ sở Công ty than Hạ Long năm 2018</a>
                                <div class="post">
                                    <i class="icon icon-post"></i> <a href="javascritp:void(0)" class="txtRed"></a><i class="icon icon-date"></i><span>Thứ  Năm, ngày 24/05/2018</span>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="event pull-left">
                                    <span class="month">Tháng 5</span><br/>
                                    <span class="date">23</span>
                                </div>
                                <a onMouseover="ddrivetip('Nhôm Lâm Đồng: Tuyên dương thợ giỏi, nhân viên giỏi','')" onMouseout="hideddrivetip()" href="/nhom-lam-dong-tuyen-duong-tho-gioi-nhan-vien-gioi/nhom-lam-dong-tuyen-duong-tho-gioi-nhan-vien-gioi-201805231649440116.htm">Nhôm Lâm Đồng: Tuyên dương thợ giỏi, nhân viên giỏi</a>
                                <div class="post">
                                    <i class="icon icon-post"></i> <a href="javascritp:void(0)" class="txtRed"></a><i class="icon icon-date"></i><span>Thứ  Tư, ngày 23/05/2018</span>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="event pull-left">
                                    <span class="month">Tháng 5</span><br/>
                                    <span class="date">23</span>
                                </div>
                                <a onMouseover="ddrivetip('Than Khoáng sản Việt Nam ngược dòng đánh bại TNG Thái Nguyên','')" onMouseout="hideddrivetip()" href="/than-khoang-san-viet-nam-nguoc-dong-danh-bai-tng-thai-nguyen/than-khoang-san-viet-nam-nguoc-dong-danh-bai-tng-thai-nguyen-201805231021105897.htm">Than Khoáng sản Việt Nam ngược dòng đánh bại TNG Thái Nguyên</a>
                                <div class="post">
                                    <i class="icon icon-post"></i> <a href="javascritp:void(0)" class="txtRed"></a><i class="icon icon-date"></i><span>Thứ  Tư, ngày 23/05/2018</span>
                                </div>
                            </li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                .block_thumb_slide_show {
                position: relative;
                text-align: center;
                font-size: 0;
                line-height: 0;
                }
                .block_thumb_slide_show img {
                cursor: all-scroll;
                }
                .block_thumb_slide_show img.left {
                text-align: center;
                float: none;
                cursor: all-scroll\!important;
                cursor: all-scroll\9!important;
                *cursor: all-scroll!important;
                }
                .btn_icon_show_slide_show {
                height: 28px;
                width: 28px;
                display: block;
                background: url(/images/icon_zoom.png) no-repeat left top;
                position: absolute;
                right: 0;
                top: 0;
                }
                .desc_cation {
                width: 100%;
                padding: 0 0 10px;
                float: left;
                background: #f5f5f5;
                font-size: 14px;
                }
                .item_slide_show .desc_cation {
                font-size: 12px;
                padding: 10px 2%;
                width: 96%;
                }
                .desc_cation a {
                color: #004F8B;
                }
                .desc_cation a:hover {
                color: #000;
                }
                .item_slide_show {
                margin: 0 auto 10px;
                clear: both;
                }
                #box_slider .slider_container {
                width: 100%;
                height: 285px;
                position: relative;
                overflow: hidden;
                }
                .slider_container .title_news {
                padding: 10px 0;
                }
            </style>
            <?php get_sidebar(); ?>
<?php get_footer(); ?>
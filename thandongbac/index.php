<?php 
    $dirSlide = dirname(realpath(__FILE__)).'/Images/slide';
    $lstSlideImage = array();
    if (is_dir($dirSlide)){
       if ($dh = opendir($dirSlide)){
       while (($file = readdir($dh)) !== false){
           $info = new SplFileInfo($file);
           if($info->getExtension() == 'jpg')
           {
                $image = $file;
                array_push($lstSlideImage,$image);
           }
       }
       closedir($dh);
       }
    }

?>


<?php get_header(); ?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ol class="carousel-indicators">
    <?php       
        foreach($lstSlideImage as $key => $value){
            if($key == 0)
                echo "<li data-target='#myCarousel' data-slide-to='$key' class='active'></li>";
            else
                echo "<li data-target='#myCarousel' data-slide-to='$key'></li>";
        }
    ?>
        <!-- <li data-target="#myCarousel" data-slide-to="0" class="active"></li> -->
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
    <?php       
        foreach($lstSlideImage as $key => $value){
            if($key == 0)
                echo '<div class="item active">';
            else
                echo '<div class="item">';
            $imgSrc = "/Images/slide/".$value;
            echo '<a href="#"><img src="'.get_bloginfo('template_directory')."/Images/slide/".$value.'"/></a>';
            echo '<div class="carousel-caption container"></div>';
            echo '</div>'; 
        }
    ?>
    </div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- START MAIN-->
<div id="main">
    <style>#main{padding-top: 30px;}</style>
    <div class="container">
        <div class="row">
            <div class="left col-lg-8">
                <div class="section hot-news">
                    <div class="title-section clearfix"><i class="icon-title"></i><a href="javascript:void(0)" class="pull-left">Tin tức nổi bật</a></div>
                        <div class="row">
                            <div class="col-lg-8 col-left col-sm-8">
                                <div class="box-hot-news">
                                <div class="block-news-big"><a href="/dang-uy-than-quang-ninh/khen-thuong-79-tap-the-ca-nhan-xuat-sac-trong-hoc-tap-va-lam-theo-tu-tuong-dao-duc-phong-201805212138098604.htm"><img  src="http://103.56.157.124:8032/ThumbImages/Share/Image/2018/05/21/d4-2137348595_470_300.jpg" onerror="LoadImage(this,'http://103.56.157.124:8032/thumb.ashx?p=http://103.56.157.124:8012/Share/Image/2018/05/21/d4-2137348595.jpg&s=470_300');" title="Khen thưởng 79 tập thể, c&#225; nh&#226;n xuất sắc trong học tập v&#224; l&#224;m theo tư tưởng, đạo đức, phong c&#225;ch Hồ Ch&#237; Minh" alt="Khen thưởng 79 tập thể, c&#225; nh&#226;n xuất sắc trong học tập v&#224; l&#224;m theo tư tưởng, đạo đức, phong c&#225;ch Hồ Ch&#237; Minh" border="0" width="470" height="300"/></a></div>
                                <div class="title-news"><a href="/dang-uy-than-quang-ninh/khen-thuong-79-tap-the-ca-nhan-xuat-sac-trong-hoc-tap-va-lam-theo-tu-tuong-dao-duc-phong-201805212138098604.htm">Khen thưởng 79 tập thể, cá nhân xuất sắc trong học tập và làm theo tư tưởng, đạo đức, phong cách Hồ Chí Minh</a></div>
                                <div class="post"><i class="icon icon-post"></i><a href="#" class="txtRed"></a><i class="icon icon-date"></i><span>Thứ  Hai, ngày 21/05/2018</span></div>
                                <div class="news-lead">Sáng nay 21/5, Đảng ủy Than Quảng Ninh (TQN) tổ chức Hội nghị tổng kết 5 năm triển khai Nghị quyết số 08-NQ/TU, sơ kết 2 năm thực hiện Chỉ thị số 05-CT/TW và 1 năm thực hiện Quy định số 04-QĐ/TU.</div>
                                </div>
                                <div class="sub-news row">
                                <div class="news col-lg-4 col-sm-4">
                                    <a  href="/tin-tuc-vinacomin/khai-mac-giai-co-vua-co-tuong-phong-trao-tkv-nam-2018-201805211635048712.htm">
                                        <img  src="http://103.56.157.124:8032/ThumbImages/Share/Image/2018/05/21/2-1634112559_140_90.jpg" onerror="LoadImage(this,'http://103.56.157.124:8032/thumb.ashx?p=http://103.56.157.124:8012/Share/Image/2018/05/21/2-1634112559.jpg&s=140_90');" title="Khai mạc Giải cờ vua - cờ tướng phong tr&#224;o TKV năm 2018" alt="Khai mạc Giải cờ vua - cờ tướng phong tr&#224;o TKV năm 2018" border="0" width="140" height="90"/>
                                        <p><b>Khai mạc Giải cờ vua - cờ tướng phong trào TKV năm 2018</b></p>
                                    </a>
                                </div>
                                <div class="news col-lg-4 col-sm-4">
                                    <a  href="/tin-tuc-vinacomin/khai-mac-giai-co-vua-co-tuong-phong-trao-tkv-nam-2018-201805211635048712.htm">
                                        <img  src="http://103.56.157.124:8032/ThumbImages/Share/Image/2018/05/21/2-1634112559_140_90.jpg" onerror="LoadImage(this,'http://103.56.157.124:8032/thumb.ashx?p=http://103.56.157.124:8012/Share/Image/2018/05/21/2-1634112559.jpg&s=140_90');" title="Khai mạc Giải cờ vua - cờ tướng phong tr&#224;o TKV năm 2018" alt="Khai mạc Giải cờ vua - cờ tướng phong tr&#224;o TKV năm 2018" border="0" width="140" height="90"/>
                                        <p><b>Khai mạc Giải cờ vua - cờ tướng phong trào TKV năm 2018</b></p>
                                    </a>
                                </div>
                                <div class="news col-lg-4 col-sm-4">
                                    <a  href="/tin-tuc-vinacomin/khai-mac-giai-co-vua-co-tuong-phong-trao-tkv-nam-2018-201805211635048712.htm">
                                        <img  src="http://103.56.157.124:8032/ThumbImages/Share/Image/2018/05/21/2-1634112559_140_90.jpg" onerror="LoadImage(this,'http://103.56.157.124:8032/thumb.ashx?p=http://103.56.157.124:8012/Share/Image/2018/05/21/2-1634112559.jpg&s=140_90');" title="Khai mạc Giải cờ vua - cờ tướng phong tr&#224;o TKV năm 2018" alt="Khai mạc Giải cờ vua - cờ tướng phong tr&#224;o TKV năm 2018" border="0" width="140" height="90"/>
                                        <p><b>Khai mạc Giải cờ vua - cờ tướng phong trào TKV năm 2018</b></p>
                                    </a>
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-right col-sm-4">
                                <div class="ic-ads"><a target="_blank" href="http://boxit.vinacomin.vn"><img src="<?php bloginfo('template_directory')?>/Images/media/quang-cao-2.jpg"></a></div>
                                <div class="ic-ads"><a target="_blank" href="http://portal.vinacomin.vn"><img src="<?php bloginfo('template_directory')?>/Images/media/quang-cao-1.jpg"></a></div>
                                <div class="ic-ads"><a target="_blank" href="https://mail.vinacomin.vn/owa"><img src="<?php bloginfo('template_directory')?>/Images/media/quang-cao-1.jpg"></a></div>
                                <div class="ic-ads"><a target="_blank" href="http://boxit.vinacomin.vn"><img src="<?php bloginfo('template_directory')?>/Images/media/quang-cao-2.jpg"></a></div>
                                <div class="ic-ads"><a target="_blank" href="http://portal.vinacomin.vn"><img src="<?php bloginfo('template_directory')?>/Images/media/quang-cao-3.jpg"></a></div>
                                <div class="ic-ads"><a target="_blank" href="https://mail.vinacomin.vn/owa"><img src="<?php bloginfo('template_directory')?>/Images/media/quang-cao-4.jpg"></a></div><div class="ic-ads"><a target="_blank" href="http://boxit.vinacomin.vn"><img src="<?php bloginfo('template_directory')?>/Images/media/quang-cao-2.jpg"></a></div>
                                <!-- <div class="tag-news">
                                    <div class="title-category"><a href=""><i class="icon icon-tag"></i><span class="active tab-label" onclick="tabs(this,'.tab-label','.tab-content')" data-link="#tab-focus">Tiêu điểm</span><span class="tab-label" onclick="tabs(this,'.tab-label','.tab-content')" data-link="#tab-event" style="margin-left: 20px;">Sự kiện</span></a></div>
                                    <ul class="tab-content list-news" id="tab-focus">
                                        <li class="clearfix">
                                            <div class="event pull-left"><span class="month">Tháng 5</span><br/><span class="date">15</span></div>
                                            <a href="/tin-tuc/tkv-giai-nhat-sang-tao-khcn-viet-nam-2017-201805151442202265.htm">TKV: Giải Nhất Sáng tạo KHCN Việt Nam 2017</a>
                                        </li>
                                        <li class="clearfix">
                                            <div class="event pull-left"><span class="month">Tháng 4</span><br/><span class="date">20</span></div>
                                            <a href="/tin-tuc/tkv-giai-nhat-sang-tao-khcn-viet-nam-2017-201805151442202265.htm">TKV: Giải Nhất Sáng tạo KHCN Việt Nam 2017</a>
                                        </li>
                                        <li class="clearfix">
                                            <div class="event pull-left"><span class="month">Tháng 4</span><br/><span class="date">19</span></div>
                                            <a href="/tin-tuc/tkv-giai-nhat-sang-tao-khcn-viet-nam-2017-201805151442202265.htm">TKV: Giải Nhất Sáng tạo KHCN Việt Nam 2017</a>
                                        </li>
                                    </ul>
                                    <ul class="tab-content list-news hide" id="tab-event">
                                        <li class="clearfix">
                                            <div class="event pull-left"><span class="month">Tháng 4</span><br/><span class="date">20</span></div>
                                            <a href="/tin-tuc/tkv-giai-nhat-sang-tao-khcn-viet-nam-2017-201805151442202265.htm">TKV: Giải Nhất Sáng tạo KHCN Việt Nam 2017</a>
                                        </li>
                                        <li class="clearfix">
                                            <div class="event pull-left"><span class="month">Tháng 4</span><br/><span class="date">19</span></div>
                                            <a href="/tin-tuc/tkv-giai-nhat-sang-tao-khcn-viet-nam-2017-201805151442202265.htm">TKV: Giải Nhất Sáng tạo KHCN Việt Nam 2017</a>
                                        </li>
                                        <li class="clearfix">
                                            <div class="event pull-left"><span class="month">Tháng 2</span><br/><span class="date">12</span></div>
                                            <a href="/tin-tuc/tkv-giai-nhat-sang-tao-khcn-viet-nam-2017-201805151442202265.htm">TKV: Giải Nhất Sáng tạo KHCN Việt Nam 2017</a>
                                        </li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    </div>
                <!--END HOT NEWS-->
                <div class="ic-ads">
                    <a title="kỷ luật đồng tâm" href="#">
                        <img alt="kỷ luật đồng tâm" src="<?php bloginfo('template_directory')?>/Images/kyluatvadongtam.jpg" />
                    </a>
                </div>
                <div class="row">
                    <?php 
                        $all_cate = get_categories();
                        foreach ($all_cate as $key => $cates):
                            // echo 'cates'.$key;
                            $cat = new WP_Query(array(
                                'posts_per_page' => '4',
                                'post_type' => 'post',
                                'cat' => $cates->term_id,
                                'order' => 'DESC'
                                ));
                            echo '<div class="col-lg-6 col-sm-6 category">';
                                echo '<div class="title-category"><a href="'.get_category_link($cates).'">'.get_the_category_by_ID($cates->term_id).'</a></div>';
                            echo '<div class="content">';
                            echo '<div class="clearfix">';
                            if($cat->have_posts()):
                                $index = 0;
                                $ulValue = "";
                                while($cat->have_posts()) : $cat->the_post();
                                    if( $index == 0)
                                    {
                                        echo '<a href="'.get_the_permalink().'" class="pull-left thumb">';
                                        post_thumbnail_hf(200,126);
                                        echo '</a>';
                                        echo '<div class="title-news"><a href="'.get_the_permalink().'">'.get_the_title().'</a></div>';
                                        echo '<div class="post"><i class="icon icon-date"></i><span>'.get_the_time('l, j/m/Y').'</div>';
                                        echo '<div class="news-lead">'.get_the_excerpt().'</div>';
                                    }
                                    else{
                                        $ulValue = $ulValue.'<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>';
                                    }
                                    $index++;
                                endwhile;
                            endif;
                            echo '</div>';
                            echo '</div>';
                            echo '<ul>'.$ulValue.'</ul>';
                            echo '</div>';
                        endforeach;
                    ?>
                </div>
            </div>
            <?php get_sidebar(); ?>
<?php get_footer();?>
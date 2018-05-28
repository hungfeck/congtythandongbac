<?php
/**
@ Khai bao hang gia tri
	@ THEME_URL = lay duong dan thu muc theme
	@ CORE = lay duong dan cua thu muc /core
**/
define( 'THEME_URL', get_stylesheet_directory() );
define ( 'CORE', THEME_URL . "/core" );

class kid_walker_nav_menu extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li class="td-not-mega">';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
        
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;
        
        if ($item->is_mega_menu == false) {
            $item_output .= '<a'. $attributes .' class="_2wx clearfix" >';
        }
        
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

        if ($item->is_mega_menu == false) {
            $item_output .= '</a>';
        }
        $item_output .= $args->after;
        
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

//REGISTER MENU
register_nav_menus( array(
        'main-menu' => 'Main Menu',
        'header-menu' => 'Menu Header'
        )        
    );
//REGISTER SIDEBAR
register_sidebar(array(
    'name' => __('Sidebar_nav','english'),
    'id' => 'sidebar',
    'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'english' ),
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widget_title">',
    'after_title'   => '</h2>',
));
add_theme_support( 'custom-logo' );
add_theme_support( 'custom-logo', array(
	'height'      => 100,
	'width'       => 400,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
) );
//Bật tính năng Set Featured Image cho bài viết
add_theme_support('post-thumbnails',array('page','post'));
// bat html5
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
//Bat post-format
add_theme_support('post-formats', array( 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'audio'));

//CUSTOM HEADER (hien thi header image va color)
$header = array(
	'width'         => 980,
	'height'        => 60,
	'default-image' => get_template_directory_uri() . '/images/header.jpg',
);
add_theme_support( 'custom-header', $header );
// END CUSTOM HEADER
 //background 
$background = array(
	'default-color' => '000000',
	'default-image' => '%1$s/images/background.jpg',
);
add_theme_support( 'custom-background', $background );

function theme_prefix_setup() {
	add_theme_support( 'custom-logo', array(
		'width'       => 100,
        'height'      => 100,
		'flex-width' => false,
	) );
}
add_action( 'after_setup_theme', 'theme_prefix_setup' );
//output logo
function display_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
	}
}

//add_filter('show_admin_bar', '__return_false');

function ct_ignite_customize_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <article id="comment-<?php comment_ID(); ?>" class="comment">
            <footer>
                <?php echo get_avatar( get_comment_author_email(),50 ); ?> <cite><?php echo get_the_author();?></cite>

                <a class="comment-link" href="#">
                    <time pubdate="1461118675"><?php the_time("D, d M Y / H:i:s ")?></time>
                </a>
                
            </footer>
             <div class="comment-content">
                <?php if ($comment->comment_approved == '0') : ?>
                    <em><?php _e('Your comment is awaiting moderation.', 'newspaper') ?></em>
                    <br />
                <?php endif; ?>
                <?php comment_text(); ?>
            </div>
            <div class="comment-meta" id="comment-2">
                <?php edit_comment_link( '<i class="fa fa-pencil-square-o">Edit</i>' ); ?>
                <?php comment_reply_link( array_merge( $args, array( 
                    'reply_text' => __( '<i class="fa fa-reply-all">Reply</i>', 'newspaper' ), 
                    'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
                ?>
            </div>
        </article>
    </li>
    <?php
}


function twentyfourteen_paging_nav() {
    global $wp_query, $wp_rewrite;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $wp_query->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&larr; Trước', 'twentyfourteen' ),
		'next_text' => __( 'Sau &rarr;', 'twentyfourteen' ),
	) );

	if ( $links ) :
	?>
        <div class="page-nav">
            <!-- <a class="" href='/tin-tuc/page-2.htm'>2</a> -->
            <?php echo $links ?>
            <span class="pages">Trang <?php echo $paged ?>/<?php echo $wp_query->max_num_pages; ?></span>
        </div>
	<?php
	endif;
}



/**
 * Tạo một section mới trong Customizer */
 
function customizer_a( $wp_customize ) {
 
        // Tạo section khu hien thi tren admin
    $wp_customize->add_section (
        'section_a',
        array(
            'title' => 'Khu vực A',
            'description' => 'Các tùy chọn cho khu vực A',
            'priority' => 125 // thứ tự xuất hiện trên bảng custom
        )
    );
 
    // Tạo setting
    $wp_customize->add_setting (
            'option1',
            array(
                'default' => 'Giá trị mặc định'
            )
        );

    // Tạo coltrol
    $wp_customize->add_control ('control_option1',array(
            'label' => 'Option 1',
            'section' => 'section_a',
            'type' => 'text',
            'settings' => 'option1'
        )
    );
 
}
add_action( 'customize_register', 'customizer_a' );






/********* Cac ham thuong dung tu viet cho vao day ***************/
/*****COUNT USER COMMENT*******/
function count_user_comments() {
    global $wpdb;
    $count = $wpdb->get_var(
    'SELECT COUNT(comment_ID) FROM ' . $wpdb->comments. ' 
    WHERE comment_author_email = "'.get_the_author_meta('user_email').'" 
    AND comment_approved = "1" 
    AND comment_type IN ("comment", "")'
    );

    return $count;
}

/*****GET_THUMBNAIL*****/
    function post_thumbnail_hf($width='auto', $height='auto'){
        if(has_post_thumbnail()):
            $post_thumbnail_id = get_post_thumbnail_id();
            $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
            ?>
                <img title="image_title" alt="thumb_image" src="<?php echo $post_thumbnail_url; ?>" width="<?php echo $width?>" height="<?php echo $height?>" >
            <?php 
                else: 
            ?>
                <img title="image_title" alt="thumb_image" src="<?php bloginfo('template_directory')?>/Images/no-image-available.jpg" width="<?php echo $width?>" height="<?php echo $height?>">
        <?php endif; 
    }
/*****END THUMBNAIL*****/

/*****CUSTOM EXCERPT*****/
//    length for excerpt
function wpdocs_custom_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

//add Readmore fore excerpt
function new_excerpt_more() {
    return '<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __(' Xem tiếp &raquo;', 'english') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );
/*****END CUSTOM EXCERPT*****/

/*****SET AND GET POSTVIEW*****/
function getPostViews($postID){ // hàm này dùng để lấy số người đã xem qua bài viết
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){ // Nếu như lượt xem không có
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0"; // giá trị trả về bằng 0
    }
    return $count; // Trả về giá trị lượt xem
}
function setPostViews($postID) {// hàm này dùng để set và update số lượt người xem bài viết.
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++; // cộng đồn view
        update_post_meta($postID, $count_key, $count); // update count
    }
}



/*****END SET AND GET POSTVIEW*****/

    function customize_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <article id="comment-<?php comment_ID(); ?>" class="comment">
            <footer>
                <div class="comment-author"><?php echo get_avatar( get_comment_author_email() ); ?>
                    <span class="author-name"><?php comment_author_link(); ?></span>
                    <span> <?php _e('said:', 'ignite'); ?></span>
                </div>
                <div class="comment-content">
                    <?php if ($comment->comment_approved == '0') : ?>
                        <em><?php _e('Your comment is awaiting moderation.', 'ignite') ?></em>
                        <br />
                    <?php endif; ?>
                    <?php comment_text(); ?>
                </div>
                <div class="comment-meta">
                    <div class="comment-date"><?php comment_date(); ?></div>
                    <?php edit_comment_link( 'edit' ); ?>
                    <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'ignite' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div>
            </footer>
        </article>
    </li>
    <?php
}

    function Random_Post(){
        $args = array(
            'showposts' => 3,  /* get 4 posts, or set -1 to display all posts */
            'orderby'        => 'rand',
            'post_type'   => 'post',
            'post_status' => 'publish'
            );
        $query = new WP_Query($args);
        if($query->have_posts()):
            while($query->have_posts()):$query->the_post();?>
                <div class="td_mod3 td_mod_wrap " itemscope itemtype="http://schema.org/Article">
                    <div class="thumb-wrap">
                        <?php post_thumbnail_hf(100,65)?>
                    </div>
                    <div class="item-details">
                        <h3 itemprop="name" class="entry-title"><a itemprop="url" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title();?>"><?php the_title();?></a></h3>
                        <div class="meta-info">
                            <time itemprop="dateCreated" class="entry-date updated" datetime="<?php the_time()?>"><?php the_time('jS Y F')?></time>
                            <meta itemprop="interactionCount" content="UserComments:0" /> </div>
                    </div>
                    <meta itemprop="author" content="admin">
                </div>
            <?php endwhile;
        endif;
    }
    function Latest_post(){
        $args = array(
            'showposts' => 5, 
            'post_status' => 'publish',  
            'order' => 'DESC'
            );
        $query = new WP_Query($args);
        if($query->have_posts()):
            while($query->have_posts()):$query->the_post();?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile;
        endif;
    }
    function similar_article(){
        $cat = get_the_category(get_the_ID());
            $cat_id = $cat[0]->term_id;
            $arg = array(
                'showposts' => 4,
                'post_type' => 'post',
                'cat' => $cat_id,
                'order' => 'DESC',
                'post__not_in' => array(get_the_ID())
            );
            $query = new WP_Query($arg);
            if($query->have_posts()):
                while($query->have_posts()):$query->the_post();?>
                        <div class="news col-lg-3 col-sm-3">
                            <a href="<?php the_permalink(); ?>">
                                <?php post_thumbnail_hf(174,124); ?>
                                <p><?php the_title(); ?></p>
                            </a>
                        </div>
                <?php endwhile;
            endif;
    }
/** PANEL **/ 
//    add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
// 
//    function my_custom_dashboard_widgets() {
//    global $wp_meta_boxes;
//
//    wp_add_dashboard_widget('custom_help_widget', 'Theme Support', 'custom_dashboard_help');
//    }
//
//    function custom_dashboard_help() {
//    echo '<p>Welcome to Custom Blog Theme! Need help? Contact the developer <a href="mailto:yourusername@gmail.com">here</a>. For WordPress Tutorials visit: <a href="http://www.wpbeginner.com" target="_blank">WPBeginner</a></p>';
//    }
    
    
    /**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function example_add_dashboard_widgets() {

	wp_add_dashboard_widget(
                 'example_dashboard_widget',         // Widget slug.
                 'Example Dashboard Widget',         // Title.
                 'example_dashboard_widget_function' // Display function.
        );	
}
add_action( 'wp_dashboard_setup', 'example_add_dashboard_widgets' );

/**
 * Create the function to output the contents of our Dashboard Widget.
 */
function example_dashboard_widget_function() {

	// Display whatever it is you want to show.
	echo "Hello World, I'm a great Dashboard Widget";
}
function dontmiss($cat,$total_post){
    ?>
    <script>
    jQuery(document).ready(function ($) {
        var page=0;
        var cat = <?php echo $cat?>;
        var total_post = <?php echo $total_post?>;
        
        $('#prev-page-id<?php echo $cat?>').addClass("ajax-page-disabled");
        $("#next-page-id<?php echo $cat?>").click(function(){
            console.log("page next compare"+page);
            if(page >= (total_post-12)){
                $("#next-page-id<?php echo $cat?>").addClass("ajax-page-disabled");
            }
            $('#prev-page-id<?php echo $cat?>').removeClass("ajax-page-disabled");
            $('#td_uid_<?php echo $cat?>').html('<img src="<?php bloginfo('template_directory')?>/images/AjaxLoader.gif">');
            load_ajax_next();
            
         });
        $('#prev-page-id<?php echo $cat?>').click(function(){
            $('#next-page-id<?php echo $cat?>').removeClass("ajax-page-disabled");
            if(page == 6){
                $("#prev-page-id<?php echo $cat?>").addClass("ajax-page-disabled");
            }
            console.log("page prev compare"+page);
            $('#td_uid_<?php echo $cat?>').html('<img src="<?php bloginfo('template_directory')?>/images/AjaxLoader.gif" alt="prev" >');
            load_ajax_prev();
        });
        function load_ajax_next() {
            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                
                data: {
                    'action':'request_dontmiss',
                    'cat' : cat,
                    'page':page+6
                },
                success:function(data) {
                    page=page+6;
                    $('#td_uid_<?php echo $cat?>').hide().html(data).fadeIn(100);
                },
                error: function(errorThrown){
                    console.log(errorThrown);
                }
            });  
        };
        function load_ajax_prev(){
            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php')?>',
                data:{
                    'action': 'request_dontmiss',
                    'cat': cat,
                    'page': page-6
                },
                success: function(data){
                    page = page-6;
                    $('#td_uid_<?php echo $cat?>').hide().html(data).fadeIn(100);
                    console.log(page);
                },
                error: function(errorThrown){
                console.log(errorThrown);
                }
            });
        };
        
    });
    </script>
     
    <?php 
    $dem = 0;
    $spain1 = new WP_Query(array(
        'posts_per_page' => '6',
        'post_type' => 'post',
        'cat' => $cat,
        'order' => 'DESC'
        ));
    ?>
    <div class="td_block_wrap td_block2">
        <h4 class="block-title">
            <span ><a href="<?php echo get_category_link($cat); ?>"><?php echo get_the_category_by_ID($cat); ?></a></span>
        </h4>
            <div id="td_uid_<?php echo $cat;?>" class="td_block_inner">
            <?php 
                if($spain1->have_posts()):
                    while($spain1->have_posts()):$spain1->the_post();
                        echo ($dem%2==0)?'<div class="wpb_row row-fluid">': ''?>
                        <div class="span6">
                            <div class="td_mod<?php echo ($dem<2)?'5':'3' ?> td_mod_wrap " itemscope itemtype="http://schema.org/Article">
                                <div class="thumb-wrap thumb_wrap_index" >
                                    <a href="<?php the_permalink();?>" rel="bookmark" title="Gallery Slide">
                                        <?php ($dem<2)?post_thumbnail_hf(326,159): post_thumbnail_hf(100,65)?>
                                    </a>
                                </div>
                                <?php if($dem<2):?>
                                    <h3 itemprop="name" class="entry-title">
                                        <a itemprop="url" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title();?>"><?php the_title();?></a>
                                    </h3>
                                    <div class="meta-info">
                                        <time itemprop="dateCreated" class="entry-date updated" datetime="<?php the_time(); ?>"><?php the_time('jS F Y'); ?></time>
                                        <meta itemprop="interactionCount" content="UserComments:0" />
                                        <div class="entry-comments-views">
                                            <span class="td-sp td-sp-ico-comments td-fake-click" data-fake-click="http://wpdemo.com/2016/04/13/td_d_slug_46/#respond"></span>
                                            <?php comments_number( '0', '1', '%' ); ?> <span class="td-sp td-sp-ico-view"></span><?php echo getPostViews(get_the_ID()); ?></div>
                                    </div>
                                    <div class="td-post-text-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <?php else: ?>
                                        <div class="item-details">
                                            <h3 itemprop="name" class="entry-title"><a itemprop="url" href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                                            <div class="meta-info">
                                                <time itemprop="dateCreated" class="entry-date updated" datetime="<?php the_time(); ?>"><?php the_time('jS F Y')?></time>
                                                        <meta itemprop="interactionCount" content="UserComments:0" /> 
                                                </div>
                                         </div>			
                                <?php endif;?>
                                <meta itemprop="author" content="admin"> </div>
                        </div>
                        <?php
                        echo ($dem%2==0)?'': '</div><!--./row-fluid-->';
                    $dem++;
                    endwhile;
                endif;
                echo ($dem%2!=0)?'</div>':'';
                ?>
        </div>

        <div class="td-next-prev-wrap">
            <a href="#" class="td_ajax-prev-page" id="prev-page-id<?php echo $cat;?>" data-td_block_id="td_uid_2_570efcea7268a"></a>
            <a href="#" class="td-ajax-next-page" id="next-page-id<?php echo $cat;?>" data-td_block_id="td_uid_2_570efcea7268a"></a>
        </div>
    </div>
    
    <!-- ./block1 -->
    <?php
}


function request_dontmiss() {   
    if ( isset($_REQUEST) ) {
        $cat = $_REQUEST['cat'];
        $page = $_REQUEST['page'];
//        query
        $args = array(
            'showposts' => '6',
            'cat' => $cat,
            'post_type' => 'post',
            'order' => 'DESC',
            'offset' => $page
        );
        $query = new WP_Query($args);
        ?>
        <div class="td_block_inner">
            <div class="wpb_row row-fluid">
             <?php 
                    $dem = 0;
                    if($query->have_posts()):
                        while($query->have_posts()):$query->the_post();
                            echo ($dem%2==0)?'<div class="wpb_row row-fluid">': ''?>
                        <div class="span6">
                            <div class="td_mod<?php echo ($dem<2)?'5':'3' ?> td_mod_wrap " itemscope itemtype="http://schema.org/Article">
                                <div class="thumb-wrap">
                                    <a href="<?php the_permalink();?>" rel="bookmark" title="Gallery Slide">
                                        <?php ($dem<2)?post_thumbnail_hf(326,159): post_thumbnail_hf(100,65)?>
                                    </a>
                                </div>
                                <?php if($dem<2):?>
                                    <h3 itemprop="name" class="entry-title">
                                        <a itemprop="url" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title();?>"><?php the_title();?></a>
                                    </h3>
                                    <div class="meta-info">
                                        <time itemprop="dateCreated" class="entry-date updated" datetime="<?php the_time(); ?>"><?php the_time('jS F Y'); ?></time>
                                        <meta itemprop="interactionCount" content="UserComments:0" />
                                        <div class="entry-comments-views">
                                            <span class="td-sp td-sp-ico-comments td-fake-click" data-fake-click="http://wpdemo.com/2016/04/13/td_d_slug_46/#respond"></span>
                                            <?php comments_number( '0', '1', '%' ); ?> <span class="td-sp td-sp-ico-view"></span><?php echo getPostViews(get_the_ID()); ?></div>
                                    </div>
                                    <div class="td-post-text-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <?php else: ?>
                                        <div class="item-details">
                                            <h3 itemprop="name" class="entry-title"><a itemprop="url" href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                                            <div class="meta-info">
                                                <time itemprop="dateCreated" class="entry-date updated" datetime="<?php the_time(); ?>"><?php the_time('jS F Y')?></time>
                                                        <meta itemprop="interactionCount" content="UserComments:0" /> 
                                                </div>
                                         </div>			
                                <?php endif;?>
                                <meta itemprop="author" content="admin"> </div>
                        </div>
                        <?php
                        echo ($dem%2==0)?'': '</div><!--./row-fluid-->';
                        $dem++;
                        endwhile;
                    endif;
                    echo ($dem%2!=0)?'</div>':'';
                ?>
            </div>
        </div><!--wpb_row row-fluid-->   
        <?php 
        }
   die();
}
 
add_action( 'wp_ajax_request_dontmiss', 'request_dontmiss' );
//TECH
function tech_and_gadgets($cat,$total_post){
?>
    <script>
    jQuery(document).ready(function ($) {
        var page=0;
        var cat = <?php echo $cat?>;
        var total_post = <?php echo $total_post?>;
        $('#prev-page-id<?php echo $cat?>').addClass("ajax-page-disabled");
        $("#next-page-id<?php echo $cat?>").click(function(){
            console.log("page next compare"+page);
            if(page >= (total_post-10)){
                $("#next-page-id<?php echo $cat?>").addClass("ajax-page-disabled");
            }
            $('#prev-page-id<?php echo $cat?>').removeClass("ajax-page-disabled");
            $('#td_uid_<?php echo $cat?>').html('<img src="<?php bloginfo('template_directory')?>/images/AjaxLoader.gif">');
            load_ajax_next();
            console.log("page after load next compare"+page);
            
            
            
         });
        $('#prev-page-id<?php echo $cat?>').click(function(){
            $('#next-page-id<?php echo $cat?>').removeClass("ajax-page-disabled");
            if(page == 5){
                $("#prev-page-id<?php echo $cat?>").addClass("ajax-page-disabled");
            }
            console.log("page prev compare"+page);
            $('#td_uid_<?php echo $cat?>').html('<img src="<?php bloginfo('template_directory')?>/images/AjaxLoader.gif" alt="prev" >');
            load_ajax_prev();
        });
        function load_ajax_prev(){
            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php')?>',
                data:{
                    'action': 'request_tech',
                    'cat': cat,
                    'page': page-5
                },
                success: function(data){
                    page = page-5;
                    $('#td_uid_<?php echo $cat?>').hide().html(data).fadeIn(100);
                    console.log(page);
                },
                error: function(errorThrown){
                console.log(errorThrown);
                }
            });
        };
        function load_ajax_next() {
            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                data: {
                    'action':'request_tech',
                    'cat' : cat,
                    'page':page+5
                },
                success:function(data) {
                    page=page+5;
                    $('#td_uid_<?php echo $cat?>').hide().html(data).fadeIn(100);
                },
                error: function(errorThrown){
                    console.log(errorThrown);
                }
            });  
        };
    });
    </script>
    <?php
    $dem = 0;
    $spain1 = new WP_Query(array(
        'posts_per_page' => '5',
        'post_type' => 'post',
        'cat' => $cat,
        'order' => 'DESC'
    ));
    ?>
    <div class="td_block_wrap td_block1">
    <h4 style="border-bottom: 2px solid #f65261" class="block-title">
        <span style="background-color:#f65261" ><a href="<?php echo get_category_link($cat)?>" style="background-color:#f65261"><?php echo get_the_category_by_ID($cat)?></span></a>
    </h4>
    <style>
        .ui-sctd_uid_4_570efcea7ddeb .cur-sub-cat {
            color: #f65261 !important
        }
    </style>
    <div class="td_block_inner">
        <div id="td_uid_<?php echo $cat;?>" class="wpb_row row-fluid">
            <?php 
                if($spain1->have_posts()):
                    while($spain1->have_posts()):$spain1->the_post();?>
                        <?php if($dem<1):?>
                            <div class="span6">
                                <div class="td_mod2 td_mod_wrap " itemscope itemtype="http://schema.org/Article">
                                    <div class="thumb-wrap">
                                        <a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title(); ?>">
                                            <?php post_thumbnail_hf(326,235)?>
                                        </a>
                                    </div>
                                    <h3 itemprop="name" class="entry-title"><a itemprop="url" href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="meta-info">
                                        <time itemprop="dateCreated" class="entry-date updated" datetime="<?php the_time();?>"><?php the_time('jS F Y')?></time>
                                        <meta itemprop="interactionCount" content="UserComments:0" />
                                        <div class="entry-comments-views">
                                            <span class="td-sp td-sp-ico-comments td-fake-click" data-fake-click="http://wpdemo.com/2016/04/13/td_d_slug_46/#respond"></span>
                                            <?php comments_number( '0', '1', '%' ); ?> <span class="td-sp td-sp-ico-view"></span><?php echo getPostViews(get_the_ID()); ?></div>
                                    </div>

                                    <div class="td-post-text-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>

                                    <meta itemprop="author" content="admin">
                                </div>
                            </div>
                            <div class="span6">
                            <?php 
                            else: 
                            ?>
                            <div class="td_mod3 td_mod_wrap " itemscope itemtype="http://schema.org/Article">
                                <div class="thumb-wrap">
                                    <a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title(); ?>">
                                        <?php post_thumbnail_hf(100, 65); ?>
                                    </a>
                                </div>
                                <div class="item-details">
                                    <h3 itemprop="name" class="entry-title"><a itemprop="url" href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="meta-info">
                                        <time itemprop="dateCreated" class="entry-date updated" datetime="<?php the_time();?>"><?php the_time('jS F Y');?></time>
                                        <meta itemprop="interactionCount" content="UserComments:0" /> </div>
                                </div>
                                <meta itemprop="author" content="admin"> 
                            </div>
                        <?php 
                        endif;
                    $dem++;
                    endwhile;
                    ?>
                        </div><!--span6-->
                    <?php
                endif;
            ?>
        </div>
        <div class="td-next-prev-wrap">
            <a href="#" class="td_ajax-prev-page" id="prev-page-id<?php echo $cat;?>" data-td_block_id="td_uid_4_570efcea7ddeb"></a>
            <a href="#" class="td-ajax-next-page" id="next-page-id<?php echo $cat;?>" data-td_block_id="td_uid_4_570efcea7ddeb"></a>
        </div>
    </div><!--wpb_row row-fluid-->
    </div>
    <!-- ./block1 -->
    <?php
}

function request_tech() {
    if ( isset($_REQUEST) ) {
        $cat = $_REQUEST['cat'];
        $page = $_REQUEST['page'];
//        query
        $args = array(
            'showposts' => '5',
            'cat' => $cat,
            'post_type' => 'post',
            'order' => 'DESC',
            'offset' => $page
        );
        $query = new WP_Query($args);
        ?>
        <div class="td_block_inner">
            <div class="wpb_row row-fluid">
             <?php 
                    $dem = 0;
                    if($query->have_posts()):
                        while($query->have_posts()):$query->the_post();
                           ?>
                        <?php if($dem<1):?>
                            <div class="span6">
                                <div class="td_mod2 td_mod_wrap " itemscope itemtype="http://schema.org/Article">
                                    <div class="thumb-wrap">
                                        <a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title(); ?>">
                                            <?php post_thumbnail_hf(326,235)?>
                                        </a>
                                    </div>
                                    <h3 itemprop="name" class="entry-title"><a itemprop="url" href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="meta-info">
                                        <time itemprop="dateCreated" class="entry-date updated" datetime="<?php the_time();?>"><?php the_time('jS F Y')?></time>
                                        <meta itemprop="interactionCount" content="UserComments:0" />
                                        <div class="entry-comments-views">
                                            <span class="td-sp td-sp-ico-comments td-fake-click" data-fake-click="http://wpdemo.com/2016/04/13/td_d_slug_46/#respond"></span>
                                            <?php comments_number( '0', '1', '%' ); ?> <span class="td-sp td-sp-ico-view"></span><?php echo getPostViews(get_the_ID()); ?></div>
                                    </div>

                                    <div class="td-post-text-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>

                                    <meta itemprop="author" content="admin">
                                </div>
                            </div>
                            <div class="span6">
                            <?php 
                            else: 
                            ?>
                            <div class="td_mod3 td_mod_wrap " itemscope itemtype="http://schema.org/Article">
                                <div class="thumb-wrap">
                                    <a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title(); ?>">
                                        <?php post_thumbnail_hf(100, 65); ?>
                                    </a>
                                </div>
                                <div class="item-details">
                                    <h3 itemprop="name" class="entry-title"><a itemprop="url" href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="meta-info">
                                        <time itemprop="dateCreated" class="entry-date updated" datetime="<?php the_time();?>"><?php the_time('jS F Y');?></time>
                                        <meta itemprop="interactionCount" content="UserComments:0" /> </div>
                                </div>
                                <meta itemprop="author" content="admin"> 
                            </div>
                        <?php 
                        endif;
                    $dem++;

                        endwhile;
                    endif;
                    echo ($dem%2!=0)?'</div>':'';
                ?>
            </div>
        </div><!--wpb_row row-fluid-->   
        <?php 
        }
   die();
}
 
add_action( 'wp_ajax_request_tech', 'request_tech' );



function myaction(){
    echo "myaction";
    echo $_REQUEST['age'];
    wp_die(); // ajax call must die to avoid trailing 0 in your response
}
add_action( 'wp_ajax_myaction', 'myaction' );


function category_has_children($parent_id) {
    global $wpdb;   
    $children = get_terms
    ( 
        'category', 
        array
        (
            'parent'    => $parent_id,
            'hide_empty' => false
        )
    );
    if($children) // get_terms will return false if tax does not exist or term wasn't found.
    { 
        return true;
    }
    else
    {
        return false;
    }
}
    


?>




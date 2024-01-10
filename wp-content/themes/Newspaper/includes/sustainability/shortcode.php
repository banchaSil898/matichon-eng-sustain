<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function register_sustain_style() {
    wp_enqueue_style('sustain-style', get_theme_file_uri( 'includes/sustainability/style.css' ) );
}
add_action( 'wp_enqueue_scripts', 'register_sustain_style' );

function sustain_block() {
    $args = array(
		'numberposts'      => 6,
		'category'         => 1571,
		'orderby'          => 'date',
		'order'            => 'DESC',
        'post_status'      => 'publish'
	);
    $posts = get_posts( $args );
    // var_dump($posts);

    if( ! empty( $posts ) ){
        $output = '<style>
        #sustain-section{
          box-sizing: border-box;
        }
        .sustain-card{
          padding: 0 0 !important;
          width:257px;
          height: 294px;
        }
        .td-module-thumb{
          height: 294px !important;
        }
        .td-module-thumb .td-image-wrap img{
            aspect-ratio: 5/6;
            object-fit: cover;
        }
        .td_block_text_with_title img{
          margin: 0 !important;
        }
        #sustain-section .entry-title{
          overflow: hidden;
          text-overflow: ellipsis;
          display: -webkit-box;
          -webkit-line-clamp: 2;
          -webkit-box-orient: vertical;
          color: #C7E995;
        }
        #sustain-section .entry-title a{
          text-decoration: none;
          color: #C7E995 !important; 
        }
        #sustain-section .td-module-meta-info{
          background: rgba(25, 48, 40, 0.6);
          margin-bottom: 0 !important;
          padding:12px;
          padding-bottom: 20px;
        }
        #sustain-section .sustain-card{
          margin: 6px;
        }
        #sustain-section .sustain-card-footer{
          display: flex;
          flex-direction: row ;
          justify-content: space-between;
          text-align: center;
        }
        #sustain-section .sustain-card-footer>*{
          height: 40px; line-height: 28px;
        }
      </style>';
        $output .= '<div id="sustain-section" class="td-block-row">';
        foreach ( $posts as $p ){
            $post_permalink = get_permalink($p->ID);
            var_dump($p->ID);
            echo get_permalink($p->ID);
            echo"</br></br>";
            // var_dump($p->post_title);
            // echo"</br></br>";
            // var_dump(get_the_post_thumbnail_url($p->ID));
            // echo"</br></br>";
            // var_dump($p->post_date);

            // echo"</br></br>";
            // $output .= '<div class="td-block-span4">
            //     <div class="block-2-3">'. $p->post_title .'</div>
            // </div>';
            $featured_image_url = get_the_post_thumbnail_url($p->ID);
            $output .='<div class="td-block-span4 sustain-card">
            <div class="td_module_mx1 td_module_wrap td-animation-stack">
              <div class="td-module-thumb">
                <a href="' . $post_permalink . '" rel="bookmark" class="td-image-wrap" title="Thai Immigration Police Explain Viral Passenger Queue Images">
                  <img style="width:100%; height:auto;" loading="lazy" decoding="async" class="entry-thumb td-animation-stack-type0-2" src="'. get_the_post_thumbnail_url($p->ID) .'" alt="" title="Thai Immigration Police Explain Viral Passenger Queue Images" data-type="image_tag" data-img-url="'. get_the_post_thumbnail_url($p->ID) .'">
                </a>
              </div>
              <div class="td-module-meta-info">
                <h3 class="entry-title td-module-title">
                  <a href="' . $post_permalink . '">'. $p->post_title .'</a>
                </h3>
                <div class="td-editor-date">
                  <span class="td-author-date">
                    <span class="td-post-date sustain-card-footer">
                      <time class="entry-date updated td-module-date">
                        '. date_format(date_create($p->post_date), 'F j, Y g:i a') .'
                      </time>
                      <div style="border: 1px solid white; width: 40px; padding: 6px 8px;"> <i class="fa-solid fa-arrow-right" style="font-size: 2.5EM;"></i> </div>
                    </span>
                  </span>
                </div>
              </div>
            </div>
          </div>';
        }
        $output .= '</div>';
    }

    return $output;
	
}

function sustain_block_BK(){
    $args = array(
		'numberposts'      => 6,
		'category'         => 1571,
		'orderby'          => 'date',
		'order'            => 'DESC',
        'post_status'      => 'publish'
	);
    $posts = get_posts( $args );
    $homepage = file_get_contents(get_theme_file_path('includes/sustainability/purehtml.html'));
    return $homepage;
}
add_shortcode('sustain_block', 'sustain_block');

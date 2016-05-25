<?php
/*
Plugin Name: Heron Creek Additions
Description: Additional Functions For Site
Version: 0.1.0
Author: dmm
Text Domain: heron_creek
*/
function heron_creek_scripts_method() {
    wp_enqueue_style( 'conversion-boxes', plugins_url( '/css/conversion-boxes.css' , __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'heron_creek_scripts_method' );

function featured_box_item ( $atts, $content = null) {
      $atta = shortcode_atts( array(
        'background-image' => '',
        'title_text' => '',
        'button_text' => '',
        'height' => '',
        'class' => '',
        'button_link' => '',
    ), $atts );
    $cont = '';
    $cont .= '<div class="conv-square';
    if ($atta['class'] !== '') {$cont .= ' '.$atta['class'].'';}
    $cont .= '"';
    if ($atta['background-image'] !== '' || $atta['height'] !== '') {
      $cont .= ' style="';
       if ($atta['background-image'] !== '') {$cont .= 'background-image: url(\''.$atta['background-image'].'\');';}
       if ($atta['height'] !== '') {$cont .= 'height: '.$atta['height'].';';}
       $cont .= '"';
    }
    $cont .= '>';
    $cont .= '<div class="box-title">'.$atta['title_text'].'</div>';
    $cont .= '<div class="box-content">'.$content.'</div>';
    if ($atta['button_text'] !== ''){$cont .= '<div class="box-button"><a href="'.$atta['button_link'].'>'.$atta['button_text'].'</a></div>';}
    $cont .= '</div>';
    
    return do_shortcode($cont);
    
}
add_shortcode('featured_box', 'featured_box_item');

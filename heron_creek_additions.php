<?php
/*
Plugin Name: Heron Creek Additions
Description: Additional Functions For Site
Version: 0.1.0
Author: dmm
Text Domain: heron_creek
*/
function featured_box_item ( $atts, $content = null) {
      $atta = shortcode_atts( array(
        'background-image' => '',
        'title_text' => '',
        'button_text' => '',
    ), $atts );
    $cont = '';
    $cont .= '<div class="conv-square"';
    if ($atta['background-image'] !== '') {
      $cont .= ' style="background-image: url(\''.$atta['background-image'].'\');"';
    }
    $cont .= '>';
    $cont .= '<div class="box-title">'.$atta['title_text'].'</div>';
    $cont .= '<div class="box-content">'.$content.'</div>';
    if ($atta['button_text'] !== ''){$cont .= '<div class="box-button">'.$atta['button_text'].'</div>';}
    $cont .= '</div>';
    
    return do_shortcodes($cont);
    
}
add_shortcode('featured_box', 'featured_box_item');

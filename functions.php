<?php

define('KRATOS_VERSION','0.4.3');

require_once(get_template_directory().'/inc/core.php');
require_once(get_template_directory().'/inc/shortcode.php');
require_once(get_template_directory().'/inc/imgcfg.php');
require_once(get_template_directory().'/inc/post.php');
require_once(get_template_directory().'/inc/ua.php');
require_once(get_template_directory().'/inc/widgets.php');
require_once(get_template_directory().'/inc/smtp.php');
require_once(get_template_directory().'/inc/logincfg.php');
require_once(get_template_directory().'/inc/avatars.php');

function trim_words_keep_linebreak($text, $num_words)
{
    // https://developer.wordpress.org/reference/functions/wp_trim_words/
    if (strpos(_x('words', 'Word count type. Do not translate!'), 'characters') === 0 && preg_match('/^utf\-?8$/i', get_option('blog_charset'))) {
        $text = trim(preg_replace("/[\t\r ]+/", ' ', $text), ' ');
        preg_match_all('/(.|\n)/u', $text, $words_array);
        $words_array = array_slice($words_array[0], 0, $num_words + 4);
        $sep         = '';
    } else {
        $words_array = preg_split("/[\t\r ]+/", $text, $num_words + 1, PREG_SPLIT_NO_EMPTY);
        $sep         = ' ';
    }
    $more = __( '&hellip;' );
    if (count($words_array) > $num_words + 3) {
        array_pop($words_array);
        $text = implode($sep, $words_array);
        $text = $text . $more;
    } else {
        $text = implode($sep, $words_array);
    }
    return $text;
}

function get_the_excerpt_with_linebreak()
{
    $excerpt = null;
    if (post_password_required()) {
        $excerpt = get_the_excerpt();
    } else {
        $excerpt = wp_strip_all_tags(preg_replace("/(?i)(<br[ \/]{0,}>)/", "\n", get_the_content()));
    }
    return wpautop(trim_words_keep_linebreak($excerpt, kratos_option('w_num')));
}

function my_default_title_filter() {
    global $post_type;
    if ('post' == $post_type) {
		$dhours = get_option('gmt_offset');
        return "status" . date("YmdHi", time() + $dhours * 3600);
    }
}
add_filter('default_title', 'my_default_title_filter');

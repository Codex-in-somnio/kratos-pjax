<?php

define('KRATOS_VERSION', '0.4.0');

require_once(get_template_directory() . '/inc/core.php');
require_once(get_template_directory() . '/inc/shortcode.php');
require_once(get_template_directory() . '/inc/imgcfg.php');
require_once(get_template_directory() . '/inc/post.php');
require_once(get_template_directory() . '/inc/ua.php');
require_once(get_template_directory() . '/inc/widgets.php');
require_once(get_template_directory() . '/inc/smtp.php');
require_once(get_template_directory() . '/inc/logincfg.php');
require_once(get_template_directory() . '/inc/avatars.php');

function trim_words_keep_linebreak($text, $num_words)
{
    // https://developer.wordpress.org/reference/functions/wp_trim_words/
    if (strpos(_x('words', 'Word count type. Do not translate!'), 'characters') === 0 && preg_match('/^utf\-?8$/i', get_option('blog_charset'))) {
        $text = trim(preg_replace("/[\t ]+/", ' ', $text), ' ');
        preg_match_all('/./u', $text, $words_array);
        $words_array = array_slice($words_array[0], 0, $num_words + 1);
        $sep         = '';
    } else {
        $words_array = preg_split("/[\t ]+/", $text, $num_words + 1, PREG_SPLIT_NO_EMPTY);
        $sep         = ' ';
    }
    $more = __( '&hellip;' );
    if (count($words_array) > $num_words) {
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
        $excerpt = wp_strip_all_tags(get_the_content());
    }
    return wpautop(trim_words_keep_linebreak($excerpt, kratos_option('w_num')));
}

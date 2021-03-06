<?php if(kratos_option('side_bar')=='left_side'){ ?>
<aside id="kratos-widget-area" class="col-md-4 hidden-xs hidden-sm scrollspy">
    <div id="sidebar" class="affix-top">
        <?php dynamic_sidebar('sidebar_tool'); ?>
    </div>
</aside>
<?php } ?>
<section id="main" class='<?php echo (kratos_option('side_bar')=='center')?'col-md-12':'col-md-8'; ?>'>
    <?php if(have_posts()){the_post();update_post_caches($posts); ?>
    <article>
        <div class="kratos-hentry kratos-post-inner clearfix">
            <div class="kratos-status kratos-status-post">
            <i class="fa fa-refresh"></i>
                <div class="kratos-status-inner">
                    <header><?php the_content() ?></header>
                    <footer><?php echo get_the_date();echo get_the_date(' H:i'); ?> • <?php echo kratos_get_post_views();_e('次阅读','moedog'); ?> • <?php if(get_post_meta($post->ID,'love',true)){echo get_post_meta($post->ID,'love',true);}else{echo '0'; }_e('人点赞','moedog'); ?> • <?php comments_number('0','1','%');_e('条评论','moedog'); ?></footer>
                </div>
            </div>
            <footer class="kratos-entry-footer clearfix">
                <div class="post-like-donate text-center clearfix" id="post-like-donate">
                <?php if(kratos_option('post_like_donate')) echo '<a href="javascript:;" class="Donate"><i class="fa fa-bitcoin"></i> '.__('打赏','moedog').'</a>'; ?>
                   <a href="javascript:;" id="btn" data-action="love" data-id="<?php the_ID() ?>" class="Love<?php if(isset($_COOKIE['love_'.$post->ID])) echo ' done';?>"><i class="fa fa-thumbs-o-up"></i> <?php _e('点赞','moedog'); ?></a>
                <?php if(kratos_option('post_share')) {
                    echo '<a href="javascript:;" class="Share"><i class="fa fa-share-alt"></i> '.__('分享','moedog').'</a>';
                    require_once(get_template_directory().'/inc/share.php');
                } ?>
                </div>
            </footer>
        </div>
        <nav class="navigation post-navigation clearfix" role="navigation">
            <?php
            $prev_post = get_previous_post();
            if(!empty($prev_post)){ ?>
            <div class="nav-previous clearfix">
                <a title="<?php echo $prev_post->post_title;?>" href="<?php echo get_permalink($prev_post->ID); ?>">&lt; <?php _e('上一篇','moedog'); ?></a>
            </div>
            <?php }
            $next_post = get_next_post();
            if(!empty($next_post)){ ?>
            <div class="nav-next">
                <a title="<?php echo $next_post->post_title; ?>" href="<?php echo get_permalink($next_post->ID); ?>"><?php _e('下一篇','moedog'); ?> &gt;</a>
            </div>
            <?php } ?>
        </nav>
        <?php comments_template(); ?>
    </article>
    <?php } ?>
</section>
<?php if(kratos_option('side_bar')=='right_side'){ ?>
    <aside id="kratos-widget-area" class="col-md-4 hidden-xs hidden-sm scrollspy">
        <div id="sidebar" class="affix-top">
            <?php dynamic_sidebar('sidebar_tool'); ?>
        </div>
    </aside>
<?php } ?>
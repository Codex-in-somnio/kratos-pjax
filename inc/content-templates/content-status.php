<article class="kratos-hentry clearfix">
    <div class="kratos-status">
    <i class="fa fa-refresh"></i>
        <div class="kratos-status-inner">
            <header><?php the_content() ?></header>
            <footer>
                <?php echo get_the_date();echo get_the_date(' H:i'); ?> • 
                <?php echo kratos_get_post_views();_e('次阅读','moedog'); ?> • 
                <a href="javascript:;" data-action="love" data-id="<?php the_ID(); ?>" class="Love done">
                    <i class="fa fa-thumbs-o-up"></i>
                    <?php if(get_post_meta($post->ID,'love',true)){echo get_post_meta($post->ID,'love',true);}else{echo '0'; }_e('人点赞','moedog'); ?>
                </a> • 
                <a href="<?php the_permalink() ?>">
                    <i class="fa fa-commenting-o"></i>
                    <?php comments_number('0','1','%');_e('条评论','moedog'); ?>
                </a>
            </footer>
        </div>
    </div>
</article>
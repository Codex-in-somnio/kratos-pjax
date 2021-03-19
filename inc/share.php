<div class="share-wrap" style="display: none;">
    <div class="share-group">
        <a href="javascript:;" class="share-plain twitter" onclick="share_<?php echo get_the_ID(); ?>('qq');" rel="nofollow">
            <div class="icon-wrap">
                <i class="fa fa-qq"></i>
            </div>
        </a>
        <a href="javascript:;" class="share-plain weixin" onclick="share_<?php echo get_the_ID(); ?>('qzone');" rel="nofollow">
            <div class="icon-wrap">
                <i class="fa fa-star"></i>
            </div>
        </a>
        <a href="javascript:;" class="share-plain weibo" onclick="share_<?php echo get_the_ID(); ?>('weibo');" rel="nofollow">
            <div class="icon-wrap">
                <i class="fa fa-weibo"></i>
            </div>
        </a>
        <a href="javascript:;" class="share-plain facebook style-plain" onclick="share_<?php echo get_the_ID(); ?>('facebook');" rel="nofollow">
            <div class="icon-wrap">
                <i class="fa fa-facebook"></i>
            </div>
        </a>
        <a href="javascript:;" class="share-plain twitter style-plain" onclick="share_<?php echo get_the_ID(); ?>('twitter');" rel="nofollow">
            <div class="icon-wrap">
                <i class="fa fa-twitter"></i>
            </div>
        </a>
        <a href="javascript:;" class="share-plain weixin pop style-plain" rel="nofollow">
            <div class="icon-wrap">
                <i class="fa fa-weixin"></i>
            </div>
            <div class="share-int">
                <div class="qrcode" data-url="<?php the_permalink() ?>"></div>
                <p><?php _e('打开微信“扫一扫”，打开网页后点击屏幕右上角分享按钮','moedog'); ?></p>
            </div>
        </a>
        <a href="javascript:;" class="share-plain copylink pop" rel="nofollow">
            <div class="icon-wrap">
                <i class="fa fa-link"></i>
            </div>
            <div class="share-int">
                <div class="form-group" onclick="copyLink(this)">
                    <input class="form-control share-link-textfield" value="<?php echo get_permalink(); ?>" readonly="readonly">
                    <button type="button" class="form-control btn btn-primary">
                        <?php _e('点击复制本文链接','moedog'); ?>
                    </button>
                </div>
            </div>
        </a>
    </div>
    <script type="text/javascript">
    function share_<?php echo get_the_ID(); ?>(obj){
        var qqShareURL="http://connect.qq.com/widget/shareqq/index.html?";
        var weiboShareURL="http://service.weibo.com/share/share.php?";
        var qzoneShareURL="https://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?";
        var facebookShareURL="https://www.facebook.com/sharer/sharer.php?";
        var twitterShareURL="https://twitter.com/intent/tweet?";
        var host_url="<?php echo get_permalink(); ?>";
        var title='<?php  echo str_replace("%22","%2522",rawurlencode('【'.get_the_title().'】')); ?>';
        var qqtitle='<?php echo rawurlencode('【'.get_the_title().'】'); ?>';
        var excerpt='<?php echo rawurlencode(get_the_excerpt()); ?>';
        var wbexcerpt='<?php echo str_replace("%22","%2522",rawurlencode(get_the_excerpt())); ?>';
        var pic="<?php echo share_post_image(); ?>";
        var _URL;
        if(obj=="qq"){
            _URL=qqShareURL+"url="+host_url+"&title="+qqtitle+"&pics="+pic+"&desc=&summary="+excerpt+"&site=vtrois";
        }else if(obj=="weibo"){
            _URL=weiboShareURL+"url="+host_url+"&title="+title+wbexcerpt+"&pic="+pic;
        }else if(obj=="qzone"){
            _URL=qzoneShareURL+"url="+host_url+"&title="+qqtitle+"&pics="+pic+"&desc=&summary="+excerpt+"&site=vtrois";
        }else if(obj=="facebook"){
             _URL=facebookShareURL+"u="+host_url;
        }else if(obj=="twitter"){
             _URL=twitterShareURL+"text="+title+excerpt+"&url="+host_url;
        }
        window.open(_URL);
    }
    function copyLink(elem) {
        oncopy = document.body.oncopy;
        document.body.oncopy = undefined;
        $(elem).children('.share-link-textfield').select();
        document.execCommand("copy");
        addComment.createButterbar('已复制本文链接至剪贴板');
        document.body.oncopy = oncopy;
    }
    </script>
</div>
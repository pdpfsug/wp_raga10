<?php
/**
* Plugin Name: Share Post
* Plugin URI: http://dev.linksku.com/sharepost/
* Description: Adds sharing buttons to your WordPress blog. One of the best (if not the best) social bookmarking button plugin available on WordPress!
* Version: 2.1.5
* Author: Linksku
* Author URI: http://linksku.com/
* License: GPL
*/

/*********************************************************************
 * File: share-post.php
 * Author: Linksku
 * Contact: linksku@hotmail.com
 * Company: LinksKu [http://linksku.com/]
 * Date Created: Feb. 2011
 * Project Name: Share Post
 * Description:
 *        Adds sharing buttons to WordPress posts
 * Copyright © 2011 - LinksKu.com
 *********************************************************************/

if (!defined(SHAREPOST_INIT)) define('SHAREPOST_INIT', '2.1.5');
else return;

require('functions.php');
if(is_admin()){
	require('share-post-admin.php');
} 

function sharepost_header(){
if(!sharepost_check())return;
global $is_IE;
if(intval(substr(get_option('sharepost_top'),0,1))!=0 || intval(substr(get_option('sharepost_left'),0,1))!=0){
$relative = (get_option('sharepost_relative') ? 'html body *{position:static !important;}' : '');
}
$display=($is_IE ? 'inline' : 'inline-block');

echo '<style type="text/css">'.$relative.'
.sharepost{clear:both;width:100%;'.(get_option('sharepost_button_send') ? '' : 'overflow:hidden;').'margin:0;padding:0;}
.sharepost *{display:inline-block;vertical-align:top !important;}
.sharepost li{display:'.$display.';max-height:23px;min-height:20px;min-width:30px;max-width:200px;vertical-align:top;overflow:hidden;padding:5px;margin:0 20px 0 0;list-style-type:none;}
.sharepost iframe,.sharepost object{overflow:hidden;}
.sharepost a{color:transparent;}
.sharepost .spdelicious a.delicious-button{color:#333;}
.sharepost .splike iframe,.sharepost .splike object{border:none;overflow:hidden;width:'.(get_option('sharepost_like_width')>50 ? get_option('sharepost_like_width') : '80').'px;height:25px;'.(get_option('sharepost_0_likes')==1 ? 'background:transparent url('.get_bloginfo('wpurl').'/wp-content/plugins/share-post/like.png) no-repeat 48px 0;' : '').'}
.sharepost .splink iframe,.sharepost .splink object{border:none;overflow:hidden;width:80px;height:20px;}
.sharepost .spreddit iframe,.sharepost .spreddit object{width:120px;height:22px;}
.sharepost .spretweet{width:91px;}
.sharepost .spretweet iframe,.sharepost .spretweet object{width:110px;height:22px;}
.sharepost .spsend{overflow:visible;}
.sharepost .spstumble iframe,.sharepost .spstumble object{border:none;overflow:hidden;width:74px;height:18px;}
.sharepost .spshare .fb_share_count_nub_right{background:transparent url('.get_bloginfo('wpurl').'/wp-content/plugins/share-post/share.png) no-repeat right 5px !important;}
.sharepost .sptweet iframe,.sharepost .sptweet object{width:120px;height:22px;}
.sharepost .sptweet{width:91px;}
.sharepost .spybuzz a{max-width:140px;}
'.get_option('sharepost_styles').'
</style>';

// Delicious requires JQuery
if(get_option('sharepost_button_delicious'))
wp_enqueue_script("jquery");
}

function sharepost_footer(){
if(!sharepost_check()){
  if(get_option('sharepost_thanks'))
    echo ' <a href="http://dev.linksku.com/sharepost/" title="Add social bookmarking buttons to your website!">Sharing Buttons</a> by <a href="http://linksku.com/" title="Share links online">Linksku</a>';
  return;
}

if(get_option('sharepost_thanks'))
  echo ' <a href="http://dev.linksku.com/sharepost/" title="Add social bookmarking buttons to your website!">Sharing Buttons</a> by <a href="http://linksku.com/" title="Share links online">Linksku</a>';

echo '<script type="text/javascript">';
if(get_option('sharepost_button_addthis'))
  echo '(function(){var s=document.createElement("SCRIPT"),s1=document.getElementsByTagName("SCRIPT")[0];s.type="text/javascript";s.async=true;s.src="http://s7.addthis.com/js/250/addthis_widget.js";s1.parentNode.insertBefore(s,s1)})();';
if(get_option('sharepost_button_buzz'))
  echo '(function(){var s=document.createElement("SCRIPT"),s1=document.getElementsByTagName("SCRIPT")[0];s.type="text/javascript";s.async=true;s.src="http://www.google.com/buzz/api/button.js";s1.parentNode.insertBefore(s,s1)})();';
if(get_option('sharepost_button_delicious'))
	echo '(function(){var s=document.createElement("SCRIPT"),s1=document.getElementsByTagName("SCRIPT")[0];s.type="text/javascript";s.async=true;s.src="http://delicious-button.googlecode.com/files/jquery.delicious-button-1.0.min.js";s1.parentNode.insertBefore(s,s1)})();';
if(get_option('sharepost_button_digg'))
	echo '(function(){var s=document.createElement("SCRIPT"),s1=document.getElementsByTagName("SCRIPT")[0];s.type="text/javascript";s.async=true;s.src="http://widgets.digg.com/buttons.js";s1.parentNode.insertBefore(s,s1)})();';
if(get_option('sharepost_button_linkedin'))
	echo '(function(){var s=document.createElement("SCRIPT"),s1=document.getElementsByTagName("SCRIPT")[0];s.type="text/javascript";s.async=true;s.src="http://platform.linkedin.com/in.js";s1.parentNode.insertBefore(s,s1)})();';
if(get_option('sharepost_button_send'))
	echo '(function(){var s=document.createElement("SCRIPT"),s1=document.getElementsByTagName("SCRIPT")[0];s.type="text/javascript";s.async=true;s.src="http://connect.facebook.net/en_US/all.js#xfbml=1";s1.parentNode.insertBefore(s,s1)})();';
if(get_option('sharepost_button_share'))
	echo '(function(){var s=document.createElement("SCRIPT"),s1=document.getElementsByTagName("SCRIPT")[0];s.type="text/javascript";s.async=true;s.src="http://static.ak.fbcdn.net/connect.php/js/FB.Share";s1.parentNode.insertBefore(s,s1)})();';
if(get_option('sharepost_button_sharethis'))
	echo '(function(){var s=document.createElement("SCRIPT"),s1=document.getElementsByTagName("SCRIPT")[0];s.type="text/javascript";s.async=true;s.src="http://w.sharethis.com/button/buttons.js";s1.parentNode.insertBefore(s,s1)})();';
echo '</script>';
}

function sharepost_buttons($content=''){
if(!sharepost_check())return $content;

if(get_option('sharepost_cloak') && sharepost_bot() && !is_user_logged_in()){
  if(get_option('sharepost_template')){
    echo '<a href="http://dev.linksku.com/sharepost/index.htm" title="Social bookmarking button WordPress Plugin">Social Buttons</a> by <a href="http://linksku.com/" title="Discover the best links on the web">Linksku - Share links online</a>';
    return;
  } else {
    return '<a href="http://dev.linksku.com/sharepost/index.htm" title="Social bookmarking button WordPress Plugin">Social Buttons</a> by <a href="http://linksku.com/" title="Discover the best links on the web">Linksku</a>'.$content;
  }
}
  
global $is_IE,$is_chrome,$is_windows;
$buttons = array(
  'addthis' => (intval(get_option('sharepost_button_addthis'))>0 ? get_option('sharepost_button_addthis') : false ),
  'buzz' => (intval(get_option('sharepost_button_buzz'))>0 ? get_option('sharepost_button_buzz') : false ),
  'delicious' => (intval(get_option('sharepost_button_delicious'))>0 ? get_option('sharepost_button_delicious') : false ),
  'digg' => (intval(get_option('sharepost_button_digg'))>0 ? get_option('sharepost_button_digg') : false ),
  'like' => (intval(get_option('sharepost_button_like'))>0 ? get_option('sharepost_button_like') : false ),
  'link' => (intval(get_option('sharepost_button_link'))>0 ? get_option('sharepost_button_link') : false ),
  'linkedin' => (intval(get_option('sharepost_button_linkedin'))>0 ? get_option('sharepost_button_linkedin') : false ),
  'reddit' => (intval(get_option('sharepost_button_reddit'))>0 ? get_option('sharepost_button_reddit') : false ),
  'retweet' => (intval(get_option('sharepost_button_retweet'))>0 ? get_option('sharepost_button_retweet') : false ),
  'send' => (intval(get_option('sharepost_button_send'))>0 ? get_option('sharepost_button_send') : false ),
  'share' => (intval(get_option('sharepost_button_share'))>0 ? get_option('sharepost_button_share') : false ),
  'sharethis' => (intval(get_option('sharepost_button_sharethis'))>0 ? get_option('sharepost_button_sharethis') : false ),
  'stumble' => (intval(get_option('sharepost_button_stumble'))>0 ? get_option('sharepost_button_stumble') : false ),
  'tweet' => (intval(get_option('sharepost_button_tweet'))>0 ? get_option('sharepost_button_tweet') : false ),
  'ybuzz' => (intval(get_option('sharepost_button_ybuzz'))>0 ? get_option('sharepost_button_ybuzz') : false )
);
$spbuttons = array();

$output='<!-- Share Post plugin by Linksku -->
<ul class="sharepost">';

if(intval($content)>0 && get_option('sharepost_template'))
  $purl = get_permalink($content);
else
  $purl = get_permalink();
$url = rawurlencode($purl);

// gets title
if(intval($content)>0 && get_option('sharepost_template'))
  $title = get_the_title($content);
else
  $title = get_the_title();

// Addthis
if($buttons['addthis']){
$spbuttons['addthis']='<li class="spaddthis"><div class="addthis_toolbox addthis_default_style"><a class="addthis_counter addthis_pill_style" addthis:url="'.$purl.'"></a></div></li>';
}

// Buzz
if($buttons['buzz']){
$spbuttons['buzz']='<li class="spbuzz"><a title="Post to Google Buzz" class="google-buzz-button" href="http://www.google.com/buzz/post" data-button-style="small-count" data-url="'.$purl.'"></a></li>';
}

// Delicious
if($buttons['delicious']){
$spbuttons['delicious']='<li class="spdelicious"><a class="delicious-button" href="http://delicious.com/save"><!-- {url:"'.$purl.'",title:"'.$title.'",button:"wide"} -->Delicious</a></li>';
}

// Digg
if($buttons['digg']){
$spbuttons['digg']='<li class="spdigg"><span class="digg-button"><a class="DiggThisButton DiggCompact" href="http://digg.com/submit?url='.$url.'&amp;related=no"></a></span></li>';
}

// Like
if($buttons['like']){
$fburl= $url.'&amp;layout=button_count&amp;show_faces=false&amp;width=80&amp;action=like&amp;colorscheme=light&amp;font=arial';
if (!$is_IE && (!$is_chrome || $is_windows))
$spbuttons['like']='<li class="splike"><object data="http://www.facebook.com/plugins/like.php?href='.$fburl.'" type="text/html"></object></li>';
else
$spbuttons['like']='<li class="splike"><iframe src="http://www.facebook.com/plugins/like.php?href='.$fburl.'" scrolling="no" frameborder="0" allowTransparency="true"></iframe></li>';
}

// Link
if($buttons['link']){
if (!$is_IE && (!$is_chrome || $is_windows))
$spbuttons['link']='<li class="splink"><object data="http://linksku.com/button.php?url='.$url.'"></object></li>';
else
$spbuttons['link']='<li class="splink"><iframe src="http://linksku.com/button.php?url='.$url.'" scrolling="no" frameborder="0" allowTransparency="true"></iframe></li>';
}

// LinkedIn
if($buttons['linkedin']){
$spbuttons['linkedin']='<li class="splinkedin"><script type="in/share" data-url="'.$purl.'" data-counter="right"></script></li>';
}

// Reddit
if($buttons['reddit']){
$spbuttons['reddit']='<li class="spreddit"><iframe src="http://www.reddit.com/static/button/button1.html?width=120&amp;url='.$url.'" height="22" width="120" scrolling="no" frameborder="0" allowTransparency="true"></iframe></li>';
}

// ReTweet
if($buttons['retweet']){
if (!$is_IE && (!$is_chrome || $is_windows))
$spbuttons['retweet']='<li class="spretweet"><object data="http://api.tweetmeme.com/button.js?url='.$url.'&amp;style=compact&amp;o='.rawurlencode(sharepost_url()).'&amp;b=1"></object></li>';
else
$spbuttons['retweet']='<li class="spretweet"><iframe src="http://api.tweetmeme.com/button.js?url='.$url.'&amp;style=compact&amp;o='.rawurlencode(sharepost_url()).'&amp;b=1" scrolling="no" frameborder="0" allowTransparency="true"></iframe></li>';
}
 
// Send
if($buttons['send']){
$spbuttons['send']='<li class="spsend"><fb:send href="'.$purl.'" font="arial" class="splike"></fb:send></li>';
}

// Share
if($buttons['share']){
$spbuttons['share']='<li class="spshare"><a share_url="'.$purl.'" href="http://www.facebook.com/sharer.php" name="fb_share" type="button_count">Share</a></li>';
}

// ShareThis
if($buttons['sharethis']){
$spbuttons['sharethis']='<li class="spsharethis"><span class="st_sharethis_hcount" displayText="Share" st_url="'.$purl.'"></span></li>';
}

// StumbleUpon
if($buttons['stumble']){
if (!$is_IE && (!$is_chrome || $is_windows))
$spbuttons['stumble']='<li class="spstumble"><object data="http://www.stumbleupon.com/badge/embed/1/?url='.$url.'"></object></li>';
else
$spbuttons['stumble']='<li class="spstumble"><iframe src="http://www.stumbleupon.com/badge/embed/1/?url='.$url.'" scrolling="no" frameborder="0" allowTransparency="true"></iframe></li>';
}

// Twitter
if($buttons['tweet']){
$twitterTitle = rawurlencode($title.(strlen(trim(get_option('sharepost_twitter_username')))>0 ? ' via @'.trim(get_option('sharepost_twitter_username')) : ''));
if (!$is_IE && (!$is_chrome || $is_windows))
$spbuttons['tweet']='<li class="sptweet"><object data="http://platform0.twitter.com/widgets/tweet_button.html?_=1298252536917&amp;count=horizontal&amp;lang=en&amp;text='.$twitterTitle.'&amp;url='.$url.'"></object></li>';
else
$spbuttons['tweet']='<li class="sptweet"><iframe src="http://platform0.twitter.com/widgets/tweet_button.html?_=1298252536917&amp;count=horizontal&amp;lang=en&amp;text='.$twitterTitle.'&amp;url='.$url.'" scrolling="no" frameborder="0" allowTransparency="true"></iframe></li>';
}

// Yahoo! Buzz
if($buttons['ybuzz']){
$spbuttons['ybuzz']='<li class="spybuzz"><script type="text/javascript" src="http://d.yimg.com/ds/badge2.js" badgetype="small-votes"></script></li>';
}

asort($buttons);
foreach($buttons as $b=>$v){
if($v==false)
continue;

if(isset($spbuttons[$b]))
$output.=$spbuttons[$b];
}

$output.='</ul>
<!-- / Share Post plugin by Linksku -->';

if(get_option('sharepost_template')){
echo $output;
return;
}

if(get_option('sharepost_display_where')=='top')
return $output.$content;
return $content.$output;
}

add_action('wp_footer','sharepost_footer',1);
add_action('wp_head','sharepost_header');
if(!get_option('sharepost_template'))
add_filter('the_content','sharepost_buttons');

?>
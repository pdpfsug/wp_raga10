<?php
// create custom plugin settings menu
add_action('admin_menu', 'sharepost_create_menu');
add_filter('plugin_action_links', 'plugin_links', 10, 2 );


function register_sharepost() {

//register our settings
register_setting( 'sharepost', 'sharepost_version');
register_setting( 'sharepost', 'sharepost_button_addthis');
register_setting( 'sharepost', 'sharepost_button_buzz');
register_setting( 'sharepost', 'sharepost_button_delicious');
register_setting( 'sharepost', 'sharepost_button_digg');
register_setting( 'sharepost', 'sharepost_button_like');
register_setting( 'sharepost', 'sharepost_button_link');
register_setting( 'sharepost', 'sharepost_button_linkedin');
register_setting( 'sharepost', 'sharepost_button_reddit');
register_setting( 'sharepost', 'sharepost_button_retweet');
register_setting( 'sharepost', 'sharepost_button_send');
register_setting( 'sharepost', 'sharepost_button_share');
register_setting( 'sharepost', 'sharepost_button_sharethis');
register_setting( 'sharepost', 'sharepost_button_stumble');
register_setting( 'sharepost', 'sharepost_button_tweet');
register_setting( 'sharepost', 'sharepost_button_ybuzz');
register_setting( 'sharepost', 'sharepost_template');
register_setting( 'sharepost', 'sharepost_display_post');
register_setting( 'sharepost', 'sharepost_display_page');
register_setting( 'sharepost', 'sharepost_display_home');
register_setting( 'sharepost', 'sharepost_display_category');
register_setting( 'sharepost', 'sharepost_display_search');
register_setting( 'sharepost', 'sharepost_display_archive');
register_setting( 'sharepost', 'sharepost_display_all');
register_setting( 'sharepost', 'sharepost_display_where');
register_setting( 'sharepost', 'sharepost_styles');
register_setting( 'sharepost', 'sharepost_cloak');
register_setting( 'sharepost', 'sharepost_0_likes'); 
register_setting( 'sharepost', 'sharepost_like_width');
register_setting( 'sharepost', 'sharepost_twitter_username');
register_setting( 'sharepost', 'sharepost_thanks');

add_option( 'sharepost_button_addthis', '0' );
add_option( 'sharepost_button_buzz', '0' );
add_option( 'sharepost_button_delicious', '0' );
add_option( 'sharepost_button_digg', '' );
add_option( 'sharepost_button_like', '1' );
add_option( 'sharepost_button_link', '3' );
add_option( 'sharepost_button_linkedin', '0' );
add_option( 'sharepost_button_reddit', '0' );
add_option( 'sharepost_button_retweet', '0' );
add_option( 'sharepost_button_send', '0' );
add_option( 'sharepost_button_share', '0' );
add_option( 'sharepost_button_sharethis', '0' );
add_option( 'sharepost_button_stumble', '0' );
add_option( 'sharepost_button_tweet', '2' );
add_option( 'sharepost_button_ybuzz', '0' );
add_option( 'sharepost_template', 0 );
add_option( 'sharepost_display_post', 1 );
add_option( 'sharepost_display_page', 0 );
add_option( 'sharepost_display_home', 1 );
add_option( 'sharepost_display_category', 0 );
add_option( 'sharepost_display_search', 0 );
add_option( 'sharepost_display_archive', 0 );
add_option( 'sharepost_display_all', 0 );
add_option( 'sharepost_display_where', 'bottom' );
add_option( 'sharepost_styles', '.sharepost li{margin-right:20px;}' );
add_option( 'sharepost_cloak', 1 );
add_option( 'sharepost_0_likes', 1 );
add_option( 'sharepost_like_width', 1 );
add_option( 'sharepost_twitter_username', '' );
add_option( 'sharepost_thanks', 0 );

update_option( 'sharepost_version', SHAREPOST_INIT );
}


function sharepost_admin(){
?>
<style type="text/css">
#wrap{min-width:700px;}
#top-wrap{overflow:hidden;margin-top:1em;}
#donate-wrap{float:right;width:28%;min-height:100px;padding:15px 1.5%;border:1px solid #ddd;-webkit-border-radius:8px;-moz-border-radius:8px;border-radius:8px;}
#support-sharepost{font-size:1.4em;font-weight:700;margin-bottom:15px;}
#donate-wrap p{line-height:1.5em;text-indent:15px;}
#paypal{margin:15px 0;width:100%;text-align:center;}
input[type="image"]{width:92px;margin:0 auto;}
#leojiang{list-style-type:none;overflow:hidden;margin:2em 10px;}
ul.links{margin:2em 10px;}

#button-table-wrap{border:1px solid #ddd;margin:0 2% 20px 1px;width:66%;float:left;-webkit-border-radius:8px;-moz-border-radius:8px;border-radius:8px;}
#button-table{margin:0;}
#button-table tr{border-top:1px solid #eee;max-width:100%;}
#button-table tr,#button-table td{height:30px;overflow:hidden;}
#button-table .th{background:#d9d9d9;background:-moz-linear-gradient(bottom,#d7d7d7,#efefef);background:-webkit-gradient(linear,left bottom,left top,from(#d7d7d7),to(#efefef));font-weight:700;-webkit-border-top-left-radius:11px;-webkit-border-top-right-radius:11px;-moz-border-radius-topleft:11px;-moz-border-radius-topright:11px;border-top-left-radius:11px;border-top-right-radius:11px;}
#button-table th{padding-left:15px;}
#button-table tr td:first-child,#button-table tr th:first-child{width:7em;}
#button-table td{padding:5px 8px;min-width:6em;}
#button-table input[type="text"]{width:5em;text-align:center;}
.splike{border:none;overflow:hidden;width:78px;height:21px;}
.splink{border:none;overflow:hidden;width:79px;height:20px;}
.spsend{border:none;width:78px;height:21px;}
.spstumble{border:none;overflow:hidden;width:74px;height:18px;}
.spretweet{width:90px;height:20px;}
.sptweet{width:110px;height:20px;}

#bottom-wrap td{padding-bottom:50px;}
.info{font-size:11px;color:#555;}
.code{background-color:#dedede;}
#sharepost_styles{width:80%;height:200px;padding:5px;line-height:1.3em;font-size:1.1em;font-family:arial;}
.js{color:red;}
.jquery{color:blue;}
.html{color:green;}
.glitch{color:brown;}
</style>
<div class="wrap">
  <h2>Share Post Options</h2>
  <span class="info">If you don&#39;t know what to do, simply keep the default settings.</span>
<div id="top-wrap">

<div id="donate-wrap">
  <div id="support-sharepost">Support Share Post</div>
  <p>Hello Share Post user, thank you for choosing Share Post!</p>
  <p>My name is Leo Jiang and I am a 15 year developer. I made Share Post in my spare time after school. If Share Post helped you to improve your blog, please donate! <img src="../wp-includes/images/smilies/icon_smile.gif" alt=":)" width="15px" height="15px" /></p>
  <form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="paypal">
  <div>
    <input type="hidden" name="cmd" value="_donations" />
    <input type="hidden" name="business" value="leojiang000@gmail.com" />
    <input type="hidden" name="lc" value="US" />
    <input type="hidden" name="item_name" value="Linksku" />
    <input type="hidden" name="no_note" value="0" />
    <input type="hidden" name="currency_code" value="USD" />
    <input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest" />
    <input type="image" src="https://www.paypalobjects.com/WEBSCR-640-20110401-1/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" />
    <img alt="" border="0" src="https://www.paypalobjects.com/WEBSCR-640-20110306-1/en_US/i/scr/pixel.gif" width="1" height="1" />
  </div>
  </form>
  <ul id="leojiang">
    <li><a href="http://www.facebook.com/pages/Linksku-Share-links-articles-or-jokes/102422753142997" target="_blank">Follow me on Facebook!</a></li>
    <li><a href="http://twitter.com/Linksku" target="_blank">Follow me on Twitter!</a></li>
  </ul>
  <ul class="links">
    <li><a href="http://dev.linksku.com/sharepost/">Plugin page</a></li>
    <li><a href="http://dev.linksku.com/sharepost/faq.htm">FAQ</a></li>
    <li><a href="http://dev.linksku.com/sharepost/support.htm">Support</a></li>
    <li><a href="http://linksku.com/">My homepage</a></li>
  </ul>
</div>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<div id="button-table-wrap">
  <table class="form-table" id="button-table">
    <tbody>
      <tr valign="top" class="th">
        <th scope="row">#</th>
        <th scope="row">Button</th>
        <th scope="row">Demo</th>
      </tr>
      <tr>
        <td>
          <input type="text" name="sharepost_button_addthis" value="<?php if(intval(get_option('sharepost_button_addthis'))>0) echo get_option('sharepost_button_addthis') ?>" />
        </td>
        <td>AddThis <span class="js">*</span> <span class="html">*</span> <span class="glitch">*</span></td>
        <td>
          <div class="addthis_toolbox addthis_default_style">
            <a class="addthis_counter addthis_pill_style" addthis:url="http%3A%2F%2Fdev.linksku.com%2Fsharepost%2F"></a>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <input type="text" name="sharepost_button_buzz" value="<?php if(intval(get_option('sharepost_button_buzz'))>0) echo get_option('sharepost_button_buzz') ?>" />
        </td>
        <td>Buzz <span class="js">*</span></td>
        <td>
          <a title="Post to Google Buzz" class="google-buzz-button" href="http://www.google.com/buzz/post" data-button-style="small-count" data-url="http://dev.linksku.com/sharepost/"></a>
        </td>
      </tr>
      <tr>
        <td>
          <input type="text" name="sharepost_button_delicious" value="<?php if(intval(get_option('sharepost_button_delicious'))>0) echo get_option('sharepost_button_delicious') ?>" />
        </td>
        <td>Delicious <span class="js">*</span> <span class="jquery">*</span></td>
        <td>
          <a class="delicious-button" href="http://delicious.com/save"><!-- {url:"http://dev.linksku.com/sharepost/",title:"Share Post | Free WordPress Plugin",button:"wide"} -->Delicious</a>
        </td>
      </tr>
      <tr>
        <td>
          <input type="text" name="sharepost_button_digg" value="<?php if(intval(get_option('sharepost_button_digg'))>0) echo get_option('sharepost_button_digg') ?>" />
        </td>
        <td>Digg <span class="js">*</span></td>
        <td>
          <span class="digg-button">
            <a class="DiggThisButton DiggCompact" href="http://digg.com/submit?url=http%3A%2F%2Fdev.linksku.com%2Fsharepost%2F&amp;related=no"></a>
          </span>
        </td>
      </tr>
      <tr>
        <td>
          <input type="text" name="sharepost_button_like" value="<?php if(intval(get_option('sharepost_button_like'))>0) echo get_option('sharepost_button_like') ?>" />
        </td>
        <td>Like</td>
        <td>
          <iframe class="splike" src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fdev.linksku.com%2Fsharepost%2F&amp;layout=button_count&amp;show_faces=false&amp;width=78&amp;action=like&amp;colorscheme=light&amp;font=arial" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
        </td>
      </tr>
      <tr>
        <td>
          <input type="text" name="sharepost_button_link" value="<?php if(intval(get_option('sharepost_button_link'))>0) echo get_option('sharepost_button_link') ?>" />
        </td>
        <td>Link</td>
        <td>
          <iframe class="splink" src="http://linksku.com/button.php?url=http%3A%2F%2Fdev.linksku.com%2Fsharepost%2F" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
        </td>
      </tr>
      <tr>
        <td>
          <input type="text" name="sharepost_button_linkedin" value="<?php if(intval(get_option('sharepost_button_linkedin'))>0) echo get_option('sharepost_button_linkedin') ?>" />
        </td>
        <td>LinkedIn <span class="js">*</span> <span class="html">*</span></td>
        <td>
          <script type="text/javascript" src="http://platform.linkedin.com/in.js"></script><script type="in/share" data-url="http://dev.linksku.com/sharepost/" data-counter="right"></script>
        </td>
      </tr>
      <tr>
        <td>
          <input type="text" name="sharepost_button_reddit" value="<?php if(intval(get_option('sharepost_button_reddit'))>0) echo get_option('sharepost_button_reddit') ?>" />
        </td>
        <td>Reddit <span class="html">*</span></td>
        <td>
          <iframe src="http://www.reddit.com/static/button/button1.html?width=120&amp;url=http%3A%2F%2Fdev.linksku.com%2Fsharepost%2F" height="22" width="120" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
        </td>
      </tr>
      <tr>
        <td>
          <input type="text" name="sharepost_button_retweet" value="<?php if(intval(get_option('sharepost_button_retweet'))>0) echo get_option('sharepost_button_retweet') ?>" />
        </td>
        <td>ReTweet</td>
        <td>
          <iframe class="spretweet" src="http://api.tweetmeme.com/button.js?url=http%3A%2F%2Fdev.linksku.com%2Fsharepost%2F&amp;style=compact&amp;o=<?php echo urlencode(sharepost_url()); ?>&amp;b=1" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
        </td>
      </tr>
      <tr style="overflow:visible;">
        <td>
          <input type="text" name="sharepost_button_send" value="<?php if(intval(get_option('sharepost_button_send'))>0) echo get_option('sharepost_button_send') ?>" />
        </td>
        <td>Send <span class="js">*</span> <span class="html">*</span> <span class="glitch">*</span></td>
        <td style="overflow:visible;">
          <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
          <fb:send href="http://linksku.com" font="arial" class="spsend"></fb:send>
        </td>
      </tr>
      <tr>
        <td>
          <input type="text" name="sharepost_button_share" value="<?php if(intval(get_option('sharepost_button_share'))>0) echo get_option('sharepost_button_share') ?>" />
        </td>
        <td>Share <span class="js">*</span> <span class="html">*</span></td>
        <td>
          <a share_url='http%3A%2F%2Fdev.linksku.com%2Fsharepost%2F' href='http://www.facebook.com/sharer.php' name='fb_share' type='button_count'>Share</a>
        </td>
      </tr>
      <tr>
        <td>
          <input type="text" name="sharepost_button_sharethis" value="<?php if(intval(get_option('sharepost_button_sharethis'))>0) echo get_option('sharepost_button_sharethis') ?>" />
        </td>
        <td>Sharethis <span class="js">*</span> <span class="html">*</span> <span class="glitch">*</span></td>
        <td>
          <span class="st_sharethis_hcount" displayText="Share" st_url="http%3A%2F%2Fdev.linksku.com%2Fsharepost%2F"></span>
        </td>
      </tr>
      <tr>
        <td>
          <input type="text" name="sharepost_button_stumble" value="<?php if(intval(get_option('sharepost_button_stumble'))>0) echo get_option('sharepost_button_stumble') ?>" />
        </td>
        <td>Stumble</td>
        <td>
          <iframe class="spstumble" src="http://www.stumbleupon.com/badge/embed/1/?url=http%3A%2F%2Fdev.linksku.com%2Fsharepost%2F" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
        </td>
      </tr>
      <tr>
        <td>
          <input type="text" name="sharepost_button_tweet" value="<?php if(intval(get_option('sharepost_button_tweet'))>0) echo get_option('sharepost_button_tweet') ?>" />
        </td>
        <td>Tweet</td>
        <td>
          <iframe class="sptweet" src="http://platform0.twitter.com/widgets/tweet_button.html?_=1298252536917&amp;count=horizontal&amp;lang=en&amp;text=Share%20Post%20%7C%20Free%20WordPress%20Plugin&amp;url=http%3A%2F%2Fdev.linksku.com%2Fsharepost%2F" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
        </td>
      </tr>
      <tr>
        <td>
          <input type="text" name="sharepost_button_ybuzz" value="<?php if(intval(get_option('sharepost_button_ybuzz'))>0) echo get_option('sharepost_button_ybuzz') ?>" />
        </td>
        <td>Yahoo! Buzz <span class="js">*</span> <span class="html">*</span> <span class="glitch">*</span></td>
        <td>
          <script type="text/javascript">
            yahooBuzzArticleId='http%3A%2F%2Fdev.linksku.com%2Fsharepost%2F';
          </script>
          <script type="text/javascript" src="http://d.yimg.com/ds/badge2.js" badgetype="small-votes"></script>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <span class="info">
            Leave the buttons that you don&#39;t want blank.
            <br />
            <span class="js">*</span> requires Javascript
            <br />
            <span class="jquery">*</span> requires JQuery
            <br />
            <span class="html">*</span> breaks HTML validation
            <br />
            <span class="glitch">*</span> possibly glitchy
          </span>
        </td>
      </tr>
    </tbody>
  </table>
</div>
</div>
<div id="bottom-wrap">
  <table class="form-table">
     <tr valign="top">
       <th scope="row">Pages to display on</th>
       <td>
        <input type="checkbox" value="1" name="sharepost_display_post"<?php if(get_option('sharepost_display_post')) echo ' checked="checked"'; ?> /> Post
        <br />
        <input type="checkbox" value="1" name="sharepost_display_page"<?php if(get_option('sharepost_display_page')) echo ' checked="checked"'; ?> /> Page
        <br />
        <input type="checkbox" value="1" name="sharepost_display_home"<?php if(get_option('sharepost_display_home')) echo ' checked="checked"'; ?> /> Homepage
        <br />
        <input type="checkbox" value="1" name="sharepost_display_category"<?php if(get_option('sharepost_display_category')) echo ' checked="checked"'; ?> /> Category
        <br />
        <input type="checkbox" value="1" name="sharepost_display_search"<?php if(get_option('sharepost_display_search')) echo ' checked="checked"'; ?> /> Search
        <br />
        <input type="checkbox" value="1" name="sharepost_display_archive"<?php if(get_option('sharepost_display_archive')) echo ' checked="checked"'; ?> /> Archive
        <br />
        <input type="checkbox" value="1" name="sharepost_display_all"<?php if(get_option('sharepost_display_all')) echo ' checked="checked"'; ?> /> All Pages
       </td>
     </tr>
     <tr valign="top">
       <th scope="row">Where to display</th>
       <td>
        <input type="radio" value="top" name="sharepost_display_where"<?php if(get_option('sharepost_display_where')=='top') echo ' checked="checked"'; ?> /> Top of post
        <br />
        <input type="radio" value="bottom" name="sharepost_display_where"<?php if(get_option('sharepost_display_where')=='bottom') echo ' checked="checked"'; ?> /> Bottom of post
       </td>
     </tr>
     <tr valign="top">
        <th scope="row">Custom styles</th>
        <td><textarea name="sharepost_styles" id="sharepost_styles" cols="50" rows="8"><?php echo (get_option('sharepost_styles') ? get_option('sharepost_styles') : ''); ?></textarea>
        <br />
       <span class="info">Use <span class="code">#sharepost</span> for the container of the buttons, <span class="code">#sharepost li</span> for each button, and <span class="code">#sharepost li.sp[buttonname]</span> for specific buttons.</span>
       </td>
     </tr>
     <tr valign="top">
        <th scope="row">Specific button options</th>
        <td>
        Like button 0 Likes feature: <input type="checkbox" value="1" name="sharepost_0_likes"<?php if(get_option('sharepost_0_likes')) echo ' checked="checked"'; ?> />
        <br />
        Like button width (if your blog isn't in English): <input type="text" value="<?php echo (get_option('sharepost_like_width') ? get_option('sharepost_like_width') : ''); ?>" name="sharepost_like_width" style="width:3em;" />px
        <br />
        Twitter username for @Mention: <input type="text" value="<?php echo (get_option('sharepost_twitter_username') ? get_option('sharepost_twitter_username') : ''); ?>" name="sharepost_twitter_username" />
       </td>
     </tr>     
     <tr valign="top">
        <th scope="row">Hide buttons from bots</th>
        <td><input type="checkbox" value="1" name="sharepost_cloak"<?php if(get_option('sharepost_cloak')) echo ' checked="checked"'; ?> /> Hide buttons from bots and crawlers
        <br />
       <span class="info">Recommended. This will increase the load time of your blog for bots that will not use the buttons.</span>
       </td>
     </tr>
     <tr valign="top">
       <th scope="row">Manually insert buttons in template</th>
       <td>
         <input type="checkbox" value="1" name="sharepost_template"<?php if(get_option('sharepost_template')) echo ' checked="checked"'; ?> /> Enable
         <br />
         <span class="info">If you would like to manually add the buttons into your template, add <span class="code">&lt;?php sharepost_buttons(); ?&gt;</span> (inside the Loop) or <span class="code">&lt;?php sharepost_buttons($post_id); ?&gt;</span> (outside the Loop)</span>
       </td>
     </tr>
     <tr valign="top">
       <th scope="row">Like this plugin?</th>
        <td>
          Link to <a href="http://wordpress.org/extend/plugins/share-post/" title="WordPress plugin page">Share Post</a> in your footer! <input type="checkbox" value="1" name="sharepost_thanks"<?php if(get_option('sharepost_thanks')) echo ' checked="checked"'; ?> />
       </td>
     </tr>
     <tr valign="top">
       <th scope="row"></th>
        <td>
          <input type="hidden" name="action" value="update" />
          <input type="hidden" name="page_options" value="sharepost_button_addthis,sharepost_button_buzz,sharepost_button_delicious,sharepost_button_digg,sharepost_button_like,sharepost_button_link,sharepost_button_linkedin,sharepost_button_reddit,sharepost_button_retweet,sharepost_button_send,sharepost_button_share,sharepost_button_sharethis,sharepost_button_stumble,sharepost_button_tweet,sharepost_button_ybuzz,sharepost_template,sharepost_display_post,sharepost_display_page,sharepost_display_home,sharepost_display_category,sharepost_display_search,sharepost_display_archive,sharepost_display_all,sharepost_display_where,sharepost_styles,sharepost_cloak,sharepost_0_likes,sharepost_like_width,sharepost_twitter_username,sharepost_thanks" />
          <p class="submit">
            <input type="submit" class="button-primary" value="Save Changes" />
          </p>
        </td>
     </tr>
  </table>
</div>
</form>
</div>
<script type="text/javascript">
(function(){var s=document.createElement("SCRIPT"),s1=document.getElementsByTagName("SCRIPT")[0];s.type="text/javascript";s.async=true;s.src="http://s7.addthis.com/js/250/addthis_widget.js";s1.parentNode.insertBefore(s,s1)})();
(function(){var s=document.createElement("SCRIPT"),s1=document.getElementsByTagName("SCRIPT")[0];s.type="text/javascript";s.async=true;s.src="http://www.google.com/buzz/api/button.js";s1.parentNode.insertBefore(s,s1)})();
(function(){var s=document.createElement("SCRIPT"),s1=document.getElementsByTagName("SCRIPT")[0];s.type="text/javascript";s.async=true;s.src="http://delicious-button.googlecode.com/files/jquery.delicious-button-1.0.min.js";s1.parentNode.insertBefore(s,s1)})();
(function(){var s=document.createElement("SCRIPT"),s1=document.getElementsByTagName("SCRIPT")[0];s.type="text/javascript";s.async=true;s.src="http://widgets.digg.com/buttons.js";s1.parentNode.insertBefore(s,s1)})();
(function(){var s=document.createElement("SCRIPT"),s1=document.getElementsByTagName("SCRIPT")[0];s.type="text/javascript";s.async=true;s.src="http://static.ak.fbcdn.net/connect.php/js/FB.Share";s1.parentNode.insertBefore(s,s1)})();
(function(){var s=document.createElement("SCRIPT"),s1=document.getElementsByTagName("SCRIPT")[0];s.type="text/javascript";s.async=true;s.src="http://w.sharethis.com/button/buttons.js";s1.parentNode.insertBefore(s,s1)})();
</script>
<?php
}
?>
<?php
if(!function_exists('add_action')){
  die('<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fdev.linksku.com%2Fsharepost%2F&amp;layout=button_count&amp;show_faces=false&amp;width=78&amp;action=like&amp;colorscheme=light&amp;font=arial" scrolling="no" frameborder="0" allowtransparency="true"></iframe>');
}

function sharepost_url() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

function sharepost_check(){
if(get_option('sharepost_template') || is_admin() || get_option('sharepost_display_all') || (
  (get_option('sharepost_display_post') && is_single()) ||
  (get_option('sharepost_display_page') && is_page()) ||
  (get_option('sharepost_display_home') && is_home()) ||
  (get_option('sharepost_display_category') && is_category()) ||
  (get_option('sharepost_display_search') && is_search()) ||
  (get_option('sharepost_display_archive') && is_archive())
))
  return true;
else
  return false;
}

function sharepost_create_menu() {

	//create new top-level menu
	add_submenu_page('options-general.php','Share Post Settings', 'Share Post', 'administrator', __FILE__, 'sharepost_admin');

if (((float)substr(get_bloginfo('version'),0,3)) >= 2.7) {
  if (is_admin()){
	//call register settings function
	add_action( 'admin_init', 'register_sharepost' );
  }
}
}

function plugin_links($links, $file) {

    if (preg_match('/^share\-post\//',$file)){
        $settings_link = '<a href="admin.php?page=share-post/functions.php">Settings</a>';
	array_unshift($links, $settings_link);
    }
        
    return $links;
}

function sharepost_button($content=''){
	return sharepost_buttons($content);
}

function sharepost_bot(){
  $crawlers=array('aspseek','abachobot','accoona','acoirobot','adsbot','alexa','alta vista','altavista','ask jeeves','baidu','crawler','croccrawler','dumbot','estyle','exabot','fast-enterprise','fast-webcrawler','francis','geonabot','gigabot','google','heise','heritrix','ibm','iccrawler','idbot','ichiro','lycos','msn','msrbot','majestic-12','metager','ng-search','nutch','omniexplorer','psbot','rambler','seosearch','scooter','scrubby','seekport','sensis','seoma','snappy','steeler','synoo','telekom','turnitinbot','voyager','wisenut','w3','yacy','yahoo');
  foreach($crawlers as $c){if(stristr($_SERVER['HTTP_USER_AGENT'],$c))return true;}
  return false;
}
?>
<?php 

session_start();

if (!isset($_SESSION['language'])) {
  $_SESSION['language'] = 'en';
}

function currentLanguage() {
  $flagUrl = '';
  
  if ($_SESSION['language'] == 'en') {
    $flagUrl = '/wp-content/plugins/translate/assets/en.png';
  } else if ($_SESSION['language'] == 'zh') {
    $flagUrl = '/wp-content/plugins/translate/assets/zh.png';
  } else {
    $flagUrl = '/wp-content/plugins/translate/assets/th.png';
  }

  return '<a href="#"><img src="'.$flagUrl.'" class="lang-icon"></a>';
}

function enTrans($atts = [], $content = '') {
  if ($_SESSION['language'] == 'en' || isset($_GET['lang']) && $_GET['lang'] == 'en') {
    $_SESSION['language'] = 'en';
    return do_shortcode($content);
  }
  return '';
}

function zhTrans($atts = [], $content = '') {
  if ($_SESSION['language'] == 'zh' || isset($_GET['lang']) && $_GET['lang'] == 'zh') {
    $_SESSION['language'] = 'zh';
    return do_shortcode($content);
  }
  return '';
}

function thTrans($atts = [], $content = '') {
  if ($_SESSION['language'] == 'th' || isset($_GET['lang']) && $_GET['lang'] == 'th') {
    $_SESSION['language'] = 'th';
    return do_shortcode($content);
  }
  return '';
}

add_shortcode('en', 'enTrans');
add_shortcode('zh', 'zhTrans');
add_shortcode('th', 'thTrans');
add_shortcode('current_language', 'currentLanguage');



?>
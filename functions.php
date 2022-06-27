<?php

/* マイナーアップグレードのみ有効化、開発版、メジャーアップグレードは無効化 */
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* バージョンアップ通知を非表示にする */
function update_nag_hide() {
    remove_action( 'admin_notices', 'update_nag', 3 );
}
add_action( 'admin_init', 'update_nag_hide' );
/* WordPressの自動更新チェックを停止する */
add_filter ('pre_site_transient_update_core','__return_zero');
remove_action ('wp_version_check','wp_version_check');
remove_action ('admin_init','_maybe_update_core');
/* 管理メニューから「更新」を消す */
function remove_admin_menu_items() {
    remove_submenu_page('index.php','update-core.php');
}
add_action('admin_menu','remove_admin_menu_items');
/* srcset　無効化 */
add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );
add_filter( 'wp_calculate_image_srcset', '__return_false' );
remove_filter( 'the_content', 'wp_make_content_images_responsive' );
/* タイトルタグ */
add_theme_support( 'title-tag' );
/* アイキャッチ */
add_theme_support('post-thumbnails');
/* canonical出力 */
remove_action('wp_head', 'rel_canonical');
add_action( 'wp_head', 'add_canonical' );
function add_canonical() {
  $canonical = null;
  if( is_home() || is_front_page() ) {
    $canonical = home_url();
  } elseif ( is_category() ) {
    $canonical = get_category_link( get_query_var('cat') );
  } else if(is_tag()){
    $canonical = get_tag_link(get_queried_object()->term_id);
  } elseif ( is_search() ) {
    $canonical = get_search_link();
  } elseif ( is_page() || is_single() ) {
    $canonical = get_permalink();
  } else{
    $canonical = home_url();
  }
  echo '<link rel="canonical" href="'.$canonical.'">'."\n";
}
/* 固定ページにカテゴリーを紐付 */
add_action('init','add_categories_for_pages');
function add_categories_for_pages(){
register_taxonomy_for_object_type('category', 'page');
}

//管理画面CSS
function admin_css() {
  echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo("template_directory").'/admin.css">';
}
add_action('admin_head', 'admin_css');
//ダッシュボードタイトル
function adminTxtReplace(){
  echo'
<script type="text/javascript">
//<![CDATA[
window.onload=adminTxtReplace
function adminTxtReplace(){
  document.body.innerHTML = document.body.innerHTML.replace(/\<h1\>ダッシュボード\<\/h1\>/g, "\<h1\ style\=\"background\:\#000000\;\ text\-align\:center\; color\:\#fff\; padding\:200px 10px\;\"\>ダッシュボード\<br\>\<span style\=\"font-size\:12px\;\"\>content management system</span>\<\/h1\>");
}
//]]>
</script>';
}
add_action('admin_head-index.php', 'adminTxtReplace', 20);
// 管理画面非表示
function remove_admin_menus() {
    // level10以外のユーザーの場合
        global $menu;
        // unsetで非表示にするメニューを指定
        // unset($menu[2]);        // ダッシュボード
        // unset($menu[5]);        // 投稿
        // unset($menu[10]);       // メディア
        unset($menu[15]);       // リンク
        // unset($menu[20]);       // 固定ページ
        unset($menu[25]);       // コメント
        unset($menu[60]);       // 外観
        // unset($menu[65]);       // プラグイン
        // unset($menu[70]);       // ユーザー
        // unset($menu[75]);       // ツール
        // unset($menu[80]);       // 設定
        // remove_menu_page('cptui_main_menu');//CPT
        remove_menu_page('edit.php?post_type=acf');//ACF
        remove_menu_page ('toolset-dashboard');//Types
}
add_action('admin_menu', 'remove_admin_menus', 11);


/* -------------------------- OGP出力 ------------------------- */
function my_meta_ogp() {
  if (is_front_page() || is_home() || is_singular()) {
    $ogp_image = '';
    $twitter_site = '';
    $twitter_card = 'summary_large_image';
    $facebook_app_id = '';
    global $post;
    $ogp_title = '';
    $ogp_description = '';
    $ogp_url = '';
    $html = '';
    if (is_singular()) {
      setup_postdata($post);
      $ogp_title = $post->post_title;
      $ogp_description = mb_substr(get_the_excerpt(), 0, 100);
      $ogp_url = get_permalink();
      wp_reset_postdata();
    } elseif (is_front_page() || is_home()) {
      $ogp_title = get_bloginfo('name');
      $ogp_description = get_bloginfo('description');
      $ogp_url = home_url();
    }
    $ogp_type = (is_front_page() || is_home()) ? 'website' : 'article';
    if (is_singular() && has_post_thumbnail()) {
      $ps_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
      $ogp_image = $ps_thumb[0];
    }
    $html = "\n";
    $html .= '<title>' . esc_attr($ogp_title) . '</title>' . "\n";
    $html .= '<meta name="description" content="' . esc_attr($ogp_description) . '">' . "\n";
    $html .= '<meta property="og:title" content="' . esc_attr($ogp_title) . '" />' . "\n";
    $html .= '<meta property="og:description" content="' . esc_attr($ogp_description) . '" />' . "\n";
    $html .= '<meta property="og:type" content="' . $ogp_type . '" />' . "\n";
    $html .= '<meta property="og:url" content="' . esc_url($ogp_url) . '" />' . "\n";
    $html .= '<meta property="og:image" content="' . esc_url($ogp_image) . '" />' . "\n";
    $html .= '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '" />' . "\n";
    $html .= '<meta name="twitter:card" content="' . $twitter_card . '" />' . "\n";
    $html .= '<meta name="twitter:site" content="' . $twitter_site . '" />' . "\n";
    $html .= '<meta name="twitter:title" content="' . esc_attr($ogp_title) . '" />' . "\n";
    $html .= '<meta name="twitter:url" content="' . esc_url($ogp_url) . '" />' . "\n";
    $html .= '<meta name="twitter:description" content="' . esc_attr($ogp_description) . '">' . "\n";
    $html .= '<meta name="twitter:image" content="' . esc_url($ogp_image) . '" />' . "\n";
    $html .= '<meta property="og:locale" content="ja_JP" />' . "\n";
    $html .= '<meta property="article:publisher" content="https://www.facebook.com/@@@">' . "\n";
    if ($facebook_app_id != "") {
      $html .= '<meta property="fb:app_id" content="' . $facebook_app_id . '">' . "\n";
    }
    echo $html;
  }
}
add_action('wp_head', 'my_meta_ogp');

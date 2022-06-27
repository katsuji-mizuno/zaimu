<?php get_header(); ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/second.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/info.css">

</head>
<body id="single">
<?php get_template_part('parts_header'); ?>


<div id="main">
  <div class="main_tit montserrat">INFORMATION<span>お知らせ</span></div>

  <div class="news_wrap">

    <div class="news_cate">
      <ul>
        <!-- <li><a href="<?php //echo home_url(); ?>/info/">すべて</a></li> -->
        <?php
          // 親カテゴリーのものだけを一覧で取得
          $args = array(
            'parent' => 0,
            'orderby' => 'term_order',
            'order' => 'ASC'
          );
          $categories = get_categories( $args );
        ?>

        <?php foreach( $categories as $category ) : ?>
          <li>
            <a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name; ?></a>
          </li>
        <?php endforeach; ?>
        </ul>
    </div>

    <div class="news_content_wrap">
      <li class="news_list">
        <div class="date_cate_wrap">
          <div class="date montserrat"><?php the_time('Y.m'); ?><span><?php the_time('d'); ?></span></div>
          <div class="cate"><?php the_category(); ?></div>
        </div>
        <div class="title"><?php the_title(); ?></div>
      </li>
      <div class="blog_text"><?php the_content(); ?></div>
      <div class="info_more">
        <a href="<?php echo home_url(); ?>/info/">
        <div class="top_info_more montserrat">
          <p>INDEX</p>
        </div>
        </a>
      </div>
    </div>


  </div>
</div>
<?php get_template_part('parts_footer'); ?>

<?php get_footer(); ?>


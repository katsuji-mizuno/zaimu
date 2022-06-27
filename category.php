<?php get_header(); ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/second.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/info.css">

</head>
<body id="infolist">
<?php get_template_part('parts_header'); ?>

<div id="main">
  <div class="main_tit montserrat">INFORMATION<span>お知らせ</span></div>

    <div class="news_wrap">
      <div class="news_cate">
        <ul>
          <?php
            // 親カテゴリーのものだけを一覧で取得
            $args = array(
              'post_type' => 'post', // 投稿タイプを指定
              'paged' => $paged, // 表示するページ数
              'posts_per_page' => 7
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

      <script>
        $(function () {
          if($('#pageHead li')[0]){
            var myCat = $('#catSlug').text();
            $('#pageHead li').each(function(){
              var catText = $(this).find('a').text();
              if(myCat == catText){
                $('#pageHead li').removeClass('active');
                $(this).addClass('active');
              }
            });
          }
        });
      </script>

      <ul class="news_ul">
        <?php $paged = get_query_var('paged'); ?>
        <?php if(have_posts()): ?>
        <?php while ( have_posts() ) : the_post(); ?>


        <li class="news_list">
          <div class="date_cate_wrap">
            <div class="date montserrat"><?php the_time('Y.m'); ?><span><?php the_time('d'); ?></span></div>
            <div class="cate"><?php the_category(); ?></div>
          </div>
          <div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
        </li>


        <?php endwhile; endif; ?>

          <div class="news_list_pager montserrat">
            <?php global $wp_rewrite;
              $paginate_base = get_pagenum_link(1);
              if (strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()) {
                $paginate_format = '';
                $paginate_base = add_query_arg('paged', '%#%');
              } else {
                $paginate_format = (substr($paginate_base, -1 ,1) == '/' ? '' : '/') .
                user_trailingslashit('page/%#%/', 'paged');;
                $paginate_base .= '%_%';
              }
              echo paginate_links( array(
                'prev_text'     => __( '&nbsp;'), // 「前へ」リンクのテキスト
                'next_text'     => __( '&nbsp;'), // 「次へ」リンクのテキスト

                'base' => $paginate_base,
                'format' => $paginate_format,
                'total' => $wp_query->max_num_pages,
                'mid_size' => 1,
                'current' => ($paged ? $paged : 1),
              ));
            ?>
          </div>

        </ul>
      </div>

    </div>
  </div>
</div>
<?php get_template_part('parts_footer'); ?>


<?php get_footer(); ?>

<?php get_header(); ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/top.css">

</head>
<body id="pageHome">

<?php get_template_part('parts_header'); ?>

<div id="main">


  <!-- TOP -->
  <div class="top_mv_wrap">
    <div class="top_mv">
      <div class="top_mv_illust box fadeUp">
        <img src="<?php bloginfo('template_directory'); ?>/assets/images/top/mv_illust_pc.png" alt="" class="change">
      </div>
      <div class="top_mv_catch">
        <div class="top_mv_catch_img delay-time02 box fadeUp">
          <img src="<?php bloginfo('template_directory'); ?>/assets/images/top/mv_catch.png" alt="" class="change">
        </div>
        <div class="top_mv_catch_text delay-time04 box fadeUp">
          経営課題を解決し<br />成長をサポートする<br />財務戦略のベストパートナー
        </div>
      </div>
    </div>
    <div class="top_mv_scroll montserrat"><a href="#info">scroll</a></div>

  </div>


<!-- INFORMATION -->
<div id="info"></div>

  <div class="top_info">
    <div class="top_info_head">
      <div class="top_info_tit montserrat">
        INFORMATION
      </div>
      <a href="<?php echo home_url(); ?>/info/">
      <div class="top_info_more montserrat">
        <p>INDEX</p>
      </div>
      </a>
    </div>
    <ul class="top_info_post">
      <?php
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => 3,
          'paged' => $paged,
        );
        query_posts( $args );
        if ( have_posts() ) :
        while ( have_posts() ) :
        the_post();
      ?>

      <li class="top_info_post_list">
        <div class="post_date_cate">
          <div class="post_date"><?php the_time('Y.m.d'); ?></div>
          <div class="post_category"><?php the_category(); ?></div>
        </div>
        <div class="post_title">
          <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
          </a>
        </div>
      </li>
      <?php endwhile; endif; ?>
    </ul>
  </div>

<!-- SERVICE -->
  <div class="top_service">
    <div class="top_service_tit montserrat">
      SERVICE
    </div>
    <div class="top_contact_text">
      中小企業経営者の悩みを解決する、経営相談・経営支援サービス（リモート対応可）をご紹介します。
    </div>
    <div class="top_service_item no01">

      <div class="service_item_head_wrap">
        <a href="<?php echo home_url(); ?>/consult/">
          <div class="service_item_head">
            <div class="service_item_tit">
              経営相談
            </div>
            <div class="service_item_more">詳しく見る</div>
          </div>
        </a>
      </div>

      <div class="service_item_content">
        <div class="service_item_text">
          <p>自社の経営状況がどのようなステージにあるのかを知りたい社長、あるいは、会社立て直しや事業の存続で悩んでいる社長のご相談にお応えします。</p>
          <p>長年必死に続けてきた自社の経営状況がどのようなステージにあるのか、また、問題があるとすればどこの部分なのか等を知りたい。また、業績が悪化している現状からの会社立て直しや存続が考えられるのか等の悩みをお持ちの社長のご相談にお応えします。</p>
        </div>
        <div class="service_item_image">
          <img src="<?php bloginfo('template_directory'); ?>/assets/images/top/sercvice_1.png" alt="" class="change">
        </div>
      </div>
    </div>
    <div class="top_service_item no02">
      <div class="service_item_head_wrap">
        <a href="<?php echo home_url(); ?>/support/">
          <div class="service_item_head">
            <div class="service_item_tit">
              経営支援
            </div>
            <div class="service_item_more">詳しく見る</div>
          </div>
        </a>
      </div>
      <div class="service_item_content">
        <div class="service_item_text">
          <p>ＦＭＣ(フィナンシャル・マネジメント・クラブ)メンバー企業の方がご利用の対象となります。</p>
        </div>
      </div>
      <div class="service_item_icons">
        <div class="service_item_icon">
          <div class="service_item_icon_image">
            <img src="<?php bloginfo('template_directory'); ?>/assets/images/top/sercvice_2a.png" alt="" class="change">
          </div>
          <div class="service_item_icon_text">
            経営<br class="only_sp">シミュレーション<br />システム
          </div>
        </div>
        <div class="service_item_icon">
          <div class="service_item_icon_image">
            <img src="<?php bloginfo('template_directory'); ?>/assets/images/top/sercvice_2b.png" alt="" class="change">
          </div>
          <div class="service_item_icon_text">
            資金繰り<br class="only_sp">管理ツール
          </div>
        </div>
        <div class="service_item_icon">
          <div class="service_item_icon_image">
            <img src="<?php bloginfo('template_directory'); ?>/assets/images/top/sercvice_2c.png" alt="" class="change">
          </div>
          <div class="service_item_icon_text">
            目標設定・<br class="only_sp">体制ツール
          </div>
        </div>
      </div>
    </div>
    <div class="top_service_item no03">

      <div class="service_item_head_wrap">
        <a href="<?php echo home_url(); ?>/partner/">
          <div class="service_item_head">
            <div class="service_item_tit">
              パートナーサポート
            </div>
            <div class="service_item_more">詳しく見る</div>
          </div>
        </a>
      </div>

      <div class="service_item_content">
        <div class="service_item_text">
          <p>プロフェッショナル・パートナーが、貴社の経営をバックアップ致します。</p>
          <p>財務関連指導等以外の貴社の経営諸問題に対して、弊社と日頃ビジネス展開をしている提携プロフェッショナルが弊社と力を合わせて貴社をサポートする体制が整っております。</p>
        </div>
        <div class="service_item_image">
          <img src="<?php bloginfo('template_directory'); ?>/assets/images/top/sercvice_3.png" alt="" class="change">
        </div>
      </div>
    </div>
    <div class="top_service_item no04">
      <div class="service_item_head">
        <div class="service_item_tit">
        経営をアシストする<br class="only_sp">情報冊子等の出版
        </div>

      </div>

      <div class="service_item_content">
        <div class="service_item_text">
          <p>顧問契約先 & FMC メンバー企業に対し、新刊発行毎１冊謹呈、毎年４月発刊の新年度版税制改正ここがポイントを１冊謹呈</p>
        </div>
        <div class="service_item_image">

          <div class="service_modal">
            <a class="js-modal-open" href="">
              <div class="service_modal_image">
                <img src="<?php bloginfo('template_directory'); ?>/assets/images/top/sercvice_4.jpg" alt="" class="change">
              </div>
              <div class="service_modal_link">クリックで拡大</div>
            </a>
          </div>
          <div class="modal js-modal">
            <div class="modal__bg js-modal-close"></div>
            <div class="modal__content">
              <img src="<?php bloginfo('template_directory'); ?>/assets/images/top/sercvice_4.jpg" alt="" class="change">
                <a class="js-modal-close" href="">閉じる</a>
            </div><!--modal__inner-->
          </div><!--modal-->
        </div>
      </div>

    </div>



  </div>

<!-- CONTACT -->
  <div class="top_contact">
    <div class="top_contact_head">
      <div class="top_contact_tit montserrat">
        CONTACT
      </div>
      <a href="<?php echo home_url(); ?>/contact/">
      <div class="top_contact_more montserrat">
        <p>CONTACT</p>
      </div>
      </a>
    </div>
    <div class="top_contact_text">
      サービスのご相談、ご依頼に関しましてお気軽にご相談ください。
    </div>
  </div>


</div>



<?php get_template_part('parts_footer'); ?>

<?php get_footer(); ?>
<script src="<?php bloginfo('template_url'); ?>/assets/js/top.js"></script>

<?php get_header(); ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/second.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/contact.css">

</head>
<body id="contact_check">

<?php get_template_part('parts_header'); ?>

<div id="main">
  <div class="main_tit">CONTACT<span>お問い合わせ・お申し込みメール</span></div>


  <div class="content">
    <div class="contact_message">
      「入力内容をご確認いただき問題なければ送信するボタンを押してくだい。修正する場合は「戻る」ボタンをクリックしてください。
    </div>
    <?php the_content(); ?>
  </div>

</div>

<?php get_template_part('parts_footer'); ?>


<?php get_footer(); ?>

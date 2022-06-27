<?php get_header(); ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/second.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/contact.css">

</head>
<body id="contact">

<?php get_template_part('parts_header'); ?>

<div id="main">
  <div class="main_tit montserrat">CONTACT<span>お問い合わせ・お申し込みメール</span></div>


  <div class="content">
    <div class="contact_message">
      サービスのご相談、ご依頼に関しましてお気軽にご相談ください。
      <span>「*」は必須項目です</span>
    </div>
    <?php the_content(); ?>
  </div>

</div>

<?php get_template_part('parts_footer'); ?>


<?php get_footer(); ?>

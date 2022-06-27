<?php get_header(); ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/second.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/contact.css">

</head>
<body id="contact_thanks">

<?php get_template_part('parts_header'); ?>

<div id="main">
  <div class="main_tit">CONTACT<span>お問い合わせ・お申し込みメール</span></div>


  <div class="content">
    <?php the_content(); ?>
  </div>

</div>

<?php get_template_part('parts_footer'); ?>


<?php get_footer(); ?>

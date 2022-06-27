<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<?php if(is_home()) {echo '<meta name="keywords" content="財務マネジメント">' . "\n";}  ?>

<!--favicon-->
<link rel="icon" type="image/vnd.microsoft.icon" href="<?php bloginfo('template_directory'); ?>/assets/images/favicon.ico">
<link rel="apple-touch-icon" sizes="128x128" href="<?php bloginfo('template_directory'); ?>/assets/images/favicon.png">

<!--font-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500;600&display=swap" rel="stylesheet">
<!--link-->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/common.css">

<?php wp_head(); ?>
<?php echo '<script type="text/javascript">var templatePath = "' . get_template_directory_uri() . '";</script>'; ?>

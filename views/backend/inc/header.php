<?php spl_autoload_register(function ($class_name) {
    require_once "model/" . $class_name . ".php";
}); //////////// FUNCTION AUTOLOAD CLASS
?>
<?php $settings = Settings::getSettings("settings")?>

<!DOCTYPE html>
    <!--
    This is a starter template page. Use this page to start your new project from
    scratch. This page gets rid of all links and provides the needed markup only.
    -->
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
    
      <title><?= $settings['site_name']?></title>
    
      <!-- Font Awesome Icons -->
      <link rel="stylesheet" href="assets/admin/plugins/fontawesome-free/css/all.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="assets/admin/dist/css/adminlte.min.css">
      <!-- Google Font: Source Sans Pro -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="icon" href="assets/img/fav.png" type="image/png" sizes="16x16"> 

    </head>
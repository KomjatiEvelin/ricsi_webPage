<!DOCTYPE html>

<html lang="hu">
<html style="height:100%; padding:0px; margin:0px;">

<head>
    <title>Test web</title> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="text-white" style="height:100%; padding:0px; margin:0px; overflow:hidden; background-image:url('<?= base_url(); ?>/images/background.jpg'); background-size:cover;" >
<div class="page" style="height:100%; padding:0px; margin:0px; display:flex; flex-flow:column nowrap;">
<div class="header p-3 m-2 rounded bg-dark text-white" style="flex: 0 0 auto;">
    <h1 class="text-center" style="font-size:4vh;"><?= esc($title) ?></h1>
</div>
<?php echo view('templates/navbar.php'); ?>
<?php echo view('templates/mobileSuperSponsors'); ?>
<?php if (session('msg')) : ?>
     <div class="alert alert-info alert-dismissible">
         <?= session('msg') ?>
         <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
     </div>
 <?php endif ?>


<div class="mr-2 ml-2 d-flex flex-column flex-wrap" style="flex:100%; overflow:hidden; align-content: flex-start;">
    <?php echo view('templates/sidebar.php'); ?>
    <div id="maincontainer" class=" d-flex flex-row flex-wrap justify-content-center" style="flex:100%; width:80%; overflow-y:auto;">

<style>
@media only screen and (max-width: 800px) {
        #maincontainer{
            width:100%!important;
        }
    }

#maincontainer::-webkit-scrollbar {
  display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
#maincontainer {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
</style>

<?php
/* Smarty version 3.1.36, created on 2021-01-08 14:23:07
  from 'D:\xampp\htdocs\ci1\application\views\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ff85cbb3e5da3_35157106',
  'has_nocache_code' => true,
  'file_dependency' => 
  array (
    '282f095ebe4538272fd0438f4303650c5d6922fd' => 
    array (
      0 => 'D:\\xampp\\htdocs\\ci1\\application\\views\\header.tpl',
      1 => 1610104327,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ff85cbb3e5da3_35157106 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '7561215325ff85cbb357c41_38902719';
echo '/*%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/<?php echo \'<?php \';?>
/*/%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/';?>
defined('BASEPATH') OR exit('No direct script access allowed'); <?php echo '/*%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/<?php echo \'?>\';?>
/*/%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/';?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Site title</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">

	<!-- css -->
	<link href="<?php echo '/*%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/<?php echo \'<?=\';?>
/*/%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/';?>
 base_url('/css/bootstrap.min.css') <?php echo '/*%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/<?php echo \'?>\';?>
/*/%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/';?>
" rel="stylesheet">
	<link href="<?php echo '/*%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/<?php echo \'<?=\';?>
/*/%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/';?>
 base_url('/css/style.css') <?php echo '/*%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/<?php echo \'?>\';?>
/*/%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/';?>
" rel="stylesheet">

	<!--[if lt IE 9]>
		<?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
	<![endif]-->
</head>
<body>

	<header id="site-header">
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					
					<a class="navbar-brand" href="<?php echo '/*%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/<?php echo \'<?=\';?>
/*/%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/';?>
 base_url() <?php echo '/*%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/<?php echo \'?>\';?>
/*/%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/';?>
">Home</a>
				</div>
				
						<?php echo '/*%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/<?php echo \'<?php \';?>
/*/%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/';?>
if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) : <?php echo '/*%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/<?php echo \'?>\';?>
/*/%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/';?>

							<a href="<?php echo '/*%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/<?php echo \'<?=\';?>
/*/%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/';?>
 base_url('logout') <?php echo '/*%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/<?php echo \'?>\';?>
/*/%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/';?>
">Logout</a></li>
						<?php echo '/*%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/<?php echo \'<?php \';?>
/*/%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/';?>
else : <?php echo '/*%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/<?php echo \'?>\';?>
/*/%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/';?>

							<a href="<?php echo '/*%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/<?php echo \'<?=\';?>
/*/%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/';?>
 base_url('register') <?php echo '/*%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/<?php echo \'?>\';?>
/*/%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/';?>
">Register</a></li>
							<a href="<?php echo '/*%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/<?php echo \'<?=\';?>
/*/%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/';?>
 base_url('login') <?php echo '/*%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/<?php echo \'?>\';?>
/*/%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/';?>
">Login</a></li>
						<?php echo '/*%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/<?php echo \'<?php \';?>
/*/%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/';?>
endif; <?php echo '/*%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/<?php echo \'?>\';?>
/*/%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/';?>

				
				</div><!-- .navbar-collapse -->
			</div><!-- .container-fluid -->
		</nav><!-- .navbar -->
	</header><!-- #site-header -->

	<main id="site-content" role="main">
		
		<?php echo '/*%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/<?php echo \'<?php \';?>
/*/%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/';?>
if (isset($_SESSION)) : <?php echo '/*%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/<?php echo \'?>\';?>
/*/%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/';?>

			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php echo '/*%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/<?php echo \'<?php \';?>
/*/%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/';?>
//var_dump($_SESSION); <?php echo '/*%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/<?php echo \'?>\';?>
/*/%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/';?>

					</div>
				</div><!-- .row -->
			</div><!-- .container -->
		<?php echo '/*%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/<?php echo \'<?php \';?>
/*/%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/';?>
endif; <?php echo '/*%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/<?php echo \'?>\';?>
/*/%%SmartyNocache:7561215325ff85cbb357c41_38902719%%*/';?>

		
<?php }
}

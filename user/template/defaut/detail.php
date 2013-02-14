<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
	<title><?php echo $content['contentName'] ?></title>
	<link rel="stylesheet" type="text/css" media="all" href="/media/ui/css/style.php" />
	<?php include(MYTHEME.'/ui/html-head.php') ?>
</head>
<body class="body">

<div class="container_12 container clearfix">

	<div class="col grid_3 alpha">
		<?php include(MYTHEME.'/ui/menu.php') ?>
	</div>

	<div class="grid_9 omega center"><div class="center-item">

		<h1><?php echo $content['contentName'] ?></h1>

		<table border="1">
			<tr>
				<td>Stock</td>
				<td><?php echo $content['contentStock'] ?></td>
			</tr>
		</table>

	</div></div>

</div>

<?php $this->themeInclude('ui/html-end.php'); ?>

</body></html>
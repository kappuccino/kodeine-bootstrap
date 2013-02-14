<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
	<title></title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<? $this->themeInclude('ui/html-head.php') ?>
</head>
<body>

<div class="container_12 container clearfix">

	<? $this->themeInclude('ui/nav.php'); ?>

	<br class="clearing" />

	<h1><?= $content['contentName'] ?></h1>
	

	<p><hr /></p>
	<? if($content['is_buy']){ ?>
	<p><a href="cart.html?id_content=<?= $content['id_content'] ?>">Ajouter au panier</a></p>
	<? } ?>

	<table width="100%" class="__dev__Table">
		<tr>
			<td>Stock</td>
			<td><?= $content['contentStock'] ?></td>
		</tr>
		<tr>
			<td width="200">FIELD</td>
			<td></td>
		</tr>
		<? foreach($content['field'] as $k => $e){ ?>
		<tr>
			<td>- <?= $fields[$k]['fieldName'] ?></td>
			<td><?= $e ?></td>
		</tr>
		<? } ?>
	</table>
	
	<H2>Commentaire</H2>
	
	<?
	if($content['contentComment'] != ''){
	
		$comment = $this->apiLoad('content')->contentCommentGet(array(
			'is_moderate'	=> 1,
			'id_content'	=> $content['id_content']
		));
		
		if(sizeof($comment) > 0){
			echo "<table border=\"1\" style=\"margin:0px;\" width=\"100%\" class=\"__dev__Table\">";
			foreach($comment as $e){
				echo "<tr>";
				echo "<td>".$e['commentDate']."</td>";
				echo "<td>".$e['commentData']."</td>";
				echo "<td>NOTE = ".$e['commentAvg']."</td>";
				echo "<td><a href=\"".$_SERVER['REQUEST_URI']."?good=".$e['id_comment']."\">Good</a></td>";
				echo "<td><a href=\"".$_SERVER['REQUEST_URI']."?bad=".$e['id_comment']."\">Bad</a></td>";
				echo "</tr>";
			}
			echo "<table>";
		}
		
		?>
		<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
			<input type="hidden" name="addComment" value="1" />

			<textarea name="commentData"></textarea><br />

			<input type="submit" value="Commenter !" />
		</form>

	<? } ?>
	
	
	<? if($content['contentRate'] != ''){ ?>
	<h2>Note</h2>
	<p>Note actuelle <?= $content['contentRateAvg'] ?></p>
	<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
		<select name="addRate"><?
			for($i=0; $i<=5; $i++){
				echo "<option value=\"".$i."\"".(($i == 3) ? ' selected' : '').">".$i."</option>";
			}
		?></select>
		<input type="submit" value="Noter !" />
	</form>
	<? } ?>

</div>

<? $this->themeInclude('ui/html-end.php') ?>
</body>
</html>
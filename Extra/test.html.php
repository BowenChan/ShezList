<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>List of users</title>

<style>
#space {
	word-spacing: 30px;
}
</style>

</head>
	<body>
		<p>Here are all the user in the database:</p>
			<?php $counter=0; foreach ($user as $u): ?>
			
			<blockquote>
			<div id="space">
			<?php echo ("username: ") ?>  <?php echo htmlspecialchars($id[$counter],  ENT_QUOTES, 'UTF-8'); $counter++; ?>  <!-- htmlspecialchars to ensure that these are translated into HTML characters entities(Ex. &lt=less than, &gt, &amp) -->
			
			<?php echo ("Password: ") ?>  <?php echo htmlspecialchars($u,  ENT_QUOTES, 'UTF-8'); ?>
			</div>
			</blockquote>
		
		<?php endforeach; ?>	

	</body>


</html>

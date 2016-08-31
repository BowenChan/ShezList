<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>List of users</title>
</head>
	<body>
		<p>Here are all the user in the database:</p>
			<?php foreach ($user as $user): ?>
				
			<blockquote>
			<p><?php echo htmlspecialchars($user, ENT_QUOTES, 'UTF-8'); ?></p>
			 
 			<?php /*foreach ($id as $id): */ ?>
			<p><?php /*echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8');*/ ?></p> 
			</blockquote>

		<?php endforeach; ?>
	</body>


</html>

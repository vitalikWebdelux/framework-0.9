<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Помилка</title>
</head>
<body>
	<h1>Сталася помилка</h1>
	<p> <b>Код помилки: </b> <?php echo $err_name ?> </p>
	<p> <b>Текст помилки: </b> <?php echo $err_str ?> </p>
	<p> <b>Файл, в якому сталася помилка: </b> <?php echo $err_file ?> </p>
	<p> <b>Рядок, в якому сталася помилка: </b> <?php echo $err_line ?> </p>
</body>
</html>
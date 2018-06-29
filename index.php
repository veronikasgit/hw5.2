<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<title>ToDo list</title>
</head>
<body>
<?php
require('connect.php');

if (isset($_POST['description']) && isset($_POST['is_done']) && isset($_POST['date_added'])) {

	var_dump($_POST) ;
	$description = $_POST['description'];
	$email = $_POST['is_done'];
	$date_added = $_POST['date_added'];

	$query = "INSERT INTO tasks (description, is_done, date_added) VALUES ('$description', '$is_done', '$date_added')";
	$result = mysqli_query($connection, $query);

	if($result){
		$smsg = "Запись успешно добавлена";
	} else {
		$fsmsg = "Ошибка";
	}
}
?>
	<div class="container">
		<form class="form-signin" method="POST">
			<h3>ToDO list</h3>
			<?php if(isset($smsg)){ ?>
				<div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div> <?php } ?>
			<?php if(isset($fsmsg)){ ?>
				<div class="alert alert-danger" role="alert"> <?php echo $fsmsg; ?> </div> <?php } ?>
				<form>			
			<input type="text" name="description" class="form-control" placeholder="description" required>
			 <h5>Выполнено ли задание?</h5>
    			<label><input name="is_done" type="radio" value="0"> Нет</label>
   				<label><input name="is_done" type="radio" value="1"> Да</label>
			<input type="datetime" name="date_added" class="form-control" placeholder="date_added" required> 
			<button class="btn btn-lg btn-primary btn-block" name="submit">Отправить</button>
		</form>
	</div> 

</body>
</html>
<?php
    require('db.php');

    if ($_SERVER['REQUEST_METHOD'] === 'GET'){
        $id = $_GET['id'];

        $item = $db->query("SELECT * FROM plants WHERE id=$id")->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($item) > 0) {
        $item = $item[0];
    }
    }else if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id=$_POST['id'];
        $photo=$_POST['photo'];
        $name=$_POST['name'];
        $price=$_POST['price'];

        $db->query("UPDATE plants SET photo='$photo', name='$name', price='$price' WHERE id=$id");

        echo '<script>
        alert("Товар успешно обновлен.")
        </script>';
        header('location:index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обновить</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="photo"  value="<?php echo $item["photo"] ?>">
        <br>
        <br>
        <input type="text" name="name"  value="<?php echo $item["name"] ?>">
        <br>
        <br>
        <input type="text" name="price"  value="<?php echo $item["price"] ?>">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <br>
        <br>
        <button type="submit" name="submit">Обновить</button>
    </form>
    <br>
    <a href="index.php">Назад</a>
</body>
</html>

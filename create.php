<?php

    require('db.php');

    $item = $db->query("SELECT * FROM plants")->fetchAll(PDO::FETCH_ASSOC);

    if(!empty($_GET)) {

        if(isset($_GET["photo"]) && isset($_GET["name"]) && isset($_GET["price"]))
    {
        $photo = $_GET['photo']; // TOASK: hot to ignore this statements if we have not get?
        $name = $_GET['name'];
        $price = $_GET['price'];
        $db->query("INSERT INTO plants(photo, name, price) VALUE('$photo','$name', '$price')");
    }

        echo '<script>
        alert("Товар успешно добавлен.")
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
    <title>Товар</title>
</head>
<body>
    <form action="#">
        <input type="text" name="photo" placeholder="Адрес изображения">
        <br>
        <br>
        <input type="text" name="name" placeholder="Название растения">
        <br>
        <br>
        <input type="text" name="price" placeholder="Цена (формат: IDR 0.000)">
        <br>
        <br>
        <button type="submit" name="submit">Отправить</button>
    </form>

    <br>
    <a href="index.php">Назад</a>
</body>
</html>
<?php
    require('db.php');
       
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $db->query("DELETE FROM plants WHERE id=$id");
        }

    echo '<script>
    alert("Товар успешно удален.")
    </script>';
    header('location:index.php');
?>

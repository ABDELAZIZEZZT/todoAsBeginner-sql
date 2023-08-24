<?php
$task=$_POST['task'];
$id=$_POST['taskId'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="update2.php" method="POST">
    <input type="text" name="task" id="task" value="<?php echo $task?>" >
    <input type="hidden" name="id" id="task" value="<?php echo $id?>" >

    <button id="update-task">update</button>
    </form>
</body>
</html>



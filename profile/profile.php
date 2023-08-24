<?php

include 'function.php';

$list_tasks=getTasks();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="profile.css">
<title>Todo List</title>
</head>
<body>
    <form action="addTask.php" method="POST">
        <div class="container">
            <?php if(isset($_SESSION['wrong'])){echo $_SESSION['wrong']; unset($_SESSION['wrong']);}?>
        <h1>My Todo List</h1>
            <div class="todo-form">
                <input type="text" name="task" id="task" placeholder="Enter a new task">
                <button id="add-task">Add Task</button>
            </div>
        </div>
  </form>
  <div class="container">
        <h1><?php echo $_SESSION['name']?> tasks</h1>
       
            <?php foreach ($list_tasks as $task):?>
            <div class="todo-form">
                <?php if($task["user_id"]==$_SESSION['id']) : echo $task['task'];?>
                <form action="deletTask.php" method="POST">
                    <input type="hidden" name="task" id="task" value="<?php echo $task['id']  ;?>" >
                    <button id="delet-task">delet</button>
                </form>
                <p>   </p>
                <form action="updateTask.php" method="POST"> 
                    <input type="hidden" name="taskId" id="task" value="<?php echo $task['id'] ;?>" >
                    <input type="hidden" name="task" id="task" value="<?php echo $task['task'] ;?>" >
                    <button id="update-task">update</button>
                </form> 
              
                <?php endif ?>
                
            </div>
            <?php endforeach ?>
       
    </div>
    <form action="logout.php" method="POST"> 
    <button id="logout">logout</button>
            </form>

</body>
</html>

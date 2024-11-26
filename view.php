<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do list</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .todo_body {
    max-width: 700px;
            box-shadow: 0 0 5px 5px;
        }

        .todo_text {
    font-weight: bold;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="todo_body my-5 p-3">
            <h1 class="text-center todo-text">Todo app</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque cum, deleniti esse id, inventore, labore
                non optio provident quos reiciendis totam ut. Alias cupiditate dignissimos fugit, illum in veniam?
    Animi.</p>

            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="task name" name="title"
                           aria-label="Task name" aria-describedby="button-addon2" required>
                    <select name="status" id="" style="margin:0 20px;">
                        <option value="pending">Pending</option>
                        <option value="in_progress">In_progress</option>
                        <option value="completed">Completed</option>
                    </select>
                    <button type="submit" class="btn btn-primary"  id="button-addon2">Add</button>
                </div>
            </form>

            <ul class="list-group">
<!--                --><?php
//                global $tasks;
//                foreach($tasks as $task){
//                    if($task['status'] == 'completed'){
//                        echo '<del> <li class="list-group-item d-flex justify-content-between align-items-center"> A Task
//                                        <button class="btn btn-outline-success">Done</button>
//                                    </li>
//                              </del>';
//                    }
//                }
//                ?>
                <li class="list-group-item d-flex justify-content-between align-items-center"> A Task
                    <button class="btn btn-outline-success">Done</button>
                </li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
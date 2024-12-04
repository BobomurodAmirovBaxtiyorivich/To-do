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
            max-width: 950px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(5px);
            transition: backdrop-filter 0.3s ease-in-out;

        }
    </style>
</head>

<body style="background-image: url(https://i.pinimg.com/originals/53/44/9f/53449fa87702af80374c45b87080c639.jpg);
            background-repeat: no-repeat;
            background-size: cover;">
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="todo_body my-5 p-3">
            <h1 class="text-center">Todo app</h1>
            <h4 class="text-center">Add tasks</h4>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="task name" name="title"
                           aria-label="Task name" aria-describedby="button-addon2" required>
                    <label for="due_date"></label>
                    <input type="datetime-local" name="due_date" class="form-control" id="due_date" required>
                    <button type="submit" class="btn btn-primary"  id="button-addon2">Add</button>
                </div>
            </form>

            <table class="table table-primary table-hover  table-striped table-bordered">
                <thead>
                <tr class="table-secondary">
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Due date</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                /** @var TYPE_NAME $tasks */
                foreach($tasks as $task){
                    if($task['status'] == 'pending'){

                        echo "<tr>
                            <td>{$task['title']}</td>
                            <td>{$task['status']}</td>
                            <td>{$task['due_date']}</td>
                            <td>
                                <a href='/todos/$task[id]/delete' type='button' class='btn btn-outline-danger'>Delete</a>
                                <a href='/todos/$task[id]/progress' type='button' class='btn btn-outline-warning'>In progress</a>
                                <a href='/todos/$task[id]/complete' type='button' class='btn btn-outline-info'>Done</a>
                                <a href='/todos/$task[id]/edit' type='button' class='btn btn-outline-info'>Edit</a>
                            </td>
                            </tr>";
                    }
                    elseif($task['status'] == 'completed'){
                        echo "<tr>
                                    <td>
                                        <del>{$task['title']}</del>
                                    </td>
                                    <td>{$task['status']}</td>
                                    <td>{$task['due_date']}</td>
                                    <td>
                                        <a href='/todos/$task[id]/delete' type='button' class='btn btn-outline-danger'>Delete</a>
                                        <a href='/todos/$task[id]/progress' type='button' class='btn btn-outline-warning'>To progress</a>
                                    </td>
                           
                                </tr>";
                    }
                    elseif($task['status'] == 'in_progress'){
                        echo "<tr>
                                    <td>{$task['title']}</td>
                                    <td>{$task['status']}</td>
                                    <td>{$task['due_date']}</td>
                                    <td>
                                        <a href='/todos/$task[id]/delete' type='button' class='btn btn-outline-danger'>Delete</a>
                                        <a href='/todos/$task[id]/pending' type='button' class='btn btn-outline-warning'>To pending</a>
                                        <a href='/todos/$task[id]/edit' type='button' class='btn btn-outline-info'>Edit</a>
                                        <a href='/todos/$task[id]/complete' type='button' class='btn btn-outline-info'>Done</a>       
                                    </td>
                           
                                </tr>";
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
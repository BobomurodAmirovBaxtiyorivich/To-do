<?php
require 'views/components/header.php'?>
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
                                <a href='/todos/$task[id]/edit' type='button' class='btn btn-outline-info'>Edit</a>
                            </td>
                            </tr>";
                    } elseif($task['status'] == 'completed'){
                        echo "<tr>
                                    <td>
                                        <del>{$task['title']}</del>
                                    </td>
                                    <td>{$task['status']}</td>
                                    <td>{$task['due_date']}</td>
                                    <td>
                                        <a href='/todos/$task[id]/delete' type='button' class='btn btn-outline-danger'>Delete</a>
                                        <a href='/todos/$task[id]/edit' type='button' class='btn btn-outline-info'>Edit</a>
                                    </td>
                                </tr>";
                    } elseif($task['status'] == 'in_progress'){
                        echo "<tr>
                                    <td>{$task['title']}</td>
                                    <td>{$task['status']}</td>
                                    <td>{$task['due_date']}</td>
                                    <td>
                                        <a href='/todos/$task[id]/delete' type='button' class='btn btn-outline-danger'>Delete</a>
                                        <a href='/todos/$task[id]/edit' type='button' class='btn btn-outline-info'>Edit</a>
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
<?php
require 'views/components/footer.php'?>
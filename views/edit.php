<?php
require 'views/components/header.php';?>
<div class="container">
    <div class="edit-container">
        <h2 class="edit-header">Edit Task</h2>
        <form method="post" action="/todos/<?= $tasks['id']?>/update">
            <input  hidden type="text" name="_method" value="PUT">
            <div class="form-group">
                <label for="taskName" class="form-label">Task Name</label>
                <input type="text" id="taskName" name="title" class="form-control" placeholder="Enter task name" value="<?= $tasks['title']?>">
            </div>
            <div class="form-group">
                <label for="taskStatus"  class="form-label">Status</label>
                <select id="taskStatus" class="form-select" name="status" required>
                    <option value="pending" <?= $tasks['status'] == 'pending' ? 'selected': ''?>>Pending</option>
                    <option value="completed"<?= $tasks['status'] == 'completed' ? 'selected': ''?>>Completed</option>
                    <option value="in_progress"<?= $tasks['status'] == 'in_progress' ? 'selected': ''?>>In progress</option>
                </select>
            </div>
            <div class="form-group">
                <label for="due_date" class="form-label">Due Date</label>
                <input type="datetime-local" name="due_date" class="form-control" id="due_date" value="<?= $tasks['due_date']?>">
            </div>
            <div class="btn-actions">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="/todos" class="btn btn-outline-secondary">Back to Todo list</a>
            </div>
        </form>
    </div>
</div>
<?php
require 'views/components/footer.php';?>
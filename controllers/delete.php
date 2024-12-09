<?php
/** @var TYPE_NAME $id */
$todo = (new App\ToDo())->delete($id);
header('Location: /todos');
exit();
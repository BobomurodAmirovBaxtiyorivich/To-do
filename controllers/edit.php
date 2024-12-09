<?php
/** @var TYPE_NAME $id */
$tasks = (new App\ToDo())->edit($id);
require 'views/edit.php';
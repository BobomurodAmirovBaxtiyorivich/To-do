<?php

$todos = (new App\ToDo())->getTodosWithoutU();
header('Content-Type: application/json');
echo json_encode($todos);
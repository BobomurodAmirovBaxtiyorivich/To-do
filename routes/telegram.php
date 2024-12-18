<?php

$todos = new App\ToDo();
$bot = new App\Bot();


$update = json_decode(file_get_contents('php://input'));
if ($update) {
    $chatId = $update->message->chat->id;

    if ($update->message->text === '/start') {
        $bot->makeRequest('sendMessage', [
            'chat_id' => $chatId,
            'text' => "To see a task, type the task's ID."
        ]);
        exit();
    }
    if (mb_stripos($update->message->text, '/start') !== false) {
        $userId = trim(explode('/start', $update->message->text)[1]);
        $todo = json_encode($todos->getAllTodosOfUser(), JSON_PRETTY_PRINT);
        $bot->makeRequest('sendMessage', [
            'chat_id' => $chatId,
            'text' => "<pre>" . htmlspecialchars($todo) . "</pre>",
            'parse_mode' => 'html'
        ]);
        $bot->makeRequest('sendMessage', [
            'chat_id' => $chatId,
            'text' => "Welcome to the Todo App.\n Here's your tasks" . "<pre>" . htmlspecialchars($todo) . "</pre>"
        ]);
        exit();
    }
    $ids = $todos->getIDs();
    if (empty($ids)) {
        $bot->makeRequest('sendMessage', [
            'chat_id' => $chatId,
            'text' => "No tasks found.",
            'parse_mode' => 'html'
        ]);
        exit();
    }
    $taskId = intval($update->message->text);
    foreach ($ids as $id) {
        if ($id == $taskId) {
            $todo = json_encode($todos->edit($taskId), JSON_PRETTY_PRINT);
            $bot->makeRequest('sendMessage', [
                'chat_id' => $chatId,
                'text' => "<pre>" . htmlspecialchars($todo) . "</pre>",
                'parse_mode' => 'html'
            ]);
            exit();
        }
    }
    $idsText = implode(', ', $ids);
    $bot->makeRequest('sendMessage', [
        'chat_id' => $chatId,
        'text' => "Bunday ID mavjud emas. Iltimos, quyidagi ID lardan birini tanlang:\n$idsText",
        'parse_mode' => 'html'
    ]);
}

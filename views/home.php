<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greeting Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
        h1 {
            color: #4CAF50;
        }
        .button-link {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            font-size: 16px;
            color: white;
            background-color: #007BFF;
            text-decoration: none;
            border-radius: 5px;
        }
        .button-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php
echo "<h1>Welcome to home page of todo.<br>To visit main page click button</h1>";
?>

<a href="/todos" class="button-link">Main page</a>

</body>
</html>

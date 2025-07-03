<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['task'])) {
    $task = htmlspecialchars(trim($_POST['task']));
    $file = 'data.json';

    $data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

    foreach ($data as $entry) {
        if (strcasecmp($entry['task'], $task) === 0) {
            $_SESSION['message'] = "⚠️ Task already exists in the list!";
            header("Location: index.php");
            exit();
        }
    }

    $data[] = ['task' => $task, 'created' => date("Y-m-d H:i:s")];
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

    $_SESSION['message'] = "✅ Task added successfully!";
}
header("Location: index.php");
exit();
?>

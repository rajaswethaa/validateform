<?php
$todos = file_exists('data.json') ? json_decode(file_get_contents('data.json'), true) : [];
?>
<?php
session_start();
if (!empty($_SESSION['message'])) {
    echo "<p style='color: darkred; font-weight: bold;'>{$_SESSION['message']}</p>";
    unset($_SESSION['message']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>📝 To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>📋 My To-Do List</h2>
    <form action="add.php" method="POST">
        <input type="text" name="task" placeholder="Enter new task..." required>
        <button type="submit">Add</button>
    </form>

    <ul>
        <?php foreach (array_reverse($todos) as $index => $item): ?>
            <li>
                <?= htmlspecialchars($item['task']) ?>
                <form action="delete.php" method="POST" class="delete-form">
                    <input type="hidden" name="index" value="<?= $index ?>">
                    <button type="submit">❌</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>

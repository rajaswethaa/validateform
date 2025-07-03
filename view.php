<!DOCTYPE html>
<html>
<head>
    <title>View Submissions</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>📥 Submitted Messages</h2>
    <?php
    $file = 'contacts.json';
    if (file_exists($file)) {
        $entries = json_decode(file_get_contents($file), true);
        foreach (array_reverse($entries) as $entry) {
            echo "<div class='message'>";
            echo "<strong>{$entry['name']}</strong> ({$entry['email']})<br>";
            echo "<em>{$entry['timestamp']}</em><br>";
            echo "<p>{$entry['message']}</p>";
            echo "</div><hr>";
        }
    } else {
        echo "No messages found.";
    }
    ?>
</div>
</body>
</html>

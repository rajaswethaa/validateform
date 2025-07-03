<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['index'])) {
    $index = $_POST['index'];
    $file = 'data.json';

    if (file_exists($file)) {
        $data = json_decode(file_get_contents($file), true);
        unset($data[$index]);
        $data = array_values($data); // reindex
        file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
    }
}
header("Location: index.php");
exit();
?>

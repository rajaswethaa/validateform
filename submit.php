<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = [
        'name' => htmlspecialchars($_POST["name"]),
        'email' => htmlspecialchars($_POST["email"]),
        'message' => htmlspecialchars($_POST["message"]),
        'timestamp' => date("Y-m-d H:i:s")
    ];

    $file = 'contacts.json';
    $existing = [];

    if (file_exists($file)) {
        $existing = json_decode(file_get_contents($file), true);
    }

    $existing[] = $data;

    file_put_contents($file, json_encode($existing, JSON_PRETTY_PRINT));
    header("Location: view.php");
    exit();
}
?>

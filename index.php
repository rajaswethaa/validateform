<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Contact Us 📬</h2>
    <form action="submit.php" method="POST" onsubmit="return validateForm()">
        <input type="text" name="name" id="name" placeholder="Your Name" required><br>
        <input type="email" name="email" id="email" placeholder="Your Email" required><br>
        <textarea name="message" id="message" placeholder="Your Message" required></textarea><br>
        <button type="submit">Send Message</button>
    </form>
</div>
<script src="script.js"></script>
</body>
</html>

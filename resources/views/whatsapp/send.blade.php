<!DOCTYPE html>
<html>
<head>
    <title>Send WhatsApp Message</title>
</head>
<body>
    <h1>Send WhatsApp Message</h1>
    <form action="{{ url('/send-whatsapp-message') }}" method="GET">
        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" required><br>
        <label for="message">Message:</label>
        <textarea name="message" rows="4" required></textarea><br>
        <button type="submit">Send</button>
    </form>
</body>
</html>

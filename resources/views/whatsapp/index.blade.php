<!DOCTYPE html>
<html>
<head>
    <title>WhatsApp Integration</title>
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.0.1/socket.io.js"></script>

<body>
    <h1>Scan the QR Code to Log In</h1>
    
    <div id="qrcode-container">
        @if ($loggedIn)
            <h1>Status: Logged In</h1>
            <a href="/logout" id="logout">Logout</a>
        @else
            <h1>Scan the QR Code to Log In</h1>
            <div id="qrcode">{!! $qrCode !!}</div>
        @endif
    </div>

    <h2>Send WhatsApp Message</h2>
    @if (session('error'))
        <p style="color: red">{{ session('error') }}</p>
    @endif
    @if (session('status'))
        <p style="color: green">{{ session('status') }}</p>
    @endif
    <form method="get" action="/send-whatsapp">
        @csrf
        <label for="phone">Phone Number:</label>
        <input type="text" name="phone" required><br>
        <label for="message">Message:</label>
        <input type="text" name="message" required><br>
        <button type="submit">Send Message</button>
    </form>
</body>

<script>
        $(document).ready(function() {
            $('#qrcode-container').on('click', '#logout', function(event) {
                event.preventDefault();
                $.ajax({
                    url: '/logout',
                    method: 'GET',
                    success: function() {
                        $('#qrcode-container').html('<h1>Scan the QR Code to Log In</h1><div id="qrcode"></div>');
                    }
                });
            });
        });
    </script>

</html>

<!DOCTYPE html>

<head>
    <title>Pusher Test</title>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('232e5d56b1899006361e', {
      cluster: 'mt1'
    });

    var channel = pusher.subscribe('user-data');
    channel.bind('user-data', function(data) {
      alert(JSON.stringify(data));
    });
    </script>
</head>

<body>
    <h1>Pusher Test</h1>
    <p>
        Try publishing an event to channel <code>my-channel</code>
        with event name <code>my-event</code>.
    </p>
</body>
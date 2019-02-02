<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">
	<style type="text/css">
		.list-group{
			overflow-y: scroll;
			height: 200px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row " id="app">
			<div class="offset-4 col-4">
				<li class="list-group-item active">Chat Room</li>
				<ul class="list-group" v-chat-scroll>
					<message v-for="value in chat.message" :key=value.index color="success">
						 @{{ value }}
					</message>
				</ul>
				<input type="text" name="message" placeholder="Enter message..." class="form-control" v-model='message' @keyup.enter='send'>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="{!! asset('js/app.js') !!}"></script>
	<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
    <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('18035712f08e65bb823d', {
      cluster: 'ap2',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });
  </script>
</body>
</html>
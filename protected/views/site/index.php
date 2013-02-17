<link rel='stylesheet' type='text/css' href='/css/fullcalendar.css' />
<script type='text/javascript' src='/js/jquery-ui-1.8.23.custom.min.js'></script>
<script type='text/javascript' src='/js/fullcalendar.min.js'></script>
<script type='text/javascript'>
	$(document).ready(function() {
	
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		var calendar = $('#calendar').fullCalendar({
			header: {
				right: 'prev,next',
			},
			defaultView: 'agendaWeek',
			selectable: true,
			selectHelper: true,
			editable: true,
		});
		
	});
</script>
<div class="container">
	<ul class="breadcrumb">
		<li class="active"><?php print $username ?>, </li>
		<li><a href="/user/logout">logout</a></li>
	</ul>
	<div id='calendar'></div>
</div>

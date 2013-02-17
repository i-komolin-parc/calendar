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
			select: function(start, end) {
				console.log();
				$('#EventEdit').modal('show');
				$('#SaveLink').click(function() {
					options = {
						'timeTo': start,
						'timeFrom': end,
						'username': '<?php print $username ?>',
						'type': $('#EventType  option:selected').val(),
						'title': $('#EventTitle').val(),
						'description': $('#EventDescription').val(),
					}
					
					$.ajax({
						url: '/ajax/AddEvent',
						type: 'post',
						data: options,
						success: function (result) {
							//handler result
						}
					});
				});
			},
		});
	});
</script>
<div class="container">
	<ul class="breadcrumb">
		<li class="active"><?php print $username ?>, </li>
		<li><a href="/user/logout">logout</a></li>
	</ul>
	<div id='calendar'></div>

	<div id="EventEdit" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">Event</h3>
		</div>
		<div class="modal-body">
			<select id="EventType">
				<?php foreach($types as $key => $type) : ?>
					<option value="<?php print $key ?>"><?php print $type ?></option>
				<?php endforeach; ?>
			</select>
			<br />
			<input type="text" id="EventTitle" class="span6" placeholder="Title">
			<br />
			<textarea id="EventDescription" class="span6" placeholder="Description"></textarea>
		</div>
		<div class="modal-footer">
			<a id="SaveLink" class="btn btn-primary">Save changes</a>
		</div>
	</div>
</div>

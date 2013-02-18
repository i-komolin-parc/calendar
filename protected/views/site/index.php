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
			contentHeight: 2000,
			firstDay: 1,
			axisFormat: 'HH:mm',
			defaultView: 'agendaWeek',
			selectable: true,
			selectHelper: true,
			editable: true,
			select: function(start, end) {
				var eventDate = start.getFullYear() + '-' + (start.getMonth() + 1) + '-' + start.getDate();
				var startHours = start.getHours();
				var startMinutes = start.getMinutes();
				var endHours = end.getHours();
				var endMinutes = end.getMinutes();
				
				$('#ModalLabel').html('Event on ' + eventDate);
				$('#EventTimeFrom').val((startHours > 10 ? '' : '0') + startHours + ':' + (startMinutes > 10 ? '' : '0') + startMinutes);
				$('#EventTimeTo').val((endHours > 10 ? '' : '0') + endHours + ':' + (endMinutes > 10 ? '' : '0') + endMinutes);
				$('#EventEdit').modal('show');
				$('#SaveLink').click(function() {
					options = {
						'timeFrom': eventDate + ' ' + $('#EventTimeFrom').val(),
						'timeTo': eventDate + ' ' + $('#EventTimeTo').val(),
						'type': $('#EventType  option:selected').val(),
						'title': $('#EventTitle').val(),
						'description': $('#EventDescription').val(),
					}
					
					$.ajax({
						url: '/ajax/AddEvent',
						type: 'post',
						data: options,
						success: function () {
							$('#EventEdit').modal('hide');
						}
					});
				});
			},
		});
	});
	
	function fill(n, glue){
		return new Array(n+1).join(glue);
	}

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
			<h3 id="ModalLabel"></h3>
		</div>
		<div class="modal-body">
			<input id="EventTimeFrom" type="time" style="width:60px"/> 
			<input id="EventTimeTo" type="time" style="width:60px"/>
			<br />
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

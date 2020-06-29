<?php

use yii\helpers\Html;

$this->title = Yii::t('backend', 'Calendar');
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Container -->
<div class="container-fluid">
    <!-- Row -->
    <div class="row">
        <div class="col-xl-12 pa-0">
            <div class="calendarapp-wrap">
                <div class="calendarapp-sidebar">
                    <div class="nicescroll-bar">
                        <a id="close_calendarapp_sidebar" href="javascript:void(0)" class="close-calendarapp-sidebar">
                            <span class="feather-icon"><i data-feather="chevron-left"></i></span>
                        </a>
                        <div class="add-event-wrap">
                            <div class="calendar-event alert alert-success alert-dismissible fade show" role="alert">
                                <p>NYC Conference</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="calendar-event alert alert-primary alert-dismissible fade show" role="alert">
                                <p>Family Lunch</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="calendar-event alert alert-danger alert-dismissible fade show" role="alert">
                                <p>UX Meetup</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="remove_event" checked>
                            <label class="custom-control-label" for="remove_event">Remove after drop</label>
                        </div>
                        <button type="button" class="btn btn-success btn-block mt-50 mb-20" data-toggle="modal"
                                data-target="#exampleModalEmail">
                            Add event
                        </button>
                    </div>
                </div>

                <div class="calendar-wrap">
                    <div id="calendar"></div>
                </div>
                <!-- Compose email -->
                <div class="modal fade" id="exampleModalEmail" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalEmail" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-dark">
                                <h6 class="modal-title text-white" id="exampleModalPopoversLabel">Add new event</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="inputEvent">Event name</label>
                                        <input type="text" placeholder="Event" id="inputEvent" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDate">Date</label>
                                        <input type="text" name="daterange" id="inputDate" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputTime">Time</label>
                                        <input type="text" id="inputTime" class="form-control input-timepicker">
                                    </div>
                                    <div class="form-group custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="all_day">
                                        <label class="custom-control-label" for="all_day">All day event</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputTime">Set Priority</label>
                                        <select id="event_priority" class="form-control custom-select">
                                            <option selected value="primary">Important</option>
                                            <option value="danger">Overdue</option>
                                            <option value="warning">Upcoming</option>
                                            <option value="info">Working</option>
                                            <option value="success">Completed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button id="add_event" class="btn btn-success btn-block mr-10" type="submit">
                                            Add
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Compose email -->
            </div>
        </div>
    </div>
    <!-- /Row -->
</div>
<!-- /Container -->

<?php
$js = <<< JS
    var drag =  function() {
        $('.calendar-event').each(function() {
		
		// store data so the calendar knows to render an event upon drop
        $(this).data('event', {
            title: $.trim($(this).find('p').text()), // use the element's text as the event title
            backgroundColor: $(this).css('background-color'), // use the element's background color & border color as the event border color
            borderColor: $(this).css('background-color').replace(')', ', 0.3)').replace('rgb', 'rgba'),
            textColor: $(this).css('color'), // use the element's text color as the event text color
            stick: true // maintain when user navigates (see docs on the renderEvent method)
		});
		
        // make the event draggable using jQuery UI
        $(this).draggable({
            zIndex: 1111999,
            revert: true,      // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
        });
    });
    };
    
    var removeEvent =  function() {
		$(document).on('click','.remove-calendar-event',function(e) {
			$(this).closest('.calendar-event').fadeOut();
        return false;
    });
    };
    $(document).on('click','#add_event',function(e) {
		$('<div class="calendar-event alert alert-'+$( "#event_priority" ).val()+' alert-dismissible fade show"><p>' + $('#inputEvent').val() + '</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>').insertAfter(".calendar-event:last-child").draggable();
		$(this).parents('.modal').find('.close').trigger('click');
		drag();
		return false;
	});
  
    
    
    drag();
    removeEvent();
    
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth();
    var year = date.getFullYear();
	
	$('#calendar').fullCalendar({
	themeSystem: 'bootstrap4',
	  customButtons: {
		calendarSidebar: {
			text: 'icon',
		}
	},
	header: {
	left: 'calendarSidebar ,today',
	center: 'prev,title,next',
	right: 'month,agendaWeek,agendaDay,listMonth'
	},
	droppable: true,	
	editable: true,
	height: 'parent',
	eventLimit: true, // allow "more" link when too many events
	windowResizeDelay:500,
	events: [{
				title: 'Conference',
				start: '2019-12-25',
				backgroundColor: 'rgb(188, 231, 199)',
                borderColor: 'rgba(188, 231, 199, 0.3)',
				textColor: '#05592b'
			},
			{
				title: 'Long Event',
				start: '2020-05-07',
				end: '2020-05-10',
				backgroundColor: 'rgb(253, 197, 195)',
                borderColor: 'rgba(253, 197, 195, 0.3)',
				textColor: '#8b0c12'
            },
			{
				title: 'Meetings',
				start: '2019-12-27',
				backgroundColor: 'rgb(178, 230, 250)',
                borderColor: 'rgba(178, 230, 250, 0.3)',
			    textColor: '#075875'
			},
			{
				title: 'Sports',
				start: '2019-12-01',
				backgroundColor: 'rgb(253, 197, 195)',
                borderColor: 'rgba(253, 197, 195, 0.3)',
			    textColor: '#8b0c12'
			},
			{
				title: 'Party',
				start: '2019-12-22',
				backgroundColor: 'rgb(253, 197, 195)',
                borderColor: 'rgba(253, 197, 195, 0.3)',
			    textColor: '#8b0c12'
			},
			{
				title: 'Travel',
				start: '2019-12-10',
				backgroundColor: 'rgb(253, 197, 195)',
                borderColor: 'rgba(253, 197, 195, 0.3)',
			    textColor: '#8b0c12'
			},
			{
				title: 'Conference',
				start: '2019-12-25',
				backgroundColor: 'rgb(253, 197, 195)',
                borderColor: 'rgba(253, 197, 195, 0.3)',
			    textColor: '#8b0c12'
			},
			{
              title: 'Long Event',
              start: '2019-12-07',
              end: '2019-12-11',
			  backgroundColor: 'rgb(253, 197, 195)',
                borderColor: 'rgba(253, 197, 195, 0.3)',
			    textColor: '#8b0c12'
            },
			{
              id: 999,
              title: 'Repeating Event',
              start: '2019-12-09',
			  backgroundColor: 'rgb(188, 231, 199)',
              borderColor: 'rgba(188, 231, 199, 0.3)',
			  textColor: '#05592b'
            }
		],
		drop: function() {
			//alert($(this).css('background-color'));
			if($("#remove_event").is(':checked'))
				$(this).remove();
		}
	});
	setTimeout(function(){
		$('.fc-left .fc-calendarSidebar-button').attr("id","calendarapp_sidebar_move").html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>');
		$('.fc-left .fc-today-button').removeClass('btn-primary').addClass('btn-outline-secondary btn-sm');
		$('.fc-center .btn').removeClass('btn-primary').addClass('btn-outline-light btn-sm');
		$('.fc-right .btn-group').addClass('btn-group-sm');
		$('.fc-right .btn').removeClass('btn-primary').addClass('btn-outline-secondary');
	},100);
	
	
	
	/* Date range with a callback*/
	$('input[name="daterange"]').daterangepicker({
		opens: 'left',
		"cancelClass": "btn-secondary",
	}, function(start, end, label) {
		console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
	});
	
	/* Date range picker with times*/
	$('input[name="datetimes"]').daterangepicker({
		timePicker: true,
		startDate: moment().startOf('hour'),
		endDate: moment().startOf('hour').add(32, 'hour'),
		"cancelClass": "btn-secondary",
		locale: {
		  format: 'M/DD hh:mm A'
		}
	});
	
	/* Single table*/
	$('input[name="birthday"]').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
		minYear: 1901,
		"cancelClass": "btn-secondary",
		maxYear: parseInt(moment().format('YYYY'),10)
		}, function(start, end, label) {
		var years = moment().diff(start, 'years');
		alert("You are " + years + " years old!");
	});
	
	/* Limit selectable dates*/
	$('.input-limit-datepicker').daterangepicker({
		format: 'MM/DD/YYYY',
		minDate: '06/01/2018',
		maxDate: '06/30/2018',
		buttonClasses: ['btn', 'btn-sm'],
		"cancelClass": "btn-secondary",
		dateLimit: {
			days: 6
		}
	});
	
	/* Predefind range*/
	var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
	
    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    },cb);

    cb(start, end);
	
	/* Time picker*/
	$('.input-timepicker').daterangepicker({
		timePicker: true,
		timePicker24Hour: true,
		timePickerIncrement: 1,
		timePickerSeconds: true,
		locale: {
			format: 'HH:mm:ss'
		}
	}).on('show.daterangepicker', function (ev, picker) {
		picker.container.find(".calendar-table").hide();
	});
JS;

$this->registerJs($js, \yii\web\View::POS_END);

?>

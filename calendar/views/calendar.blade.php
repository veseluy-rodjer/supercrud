@extends('admin.layouts.app')

@section('styles')

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fullcalendar/main.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/fullcalendar-daygrid/main.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/fullcalendar-timegrid/main.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/fullcalendar-bootstrap/main.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
	{{-- right color-choose events --}}
	a.text-primary:hover {
		color: #007bff!important;
	}
	a.text-primary:leave {
		color: #007bff!important;
	}
	a.text-success:hover {
		color: #28a745!important;
	}
	a.text-success:leave {
		color: #28a745!important;
	}
	a.text-warning:hover {
		color: #ffc107!important;
	}
	a.text-warning:leave {
		color: #ffc107!important;
	}
	a.text-danger:hover {
		color: #dc3545!important;
	}
	a.text-danger:leave {
		color: #dc3545!important;
	}
	a.text-info:hover {
		color: #17a2b8!important;
	}
	a.text-info:leave {
		color: #17a2b8!important;
	}
	a.text-secondary:hover {
		color: #6c757d!important;
	}
	a.text-secondary:leave {
		color: #6c757d!important;
	}

	{{-- event`s white text --}}
	.fc-event {
		font-weight: 600!important;
		color: white!important;
	}
  </style>

@endsection

@section('content')

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="sticky-top mb-3">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Draggable Events</h4>
                </div>
                <div class="card-body">
                  <!-- the events -->
                  <div class="row" id="external-events">

					@if (isset($user))
						@foreach ($user->events ?? [] as $item)
							<div class="col-11 external-event ui-draggable ui-draggable-handle" data-url="{{ $item->url }}" style="background-color: {{ $item->background_color }}; border-color: {{ $item->border_color }}; color: rgb(255, 255, 255); position: relative;">{{ $item->title }}</div>
							<button type="button" class="col-1 btn btn-danger btn-sm" onclick="openModalRemoveLeftEvent(this)" data-left-event-id="{{ $item->id }}"><i class="fas fa-trash"></i></button>
						@endforeach
					@endif

                    <div class="checkbox">
                      <label for="drop-remove">
                        <input type="checkbox" id="drop-remove">
                        remove after drop
                      </label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Create Event</h3>
                </div>
                <div class="card-body">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                    <ul class="fc-color-picker" id="color-chooser">
                      <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-info" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-secondary" href="#"><i class="fas fa-square"></i></a></li>
                    </ul>
                  </div>
                  <!-- /btn-group -->
                  <div class="input-group">
                    <input id="new-event" type="text" class="form-control" placeholder="Event Title">
                    <div class="input-group-append">
                      <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                    </div>
                  </div>
                  <div class="input-group">
                    <input id="new-url" type="text" class="form-control" placeholder="Event Link">
                    <!-- /btn-group -->
                  </div>
                  <!-- /input-group -->
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

	@include('admin.layouts.modal-for-calendar-link-or-delete')
	@include('admin.layouts.modal-for-calendar-delete-left-events')

@endsection

@section('jscripts')

<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- fullCalendar 2.2.5 -->
<script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('admin/plugins/fullcalendar/main.min.js') }}"></script>
<script src="{{ asset('admin/plugins/fullcalendar-daygrid/main.min.js') }}"></script>
<script src="{{ asset('admin/plugins/fullcalendar-timegrid/main.min.js') }}"></script>
<script src="{{ asset('admin/plugins/fullcalendar-interaction/main.min.js') }}"></script>
<script src="{{ asset('admin/plugins/fullcalendar-bootstrap/main.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js') }}"></script>
<!-- Page specific script -->
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
		$(this).draggable({
		  zIndex        : 1070,
		  revert        : true, // will cause the event to go back to its
		  revertDuration: 0  //  original position after the drag
		})

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        // console.log(eventEl);
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
		  url: eventEl.dataset.url,
        };
      }
    });

    var calendar = new Calendar(calendarEl, {
      plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
	  events: {
		url: '{{ route("calendar.index") }}',
		method: 'GET'
	  },
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
	  locale: 'ru',
	  firstDay: 1,
	  eventLimit: true, // for all non-TimeGrid views
	  dayPopoverFormat: { weekday: 'short', month: 'long', day: 'numeric', year: 'numeric' },
	  allDayText:'@lang("all-day")',
	  views: {
		dayGridMonth: { // name of view
          eventTimeFormat: { hour: 'numeric', minute: '2-digit', meridiem: false }
		},
		timeGridWeek: { // name of view
		  scrollTime: '00:00:00',
		  titleFormat: { year: 'numeric', month: 'long', day: 'numeric' },
	      columnHeaderFormat: { month: 'long', day: 'numeric' },
          displayEventTime: true
		},
		timeGridDay: { // name of view
		  scrollTime: '00:00:00',
          displayEventTime: false
		}
	  },
	  businessHours: {
		  // days of week. an array of zero-based day of week integers (0=Sunday)
		  daysOfWeek: [ 1, 2, 3, 4, 5 ],
		  startTime: false,
		  endTime: false
	  },		
	  eventClick: function(info) {
		info.jsEvent.preventDefault(); // don't let the browser navigate
		let modalForCalendarLinkOrDelete = document.querySelector('#modal-link-or-delete');
		// add url link if url isset
		if (info.event.url) {
		  modalForCalendarLinkOrDelete.querySelector('.modal-footer').insertAdjacentHTML('afterbegin', '<button type="button" class="btn btn-outline-light" data-button="link" data-event-id="" data-dismiss="modal">@lang("follow a link")</button>');
		}
		let buttons = modalForCalendarLinkOrDelete.querySelectorAll('[data-button]');
        for (let item of buttons) {
			item.setAttribute('data-event-id', info.event.id);
		}
		let modalForCalendarLinkOrDeleteJq = $('#modal-link-or-delete');
		modalForCalendarLinkOrDeleteJq.modal('show');
	
		// info.jsEvent.preventDefault(); // don't let the browser navigate
		// // open url in different tab
		// if (info.event.url) {
		//   window.open(info.event.url);
		// }
	  },
      drop      : function(info) {
		async function sendDropToServer() {
			let allDay = info.allDay;
			let start = info.dateStr;
			let title = info.draggedEl.textContent;
			let backgroundColor = info.draggedEl.style.backgroundColor;
			let borderColor = info.draggedEl.style.borderColor;
			let url = info.draggedEl.dataset.url;
			let formData = new FormData();
			formData.append('all_day', allDay);
			formData.append('start', start);
			formData.append('title', title);
			formData.append('background_color', backgroundColor);
			formData.append('border_color', borderColor);
			if (url !== '') {
				formData.append('url', url);
			}
			let response = await fetch('{{ route("calendar.store") }}', {
				headers: {
					'Accept': 'application/json',
					'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
				},
				method: 'POST',
				body: formData
			});
			let	elementErrors = document.querySelectorAll('.invalid-feedback');
			for (let elementError of elementErrors) {
				elementError.remove();
			}
			if (response.status == 422) {
				let result = await response.json();
				for (let [key, val] of Object.entries(result.errors)) {
					let elem = document.querySelector('#' + key.replace(/_/g, '-'));
					elem.classList.add('is-invalid');
					elem.classList.add('error');
					elem.insertAdjacentHTML('afterend', '<span class="invalid-feedback" role="alert">' + val + '</span>');
					return;
				}
			}
			let result = await response.json();
			if (result) {
				// console.log('success');
				return;
			}
			else {
				// console.log('fail');
				return;
			}
		}
		sendDropToServer();
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
			// delete left event from front and from server
            {{-- info.draggedEl.parentNode.removeChild(info.draggedEl); --}}
			let leftEventId = info.draggedEl.nextElementSibling.dataset.leftEventId;
			info.draggedEl.nextElementSibling.remove();
			info.draggedEl.remove();
			let formData = new FormData();
			formData.append('_method', 'delete');
			formData.append('id', leftEventId);
			let response = fetch('{{ route("event.destroy") }}', {
				headers: {
					'Accept': 'application/json',
					'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
				},
				method: 'POST',
				body: formData
			});
			let result = response.then(response => response.json());
			if (result) {
				// console.log('success');
				return;
			}
			else {
				// console.log('fail');
				return;
			}
        }
      },
      eventDrop      : function(info) {
		async function sendEventDropToServer() {
			let id = info.event.id;
			let allDay = info.event.allDay;
			let start = FullCalendar.formatDate(info.event.start, {
			  month: 'numeric',
			  year: 'numeric',
			  day: 'numeric',
			  timeZoneName: 'short',
			  locale: 'ru'
			});
			let end = FullCalendar.formatDate(info.event.end, {
			  month: 'numeric',
			  year: 'numeric',
			  day: 'numeric',
			  timeZoneName: 'short',
			  locale: 'ru'
			});
			// let start =  ("0" + info.event.start.getDate()).slice(-2)+ "-"+("0" + (info.event.start.getMonth() + 1)).slice(-2) + "-" + info.event.start.getFullYear() + " "+("0" + info.event.start.getHours()).slice(-2) +":" + ("0" + info.event.start.getMinutes()).slice(-2) +":" + ("0" + info.event.start.getSeconds()).slice(-2);
			let formData = new FormData();
			formData.append('id', id);
			formData.append('all_day', allDay);
			formData.append('start', start);
			formData.append('end', end);
			let response = await fetch('{{ route("calendar.update") }}', {
				headers: {
					'Accept': 'application/json',
					'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
				},
				method: 'POST',
				body: formData
			});
			let	elementErrors = document.querySelectorAll('.invalid-feedback');
			for (let elementError of elementErrors) {
				elementError.remove();
			}
			if (response.status == 422) {
				let result = await response.json();
				for (let [key, val] of Object.entries(result.errors)) {
					let elem = document.querySelector('#' + key.replace(/_/g, '-'));
					elem.classList.add('is-invalid');
					elem.classList.add('error');
					elem.insertAdjacentHTML('afterend', '<span class="invalid-feedback" role="alert">' + val + '</span>');
					return;
				}
			}
			let result = await response.json();
			if (result) {
				// console.log('success');
				return;
			}
			else {
				// console.log('fail');
				return;
			}
		}
		sendEventDropToServer();
      },
      eventResize      : function(info) {
		async function sendEventResize() {
			let id = info.event.id;
			let allDay = info.event.allDay;
			let start = FullCalendar.formatDate(info.event.start, {
			  month: 'numeric',
			  year: 'numeric',
			  day: 'numeric',
			  timeZoneName: 'short',
			  locale: 'ru'
			});
			let end = FullCalendar.formatDate(info.event.end, {
			  month: 'numeric',
			  year: 'numeric',
			  day: 'numeric',
			  timeZoneName: 'short',
			  locale: 'ru'
			});
			// let start =  ("0" + info.event.start.getDate()).slice(-2)+ "-"+("0" + (info.event.start.getMonth() + 1)).slice(-2) + "-" + info.event.start.getFullYear() + " "+("0" + info.event.start.getHours()).slice(-2) +":" + ("0" + info.event.start.getMinutes()).slice(-2) +":" + ("0" + info.event.start.getSeconds()).slice(-2);
			let formData = new FormData();
			formData.append('id', id);
			formData.append('all_day', allDay);
			formData.append('start', start);
			formData.append('end', end);
			let response = await fetch('{{ route("calendar.update") }}', {
				headers: {
					'Accept': 'application/json',
					'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
				},
				method: 'POST',
				body: formData
			});
			let	elementErrors = document.querySelectorAll('.invalid-feedback');
			for (let elementError of elementErrors) {
				elementError.remove();
			}
			if (response.status == 422) {
				let result = await response.json();
				for (let [key, val] of Object.entries(result.errors)) {
					let elem = document.querySelector('#' + key.replace(/_/g, '-'));
					elem.classList.add('is-invalid');
					elem.classList.add('error');
					elem.insertAdjacentHTML('afterend', '<span class="invalid-feedback" role="alert">' + val + '</span>');
					return;
				}
			}
			let result = await response.json();
			if (result) {
				// console.log('success');
				return;
			}
			else {
				// console.log('fail');
				return;
			}
		}
		sendEventResize();
      }    
    });
    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#007bff' // primary color by default
    //Color chooser button
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
	  let url = $('#new-url').val();
      if (val.length == 0) {
        return
      }

		// sent left event to server
		async function sendLeftEventToServer(createEvents) {
			let formData = new FormData();
			formData.append('title', val);
			formData.append('background_color', currColor);
			formData.append('border_color', currColor);
			if (url !== '') {
				formData.append('url', url);
			}
			let response = await fetch('{{ route("event.store") }}', {
				headers: {
					'Accept': 'application/json',
					'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
				},
				method: 'POST',
				body: formData
			});
			let	elementErrors = document.querySelectorAll('.invalid-feedback');
			for (let elementError of elementErrors) {
				elementError.remove();
			}
			if (response.status == 422) {
				let result = await response.json();
				for (let [key, val] of Object.entries(result.errors)) {
					let elem = document.querySelector('#' + key.replace(/_/g, '-'));
					elem.classList.add('is-invalid');
					elem.classList.add('error');
					elem.insertAdjacentHTML('afterend', '<span class="invalid-feedback" role="alert">' + val + '</span>');
					return;
				}
			}
			let result = await response.json();
			if (result) {
				createEvents(result);
				// console.log('success');
				return;
			}
			else {
				// console.log('fail');
				return;
			}
		}

      //Create events
	  let createEvents = function(result) {
		  var event = $('<div class="col-11"/>')
		  event.css({
			'background-color': currColor,
			'border-color'    : currColor,
			'color'           : '#fff'
		  }).addClass('external-event')
		  event.html(val)
		  event.attr('data-url', url);
		  $('#external-events').children().last().before(event);
		  $('#external-events').children().last().before('<button type="button" class="col-1 btn btn-danger btn-sm" onclick="openModalRemoveLeftEvent(this)" data-left-event-id="' + result.id + '"><i class="fas fa-trash"></i></button>');

		  //Add draggable funtionality
		  ini_events(event)

		  //Remove event from text input and url input
		  $('#new-event').val('')
		  $('#new-url').val('')
      }
		sendLeftEventToServer(createEvents);
    })

	let modalForCalendarLinkOrDeleteJq = $('#modal-link-or-delete');
    // Link or delete event by modal
	modalForCalendarLinkOrDeleteJq.on('shown.bs.modal', function (e) {
		let buttons = document.querySelectorAll('[data-button]');
		for (let item of buttons) {
			item.onclick = async function() {
				let eventId = item.dataset.eventId;
				let event = calendar.getEventById(eventId);
				if (item.dataset.button == 'delete') {
					event.remove();
					let formData = new FormData();
					formData.append('_method', 'delete');
					formData.append('id', eventId);
					let response = await fetch('{{ route("calendar.destroy") }}', {
						headers: {
							'Accept': 'application/json',
							'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
						},
						method: 'POST',
						body: formData
					});
					let result = await response.json();
					if (result) {
						// console.log('success');
						return;
					}
					else {
						// console.log('fail');
						return;
					}
				}
				else if (item.dataset.button == 'link') {
					// open url in different tab
					if (event.url) {
					  window.open(event.url);
					}
				}
			}
		}
	});
	// delete url link from modal for calendar link or delete with close modal
	modalForCalendarLinkOrDeleteJq.on('hidden.bs.modal', function (e) {
		let button = document.querySelector('[data-button="link"]');
		if (button)	button.remove();
	});

  })

	// delete left event from front and from server
	async function openModalRemoveLeftEvent(t) {
		let leftEventId = t.dataset.leftEventId;
		let modalForCalendarDeleteLeftEvents = document.querySelector('#modal-delete-left-events');
		let buttonDeleteLeftEvent =  modalForCalendarDeleteLeftEvents.querySelector('[data-left-event-id-modal]');
		buttonDeleteLeftEvent.dataset.leftEventIdModal = leftEventId;
		buttonDeleteLeftEvent.onclick = removeLeftEvent;
		let modalForCalendarDeleteLeftEventsJq = $('#modal-delete-left-events');
		modalForCalendarDeleteLeftEventsJq.modal('show');

	}
	let removeLeftEvent =  async function(t) {
		let leftEventIdModal = this.dataset.leftEventIdModal;
		let event = document.querySelector('[data-left-event-id="' + leftEventIdModal + '"]');
		event.previousElementSibling.remove();
		event.remove();
		let formData = new FormData();
		formData.append('_method', 'delete');
		formData.append('id', leftEventIdModal);
		let response = await fetch('{{ route("event.destroy") }}', {
			headers: {
				'Accept': 'application/json',
				'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
			},
			method: 'POST',
			body: formData
		});
		let result = await response.json();
		if (result) {
			// console.log('success');
			return;
		}
		else {
			// console.log('fail');
			return;
		}
	}
</script>

@endsection

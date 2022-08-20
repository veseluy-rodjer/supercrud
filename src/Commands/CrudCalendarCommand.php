<?php

namespace VeseluyRodjer\CrudGenerator\Commands;

use Illuminate\Console\Command;

class CrudCalendarCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:calendar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create calendar on fullcalendar base';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
		\File::copy(__DIR__ . '/../../calendar/app/Calendar.php', app_path('Models/Calendar.php'));
		\File::copy(__DIR__ . '/../../calendar/app/Event.php', app_path('Models/Event.php'));
		if (! \File::exists(app_path('Http/Controllers/Admin'))) {
			\File::makeDirectory(app_path('Http/Controllers/Admin'));
		}
		\File::copy(__DIR__ . '/../../calendar/app/controllers/CalendarController.php', app_path('Http/Controllers/Admin/CalendarController.php'));
		\File::copy(__DIR__ . '/../../calendar/app/controllers/EventController.php', app_path('Http/Controllers/Admin/EventController.php'));
		\File::copy(__DIR__ . '/../../calendar/data-bases/2020_00_00_000000_create_calendars_table.php', database_path('migrations/2020_00_00_000000_create_calendars_table.php'));
		\File::copy(__DIR__ . '/../../calendar/data-bases/2020_00_00_000001_create_events_table.php', database_path('migrations/2020_00_00_000001_create_events_table.php'));
		\File::copy(__DIR__ . '/../../calendar/views/modal-for-calendar-delete-left-events.blade.php', resource_path('views/admin/layouts/modal-for-calendar-delete-left-events.blade.php'));
		\File::copy(__DIR__ . '/../../calendar/views/modal-for-calendar-link-or-delete.blade.php', resource_path('views/admin/layouts/modal-for-calendar-link-or-delete.blade.php'));
		if (! \File::exists(resource_path('views/admin/calendar'))) {
			\File::makeDirectory(resource_path('views/admin/calendar'));
		}
		\File::copy(__DIR__ . '/../../calendar/views/calendar.blade.php', resource_path('views/admin/calendar/calendar.blade.php'));
		$calendarRoutes = \File::get(__DIR__ . '/../../calendar/routes/calendarRoutes.stub');
		\File::append(base_path('routes/web.php'), "\n" . $calendarRoutes);

        // Updating list of tables into sidebar.php file
        $pathToListFile = resource_path('views/admin/layouts/list.blade.php');
		$list ='<li class="nav-item">
	<a href="{{ route(\'calendar.index\') }}" class="nav-link">
	  <i class="fas fa-circle nav-icon"></i>
	  <p>Calendar</p>
	</a>
</li>';
        \File::append($pathToListFile, "\n" . $list);

		// Add dependents into User model
		$userModel = \File::get(app_path('Models/User.php'));
		$replace = '
    public function calendars()
    {
        return $this->hasMany(Calendar::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }';
		$replaceLast = \Str::replaceLast('}', $replace . "\n" . '}', $userModel);
		\File::put(app_path('Models/User.php'), $replaceLast);
    }
}

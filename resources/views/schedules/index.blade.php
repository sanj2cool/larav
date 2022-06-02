<x-app-layout>
    <style>
        table,
        th,
        td {
            border: 1px solid;
            text-align: center;
        }

        .schedule-pending{
            border: 2px solid;
            border-color: green;
            
        }
        .schedule-past{
            border-color: red;
        }

    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Schedule Calendar
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table width="100%">
                        <thead>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>Event</th>
                            <th>Person</th>
                            <th>Status (not implemented yet)</th>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                                <tr>
                                    <td class="{{ $schedule->schedule_time->isPast() ? 'schedule-past' :'schedule-pending' }}" >{{ $schedule->schedule_time->format('Y-m-d') }}</td>
                                    <td>{{ $schedule->schedule_time->format('H:i:s') }}</td>
                                    <td>{{ $schedule->event }}</td>
                                    <td>{{ $schedule->user->name }}</td>
                                    <td></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div>
                    {{ $schedules->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

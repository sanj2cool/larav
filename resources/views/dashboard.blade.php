<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <pre>
        {{ print_r(auth()->user())}}
    </pre>
    @if (auth()->user()->hasPermission('schedule-import') )

        @if(auth()->user()->id=='6')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!--
                        <div>
                            Pending emails: {{ \App\Models\UserEmailSchedule::where('schedule_time', '>', now())->count() }}
                        </div>
                        <div>
                            Past emails: {{ \App\Models\UserEmailSchedule::where('schedule_time', '<', now())->count() }}
                        </div> -->
                        <form action="{{ route('schedule.import') }} " method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="upload-file">Upload file</label>
                                <input id="upload-file" type="file" name="file">
                                <x-button class="ml-3">
                                    Start
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @else 
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div>
                            Pending emails: {{ \App\Models\UserEmailSchedule::where('schedule_time', '>', now())->count() }}
                        </div>
                        <div>
                            Past emails: {{ \App\Models\UserEmailSchedule::where('schedule_time', '<', now())->count() }}
                        </div>
                        <form action="{{ route('schedule.import') }} " method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="upload-file">Upload file</label>
                                <input id="upload-file" type="file" name="file">
                                <x-button class="ml-3">
                                    Start
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
       
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

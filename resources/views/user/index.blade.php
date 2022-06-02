

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
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Access Level</th>
                            <th>Options</th>
                        </thead>
                        <tbody>
                            @foreach ($all_users as $suser)
                                <tr>
                                    <td>{{ $suser->id }}</td>
                                    <td>{{ $suser->name }}</td>
                                    <td>{{ $suser->email }}</td>
                                    <td> 
                                    <select name="user_access" id="user_access">
                                      <option value="0">0</option>
                                      <option value="1">Admin</option>
                                      <option value="2">Subscriber</option>  
                                    </select>  </td>
                                    <td>
                                        <a href="/users/edit/{{$suser->id}}"> <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3">Update</button></a>
                                        <a href="/users/delete/{{$suser->id}}"> <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3">Delete</button></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody> 
                    </table>
                </div>
                <div>
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

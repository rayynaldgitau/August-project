<x-app-layout>

    <div class="container mx-auto p-5">
        <div class="flex justify-center mb-4">
            <a href="{{ url('roles') }}" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded sm:w-1/3 md:w-1/4 lg:w-1/5 xl:w-1/6">Roles</a>
            <a href="{{ url('permissions') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-2 sm:w-1/3 md:w-1/4 lg:w-1/5 xl:w-1/6">Permissions</a>
            <a href="{{ url('users') }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded sm:w-1/3 md:w-1/4 lg:w-1/5 xl:w-1/6">Users</a>
        </div>
    </div>

    <div class="container mx-auto p-5">
        <div class="flex justify-center">
            <div class="w-full sm:w-3/4 md:w-2/3 lg:w-1/2 xl:w-1/3 p-6">
                @if (session('status'))
                    <div class="bg-green-500 text-white font-bold py-2 px-4 rounded">{{ session('status') }}</div>
                @endif

                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="mb-4">
                        <h4 class="text-gray-700">Permissions
                            @can('create permission')
                            <a href="{{ url('permissions/create') }}" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded float-right">Add Permission</a>
                            @endcan
                        </h4>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full text-left whitespace-no-wrap">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="px-4 py-2">Id</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2" width="40%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                <tr>
                                    <td class="border px-4 py-2">{{ $permission->id }}</td>
                                    <td class="border px-4 py-2">{{ $permission->name }}</td>
                                    <td class="border px-4 py-2">
                                        <div class="flex justify-end">
                                            @can('update permission')
                                            <a href="{{ url('permissions/'.$permission->id.'/edit') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                                            @endcan

                                            @can('delete permission')
                                            <a href="{{ url('permissions/'.$permission->id.'/delete') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</a>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
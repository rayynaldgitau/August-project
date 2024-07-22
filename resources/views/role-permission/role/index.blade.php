<x-app-layout>

    <div class="container mx-auto mt-5">
        <a href="{{ url('roles') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Roles</a>
        <a href="{{ url('permissions') }}" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded mx-2">Permissions</a>
        <a href="{{ url('users') }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mx-2">Users</a>
    </div>

    <div class="container mx-auto mt-2">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="bg-green-500 text-white font-bold py-2 px-4 rounded">{{ session('status') }}</div>
                @endif

                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="flex justify-between mb-4">
                        <h4 class="text-lg font-bold">Roles</h4>
                        @can('create role')
                            <a href="{{ url('roles/create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Role</a>
                        @endcan
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="px-2 py-2 text-center w-1/3">Id</th>
                                    <th class="px-2 py-2 text-center w-1/3">Name</th>
                                    <th class="px-2 py-2 text-center w-1/3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                    <td class="px-2 py-2 text-center w-1/3">{{ $role->id }}</td>
                                    <td class="px-2 py-2 text-center w-1/3">{{ $role->name }}</td>
                                    <td class="px-2 py-2 text-center w-1/3">
                                        <div class="flex justify-center">
                                            <a href="{{ url('roles/'.$role->id.'/give-permissions') }}" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded mr-2">
                                                Add / Edit Role Permission
                                            </a>

                                            @can('update role')
                                            <a href="{{ url('roles/'.$role->id.'/edit') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">
                                                Edit
                                            </a>
                                            @endcan

                                            @can('delete role')
                                            <a href="{{ url('roles/'.$role->id.'/delete') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                Delete
                                            </a>
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
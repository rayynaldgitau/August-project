<x-app-layout>

    <div class="max-w-md mx-auto mt-5">
        <a href="{{ url('roles') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-1">Roles</a>
        <a href="{{ url('permissions') }}" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded mx-1">Permissions</a>
        <a href="{{ url('users') }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mx-1">Users</a>
    </div>

    <div class="max-w-4xl mx-auto mt-2">
        <div class="flex flex-wrap justify-center">
            <div class="w-full md:w-full xl:w-full p-3">

                @if (session('status'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="mb-4">
                        <h4 class="text-lg font-bold">Users
                            @can('create user')
                            <a href="{{ url('users/create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right">Add User</a>
                            @endcan
                        </h4>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full whitespace-no-wrap table-auto">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="px-4 py-2">Id</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Roles</th>
                                    <th class="px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td class="px-4 py-2">{{ $user->id }}</td>
                                    <td class="px-4 py-2">{{ $user->name }}</td>
                                    <td class="px-4 py-2">{{ $user->email }}</td>
                                    <td class="px-4 py-2">
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $rolename)
                                                <span class="bg-blue-100 text-blue-800 text-xs font-bold mr-2 px-2.5 py-0.5 rounded">{{ $rolename }}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">
                                        @can('update user')
                                        <a href="{{ url('users/'.$user->id.'/edit') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                        @endcan

                                        @can('delete user')
                                        <a href="{{ url('users/'.$user->id.'/delete') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">Delete</a>
                                        @endcan
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
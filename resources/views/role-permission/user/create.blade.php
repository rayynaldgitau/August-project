<x-app-layout>
    <div class="max-w-md mx-auto mt-5">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                @if ($errors->any())
                <ul class="list-none mb-4">
                    @foreach ($errors->all() as $error)
                        <li class="text-red-500">{{$error}}</li>
                    @endforeach
                </ul>
                @endif

                <div class="flex justify-between mb-4">
                    <h4 class="text-lg font-bold">Create User</h4>
                    <a href="{{ url('users') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Back</a>
                </div>

                <form action="{{ url('users') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block mb-2 text-sm font-bold">Name</label>
                        <input type="text" name="name" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" />
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block mb-2 text-sm font-bold">Email</label>
                        <input type="text" name="email" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" />
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block mb-2 text-sm font-bold">Password</label>
                        <input type="text" name="password" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" />
                    </div>
                    <div class="mb-4">
                        <label for="roles" class="block mb-2 text-sm font-bold">Roles</label>
                        <select name="roles[]" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" multiple>
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                            <option value="{{ $role }}">{{ $role }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
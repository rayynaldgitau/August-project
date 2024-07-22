<x-app-layout>
    <div class="container mx-auto p-5">
        <div class="flex justify-center">
            <div class="w-full lg:w-1/2 xl:w-1/3 p-6">
                @if ($errors->any())
                <ul class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
                @endif

                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="mb-4">
                        <h4 class="text-lg font-bold">Create User
                            <a href="{{ url('users') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded float-right">Back</a>
                        </h4>
                    </div>
                    <div class="mb-4">
                        <form action="{{ url('users') }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <label for="" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                                <input type="text" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                            </div>
                            <div class="mb-4">
                                <label for="" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                                <input type="text" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                            </div>
                            <div class="mb-4">
                                <label for="" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                                <input type="text" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                            </div>
                            <div class="mb-4">
                                <label for="" class="block text-gray-700 text-sm font-bold mb-2">Roles</label>
                                <select name="roles[]" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" multiple>
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
        </div>
    </div>
</x-app-layout>
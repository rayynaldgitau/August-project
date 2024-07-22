<x-app-layout>

  <div class="max-w-md mx-auto mt-5">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6 bg-white border-b border-gray-200">
        @if ($errors->any())
          <ul class="list-none mb-4">
            @foreach ($errors->all() as $error)
              <li class="text-sm text-red-600">{{$error}}</li>
            @endforeach
          </ul>
        @endif

        <div class="flex justify-between mb-4">
          <h4 class="text-lg font-bold">Edit User</h4>
          <a href="{{ url('users') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Back</a>
        </div>

        <form action="{{ url('users/'.$user->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="mb-4">
            <label for="name" class="block text-sm font-bold mb-2">Name</label>
            <input type="text" name="name" value="{{ $user->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
          </div>

          <div class="mb-4">
            <label for="email" class="block text-sm font-bold mb-2">Email</label>
            <input type="text" name="email" readonly value="{{ $user->email }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
          </div>

          <div class="mb-4">
            <label for="password" class="block text-sm font-bold mb-2">Password</label>
            <input type="text" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            @error('password') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
          </div>

          <div class="mb-4">
            <label for="roles" class="block text-sm font-bold mb-2">Roles</label>
            <select name="roles[]" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" multiple>
              <option value="">Select Role</option>
              @foreach ($roles as $role)
                <option
                  value="{{ $role }}"
                  {{ in_array($role, $userRoles) ? 'selected':'' }}
                >
                  {{ $role }}
                </option>
              @endforeach
            </select>
            @error('roles') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
          </div>

          <div class="mb-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</x-app-layout>
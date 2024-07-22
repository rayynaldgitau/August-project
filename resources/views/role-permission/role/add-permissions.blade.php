<x-app-layout>
  <div class="max-w-3xl mx-auto mt-5">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6 bg-white border-b border-gray-200">
        @if (session('status'))
          <div class="alert alert-success mb-4">{{ session('status') }}</div>
        @endif

        <div class="flex justify-between mb-4">
          <h4 class="text-lg">Role : {{ $role->name }}</h4>
          <a href="{{ url('roles') }}" class="btn btn-danger">Back</a>
        </div>

        <form action="{{ url('roles/'.$role->id.'/give-permissions') }}" method="POST">
          @csrf
          @method('PUT')

          <div class="mb-4">
            @error('permission')
            <span class="text-red-500">{{ $message }}</span>
            @enderror

            <label for="" class="block mb-2">Permissions</label>

            <div class="flex flex-wrap -mx-4">
              @foreach ($permissions as $permission)
              <div class="w-full md:w-1/2 xl:w-1/3 p-4">
                <label class="flex items-center">
                  <input
                    type="checkbox"
                    name="permission[]"
                    value="{{ $permission->name }}"
                    {{ in_array($permission->id, $rolePermissions) ? 'checked':'' }}
                  />
                  <span class="ml-2">{{ $permission->name }}</span>
                </label>
              </div>
              @endforeach
            </div>

          </div>
          <div class="mb-4">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
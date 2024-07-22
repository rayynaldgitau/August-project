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
                <h4 class="text-lg font-bold">Create Permission</h4>
                <a href="{{ url('permissions') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Back</a>
            </div>

            <form action="{{ url('permissions') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block mb-2 text-sm font-bold">Permission Name</label>
                    <input type="text" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" />
                </div>
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

</x-app-layout>
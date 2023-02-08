<x-app-layout>


    <div class="pt-2 p-4 text-gray-900">
        <h1 class="py-4">{{ $user->name }}</h1>

        <div class="mb-5 flex">
            <a href="{{ route('admin.users.edit', $user) }}" class="mr-2 text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Edit</a>

            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="mr-1">
                @csrf
                @method('DELETE')
                <button class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Delete</button>
            </form>

        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="px-6 py-3">ID</th><td>{{ $user->id }}</td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="px-6 py-3">Имя</th><td>{{ $user->name }}</td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="px-6 py-3">Email</th><td>{{ $user->email }}</td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="px-6 py-3">Роль</th>
                        <td>
                            {{ $roles[$user->role] }}
                        </td>
                    </tr>
                <tbody>
            </tbody>
        </table>
        </div>

    </div>

</x-app-layout>

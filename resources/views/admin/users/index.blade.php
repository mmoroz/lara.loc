<x-app-layout>

    <div class="pt-2 p-4 text-gray-900">
        <h1 class="py-4">Пользователи</h1>

        <form action="?" method="GET" class="mb-5 flex flex-wrap items-center">
            <div class="mb-6 mr-3">
                <input id="name" placeholder="Name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="name" value="{{ request('name') }}">
            </div>
            <div class="mb-6 mr-3">
                <input id="email" placeholder="Email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="email" value="{{ request('email') }}">
            </div>
            <div class="mb-6">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Найти</button>
            </div>

        </form>

        <p class="my-5"><a href="{{ route('admin.users.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Добавить пользователя</a></p>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Имя</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Роль</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-3">{{ $user->id }}</td>
                        <td class="px-6 py-3">
                            <a class="text-blue-500 underline" href="{{ route('admin.users.show', $user) }}">{{ $user->name }}</a>
                        </td>
                        <td class="px-6 py-3">{{ $user->email }}</td>
                        <td class="px-6 py-3">{{ $roles[$user->role] }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

        <div class="my-5">
            {{ $users->links() }}
        </div>


    </div>

</x-app-layout>

<x-app-layout>


    <div class="pt-2 p-4 text-gray-900">
        <h1 class="py-4">{{ $region->name }}</h1>

        <div class="mb-5 flex">
            <a href="{{ route('admin.regions.edit', $region) }}" class="mr-2 text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Редактировать</a>

            <form method="POST" action="{{ route('admin.regions.destroy', $region) }}" class="mr-1">
                @csrf
                @method('DELETE')
                <button class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Удалить</button>
            </form>

        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="px-6 py-3">ID</th><td>{{ $region->id }}</td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="px-6 py-3">Имя</th><td>{{ $region->name }}</td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="px-6 py-3">Email</th><td>{{ $region->slug }}</td>
                    </tr>
                </tbody>

            </table>

            <a href="{{ route('admin.regions.create', ['parent' => $region->id]) }}" class="mt-4 mb-4 ml-4 inline-block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Добавить регион</a>


            @include('admin.regions._list', ['regions' => $regions])

        </div>

    </div>

</x-app-layout>

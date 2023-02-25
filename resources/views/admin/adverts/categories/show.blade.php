<x-app-layout>


    <div class="pt-2 p-4 text-gray-900">
        <h1 class="py-4">{{ $category->name }}</h1>

        <div class="mb-5 flex">
            <a href="{{ route('admin.categories.edit', $category) }}" class="mr-2 text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Редактировать</a>

            <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" class="mr-1">
                @csrf
                @method('DELETE')
                <button class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Удалить</button>
            </form>

        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="px-6 py-3">ID</th><td>{{ $category->id }}</td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="px-6 py-3">Имя</th><td>{{ $category->name }}</td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="px-6 py-3">Email</th><td>{{ $category->slug }}</td>
                    </tr>
                </tbody>

            </table>

        </div>

        <div class="mb-4 mt-4">
        <a href="{{ route('admin.categories.attributes.create', $category) }}" class="mr-2 text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Добавить атрибуты</a>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-3">Сортировка</th>
                            <th class="px-6 py-3">Наименование</th>
                            <th class="px-6 py-3">Slug</th>
                            <th class="px-6 py-3">Обязательно</th>
                        </tr>
                    </thead>
                    <tbody>

                    <tr><th colspan="4" class="px-6 py-3">Родительские атрибуты</th></tr>

                    @forelse ($parentAttributes as $attribute)
                        <tr>
                            <td class="px-6 py-3">{{ $attribute->sort }}</td>
                            <td class="px-6 py-3">{{ $attribute->name }}</td>
                            <td class="px-6 py-3">{{ $attribute->type }}</td>
                            <td class="px-6 py-3">{{ $attribute->required ? 'Да' : '' }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-6 py-3">Нет записей</td></tr>
                    @endforelse

                    <tr><th colspan="4" class="px-6 py-3">Собственные атрибуты</th></tr>

                    @forelse ($attributes as $attribute)
                        <tr>
                            <td class="px-6 py-3">{{ $attribute->sort }}</td>
                            <td class="px-6 py-3">
                                <a class="underline text-blue-600" href="{{ route('admin.categories.attributes.show', [$category, $attribute]) }}">{{ $attribute->name }}</a>
                            </td>
                            <td class="px-6 py-3">{{ $attribute->type }}</td>
                            <td class="px-6 py-3">{{ $attribute->required ? 'Да' : '' }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-6 py-3">Нет записей</td></tr>
                    @endforelse

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</x-app-layout>

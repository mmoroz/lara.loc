<x-app-layout>
    <div class="pt-2 p-4 text-gray-900">
        <h1 class="py-4">Категории</h1>

        <a href="{{ route('admin.categories.create') }}" class="inline-block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Добавить категорию</a>

        @if(!$categories->isEmpty())
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">Наименование</th>
                        <th class="px-6 py-3">Slug</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($categories as $category)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-3">
                                    @for ($i = 0; $i < $category->depth; $i++) &mdash; @endfor
                                    <a class="text-blue-500 underline" href="{{ route('admin.categories.show', $category) }}">{{ $category->name }}</a>
                                </td>
                                <td class="px-6 py-3">{{ $category->slug }}</td>
                                <td class="px-6 py-3 w-[250px]">
                                    <div class="flex flex-row">
                                        <form method="POST" action="{{ route('admin.categories.first', $category) }}" class="mr-1">
                                            @csrf
                                            <button class="inline-block text-white bg-gray-400 hover:bg-gray-500 focus:outline-none rounded-lg text-sm w-full px-2.5 py-1 text-center"><span class="fa fa-angle-double-up"></span></button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.categories.up', $category) }}" class="mr-1">
                                            @csrf
                                            <button class="inline-block text-white bg-gray-400 hover:bg-gray-500 focus:outline-none rounded-lg text-sm w-full px-2.5 py-1 text-center"><span class="fa fa-angle-up"></span></button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.categories.down', $category) }}" class="mr-1">
                                            @csrf
                                            <button class="inline-block text-white bg-gray-400 hover:bg-gray-500 focus:outline-none rounded-lg text-sm w-full px-2.5 py-1 text-center"><span class="fa fa-angle-down"></span></button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.categories.last', $category) }}" class="mr-1">
                                            @csrf
                                            <button class="inline-block text-white bg-gray-400 hover:bg-gray-500 focus:outline-none rounded-lg text-sm w-full px-2.5 py-1 text-center"><span class="fa fa-angle-double-down"></span></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        @endif

    </div>
</x-app-layout>

<x-app-layout>
    <div class="pt-2 p-4 text-gray-900">
        <h1 class="py-4">Регионы</h1>

        <a href="{{ route('admin.regions.create') }}" class="inline-block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Добавить регион</a>


        @include('admin.regions._list', ['regions' => $regions])

        <div class="my-5">
            {{ $regions->links() }}
        </div>

    </div>
</x-app-layout>

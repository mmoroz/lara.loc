@if(!$regions->isEmpty())
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3">
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
    <tr>
        <th class="px-6 py-3">Наименование</th>
        <th class="px-6 py-3">Slug</th>
    </tr>
    </thead>
    <tbody>

    @foreach ($regions as $region)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="px-6 py-3"><a href="{{ route('admin.regions.show', $region) }}" class="text-blue-500 underline">{{ $region->name }}</a></td>
            <td class="px-6 py-3">{{ $region->slug }}</td>
        </tr>
    @endforeach

    </tbody>
</table>
</div>
@endif


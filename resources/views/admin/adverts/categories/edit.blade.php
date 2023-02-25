<x-app-layout>

    <div class="pt-2 p-4 text-gray-900">
        <h1 class="py-4">Добавить категорию</h1>

        <form method="POST" action="{{ route('admin.categories.update', $category) }}">
            @csrf
            @method('PUT')

            <div class="flex flex-wrap mb-4 w-full">

                <div class="w-1/2 pr-4">
                    <x-input-label for="name" :value="__('Наименование')" />
                    <x-text-input value="{{ old('name', $category->name) }}" id="name" name="name" type="text" class="mt-1 block w-full" />
                    @if ($errors->has('name'))
                        <span class="text-red-600"><strong>{{ $errors->first('name') }}</strong></span>
                    @endif
                </div>

                <div class="w-1/2">
                    <x-input-label for="slug" :value="__('Slug')" />
                    <x-text-input value="{{ old('slug', $category->slug) }}" id="slug" name="slug" type="text" class="mt-1 block w-full" />
                    @if ($errors->has('slug'))
                        <span class="text-red-600"><strong>{{ $errors->first('slug') }}</strong></span>
                    @endif
                </div>

            </div>

            <div class="mb-4">
                <select class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="parent">
                    <option value="">Выберите родительскую категорию</option>
                    @foreach ($parents as $parent)
                        <option value="{{ $parent->id }}"{{ $parent->id == old('parent', $category->parent_id) ? ' selected' : '' }}>
                            @for ($i = 0; $i < $parent->depth; $i++) &mdash; @endfor
                            {{ $parent->name }}
                        </option>
                    @endforeach;
                </select>
                @if ($errors->has('parent'))
                    <span class="text-red-600"><strong>{{ $errors->first('parent') }}</strong></span>
                @endif
            </div>

            <x-primary-button>{{ __('Сохранить') }}</x-primary-button>


        </form>
    </div>

</x-app-layout>


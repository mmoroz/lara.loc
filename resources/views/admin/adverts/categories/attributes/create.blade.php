<x-app-layout>

    <div class="pt-2 p-4 text-gray-900">
        <h1 class="py-4">Добавить атрибут</h1>

        <form method="POST" action="{{ route('admin.categories.attributes.store', $category) }}">
            @csrf

            <div class="flex flex-wrap mb-4 w-full">

                <div class="w-1/2 pr-4">
                    <x-input-label for="name" :value="__('Наименование')" />
                    <x-text-input value="{{ old('name') }}" id="name" name="name" type="text" class="mt-1 block w-full" />
                    @if ($errors->has('name'))
                        <span class="text-red-600"><strong>{{ $errors->first('name') }}</strong></span>
                    @endif
                </div>

                <div class="w-1/2">
                    <x-input-label for="sort" :value="__('Сортировка')" />
                    <x-text-input value="{{ old('sort') }}" id="sort" name="sort" type="text" class="mt-1 block w-full" />
                    @if ($errors->has('sort'))
                        <span class="text-red-600"><strong>{{ $errors->first('sort') }}</strong></span>
                    @endif
                </div>

            </div>
            <div class="flex flex-wrap mb-4 w-full">

                <div class="w-1/2 pr-4">
                    <label for="variants" class="block font-medium text-sm text-gray-700">Варианты</label>
                    <textarea id="variants" type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" name="variants">{{ old('variants') }}</textarea>
                    @if ($errors->has('variants'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('variants') }}</strong></span>
                    @endif
                </div>

                <div class="w-1/2 pr-4">
                    <label for="type" class="block font-medium text-sm text-gray-700">Тип</label>
                    <select class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="type">
                        @foreach ($types as $type => $label)
                            <option value="{{ $type }}"{{ $type == old('type') ? ' selected' : '' }}>{{ $label }}</option>
                        @endforeach;
                    </select>
                </div>

            </div>

            <div class="mb-4">
                <input type="hidden" name="required" value="0">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="required" {{ old('required') ? 'checked' : '' }}> Обязательно
                    </label>
                </div>
                @if ($errors->has('required'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('required') }}</strong></span>
                @endif
            </div>

            <x-primary-button>{{ __('Сохранить') }}</x-primary-button>


        </form>
    </div>

</x-app-layout>

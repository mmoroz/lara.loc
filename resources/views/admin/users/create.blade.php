<x-app-layout>

    <div class="pt-2 p-4 text-gray-900">
        <h1 class="py-4">Добавить пользователя</h1>

        <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf
        <div class="flex flex-wrap mb-2">
            <div class="mr-3">
                <label for="name" class="text-gray-500">Имя</label>
                <input id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="name" value="{{ old('name') }}" required>
                @if ($errors->has('name'))
                    <span class="text-red-600"><strong>{{ $errors->first('name') }}</strong></span>
                @endif
            </div>

            <div class="form-group">
                <label for="email" class="text-gray-500">E-Mail</label>
                <input id="email" type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="text-red-600"><strong>{{ $errors->first('email') }}</strong></span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Сохранить</button>
        </div>
    </form>

    </div>

</x-app-layout>

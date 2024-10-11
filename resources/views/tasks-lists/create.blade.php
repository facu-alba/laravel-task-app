<x-app-layout>
    @if ($errors->any())
        <div class="max-w-xl mx-auto mt-8 alert alert-danger">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </span>
            </div>
        </div>
    @endif

    <form class="max-w-xl mx-auto mt-8"
        action="{{ route(\App\Http\Controllers\TaskList\StoreTaskListController::class) }}" method="POST">
        @csrf

        <div class="overflow-hidden shadow sm:rounded-md">
            <div class="bg-white px-4 py-5">
                <div class="grid gap-6 mb-6">
                    <!-- Nombre de la caja -->
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nombre de la
                            lista</label>
                        <input type="text"
                            class="appearance-none border rounded w-full py-2 px-3 opacity-60 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="name" name="name" placeholder="Ej: Lista para el hogar" required>
                    </div>

                    <div>
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900">Descripción</label>
                        <textarea
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="description" id="description" cols="30" rows="8"
                            placeholder="Ej: Esta es mi lista de tareas del hogar para este mes."></textarea>
                    </div>
                </div>

                {{-- <input type="hidden" name="name" value=""> --}}

                <div class="flex justify-end mt-4">
                    <button type="submit"
                        class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Crear
                        lista</button>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>

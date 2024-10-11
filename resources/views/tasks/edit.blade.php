<x-app-layout>

    @if ($errors->any())
        <div class="overflow-hidden shadow sm:rounded-md">
            <div class="bg-white px-4 py-5">
                <div class="grid gap-6 mb-6">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </span>
                </div>
            </div>
    @endif
    <form class="max-w-xl mx-auto mt-8"
        action="{{ route(\App\Http\Controllers\Task\UpdateTaskController::class, $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="overflow-hidden shadow sm:rounded-md">
            <div class="bg-white px-4 py-5">
                <div class="grid gap-6 mb-6">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                            Nombre de la tarea:
                        </label>
                        <input
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="name" type="text" name="name" value="{{ $task->name }}" required>
                    </div>

                    <div>
                        <label for="comment" class="block mb-2 text-sm font-medium text-gray-900">Comentario:</label>
                        <textarea
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="comment" id="comment" cols="30" rows="8" placeholder="Ej: Esta es una tarea del hogar."></textarea>
                    </div>
                </div>

                <div class="flex justify-end mt-4">
                    <button type="submit"
                        class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Actualizar
                        tarea</button>
                </div>
            </div>
    </form>
</x-app-layout>

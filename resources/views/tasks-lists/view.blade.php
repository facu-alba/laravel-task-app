<x-app-layout>
    @push('css')
        <style>
            .modal-blur {
                backdrop-filter: blur(5px);
            }

            .page-content {
                transition: filter 0.3s ease-in-out;
            }
        </style>
    @endpush

    @php
        $createdAt = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $taskList->created_at)->toDayDateTimeString();
    @endphp

    <div class="max-w-xl mx-auto mt-8">
        <div class="mt-6 bg-white shadow-md rounded-md p-6">
            <div class="relative inline-block text-left">

                <!-- Modal para compartir lista -->
                {{-- <div id="modalContainer" class="hidden fixed inset-0 z-30 flex items-center justify-center">
                    <div class="bg-white rounded-lg shadow-xl p-6 max-w-sm" style="padding: 6%;">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-lg font-semibold text-gray-700">Compartir Lista de Tareas</h2>
                            <button class="text-gray-400 hover:text-gray-600" id="closeModalButton">×</button>
                        </div>
                        <form id="shareListForm">
                            <label for="email" class="block text-gray-700 font-medium">Email del usuario</label>
                            <input type="email" id="email" name="email" placeholder="usuario@ejemplo.com"
                                class="w-full p-2 border border-gray-300 rounded mt-1 mb-4">

                            <label for="permissionLevel" class="block text-gray-700 font-medium">Nivel de
                                permiso</label>
                            <select id="permissionLevel" name="permissionLevel"
                                class="w-full p-2 border border-gray-300 rounded mt-1 mb-4">
                                <option value="read-only">Ver</option>
                                <option value="edit">Editar</option>
                            </select>

                            <button id="shareTaskButton"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Compartir</button>
                        </form>
                    </div>
                    <div class="fixed inset-0 bg-black bg-opacity-50" id="overlay"></div>
                </div> --}}

                <div id="modal"
                    class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full hidden modal-blur flex items-center justify-center z-50">
                    <div class="bg-white p-8 rounded-lg shadow-xl max-w-md mx-auto"
                        style="width: 25%; height: 42%; padding: 3%;">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-semibold text-gray-800">Compartir lista de tareas</h3>
                            <button id="closeModalBtn" class="text-gray-600 hover:text-gray-800 transition duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <form id="form-task-list-share">
                            {{-- action="{{ route(\App\Http\Controllers\TaskListShare\TaskListShareController::class, $taskList->id) }}"
                            method="POST" --}}

                            <div class="p-3 sm:p-3">
                                <label for="email" class="block text-gray-700 font-medium">Email del usuario</label>
                                <input type="email" id="email" name="email" placeholder="usuario@ejemplo.com"
                                    class="w-full p-2 border border-gray-300 rounded mt-1 mb-4" required>
                            </div>
                            <div class="p-3 sm:p-3">

                                <label for="permission_level" class="block text-gray-700 font-medium">Nivel de
                                    permiso</label>
                                <select id="permission_level" name="permission_level"
                                    class="w-full p-2 border border-gray-300 rounded mt-1 mb-4" required>
                                    <option value="read-only">Ver</option>
                                    <option value="edit">Editar</option>
                                </select>
                            </div>

                            {{-- <button id="share-task-list-btn"
                                class="inline-flex justify-end rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Compartir
                                lista</button> --}}

                            <button id="share-task-list-btn"
                                class="inline-flex justify-end rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Compartir
                                lista</button>

                            {{-- <div class="p-3 sm:p-3">
                                <label for="code" class="block mb-3 text-sm font-medium text-gray-900">Nombre de la
                                    caja</label>
                                <input type="text"
                                    class="appearance-none border rounded w-full py-2 px-3 opacity-60 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="name" name="name" placeholder="" disabled required>
                            </div>

                            <div class="p-3 sm:p-3">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Monto
                                    inicial</label>
                                <input type="text"
                                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="initial_amount" name="initial_amount" placeholder="Ingrese el monto inicial"
                                    required>
                            </div>

                            <div class="flex justify-end mt-4">
                                <button type="submit"
                                    class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Abrir
                                    caja</button>
                            </div> --}}
                        </form>
                    </div>
                </div>

                <div class="flex justify-end mb-6">
                    <x-jet-dropdown align="left" width="48">
                        <x-slot name="trigger">

                            <button
                                class="inline-flex items-center px-3 py-2 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500"
                                id="menu-button" aria-expanded="false" aria-haspopup="true">
                                <div>Acciones</div>

                                {{-- <div class="ml-1"></div> --}}

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                </svg>
                            </button>

                        </x-slot>

                        <x-slot name="content" class="ml-1">
                            <x-jet-dropdown-link id="share-btn">
                                <button id="share-list-btn">
                                    {{-- onclick="shareTaskList({{ $taskList->id }})" --}}
                                    {{ __('Compartir lista') }}
                                </button>
                            </x-jet-dropdown-link>

                            <form
                                action="{{ route(\App\Http\Controllers\TaskList\SoftDeleteTaskListController::class, $taskList->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')

                                <x-jet-dropdown-link style="color: red">
                                    <button id="delete-btn" type="submit">
                                        {{ __('Eliminar lista') }}
                                    </button>
                                </x-jet-dropdown-link>
                            </form>

                            {{-- <x-jet-dropdown-link href="#">
                                {{ __('Editar marca #' . $brand->id) }}
                            </x-jet-dropdown-link> --}}
                        </x-slot>

                    </x-jet-dropdown>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div>
                    <h3 class="text-gray-700 font-semibold">ID de la lista</h3>
                    <p class="mt-2 text-gray-900 text-lg">#{{ $taskList->id }}</p>
                </div>
                <div>
                    <h3 class="text-gray-700 font-semibold">Fecha de creación</h3>
                    <p class="mt-2 text-gray-900 text-lg">{{ $createdAt }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div>
                    <h3 class="text-gray-700 font-semibold">Nombre</h3>
                    <p class="mt-2 text-gray-900 text-lg">{{ $taskList->name }}</p>
                </div>
            </div>

            <div class="mt-4">
                <hr>
                <table class="w-full table-auto mt-4">
                    <thead>
                        <tr>
                            <th class="py-4 px-6 text-left text-gray-700 font-semibold">Task ID</th>
                            <th class="py-4 px-6 text-right text-gray-700 font-semibold">Task name</th>
                            <th class="py-4 px-6 text-right text-gray-700 font-semibold">Task description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($taskList->tasks()->get() as $task)
                            <tr class="border-t border-gray-200">
                                <td class="py-4 px-6 text-left text-gray-700 font-semibold">{{ $task['id'] }}</td>
                                <td class="py-4 px-6 text-center text-gray-700 font-semibold"
                                    style="padding-right: 5%;">{{ $task['name'] }}</td>
                                <td class="py-2 px-4 text-center text-gray-700 font-semibold">
                                    {{ $task['description'] }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const modal = document.getElementById('modal');
        const openModalBtn = document.getElementById('share-list-btn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const pageContent = document.querySelector('.page-content');

        function toggleModal() {
            modal.classList.toggle('hidden');
            pageContent.classList.toggle('blur-sm');
        }

        openModalBtn.addEventListener('click', toggleModal);
        closeModalBtn.addEventListener('click', toggleModal);

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                toggleModal();
            }
        });

        document.getElementById('share-task-list-btn').addEventListener('click', function(e) {
            e.preventDefault();

            const email = document.getElementById('email').value;
            const permissionLevel = document.getElementById('permission_level').value;

            if (!email) {
                Swal.showValidationMessage(
                    `Error: ${error}`
                );
                return;
            }

            fetch(`{{ route(\App\Http\Controllers\TaskListShare\TaskListShareController::class, $taskList->id) }}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                    body: JSON.stringify({
                        email: email,
                        permission_level: permissionLevel
                    })
                })
                .then(response => response.json())
                .then(data => {
                    Swal.fire({
                        title: '¡Éxito!',
                        text: data.message,
                        icon: 'success'
                    });

                    /*setTimeout(() => {
                        window.location.reload();
                    }, 2000);*/
                })
                .catch((error) => {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                    });
                });
        });
    </script>
</x-app-layout>

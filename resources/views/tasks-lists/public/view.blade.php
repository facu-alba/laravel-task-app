<x-guest-layout>
    <div class="max-w-xl mx-auto mt-8">
        <div class="mt-6 bg-white shadow-md rounded-md p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div>
                    <h3 class="text-gray-700 font-semibold">Nombre de la lista</h3>
                    <p class="mt-2 text-gray-900 text-lg">{{ $taskList['task_list']->name }}</p>
                </div>

                <div>
                    <h3 class="text-gray-700 font-semibold">Descripción de la lista</h3>
                    <p class="mt-2 text-gray-900 text-lg">{{ $taskList['task_list']->description }}</p>
                </div>
            </div>

            <div class="mt-4">
                <table class="w-full table-auto mt-4">
                    <thead>
                        <tr>
                            <th class="py-4 px-6 text-left text-gray-700 font-semibold">Task ID</th>
                            <th class="py-4 px-6 text-right text-gray-700 font-semibold">Task name</th>
                            <th class="py-4 px-6 text-right text-gray-700 font-semibold">Task description</th>
                            @if ('read-only' != $taskList['permission_level'])
                                <th class="py-4 px-6 text-right text-gray-700 font-semibold">Comentarios</th>
                            @endif
                            @if ('read-only' != $taskList['permission_level'])
                                <th class="py-4 px-6 text-right text-gray-700 font-semibold">Acciones</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($taskList['tasks'] as $task)
                            <tr class="border-t border-gray-200" x-data="{ editMode: false, permissionLevel: '{{ $taskList['permission_level'] }}', name: '{{ $task['name'] }}', description: '{{ $task['description'] }}', comments: {{ json_encode($task['comments']) }}, newComment: '' }">

                                <td class="py-4 px-6 text-left text-gray-700 font-semibold">{{ $task['id'] }}</td>

                                <!-- Task Name with edit in place -->
                                <td class="py-4 px-6 text-center text-gray-700 font-semibold"
                                    style="padding-right: 5%;">
                                    <span x-show="!editMode" x-text="name"></span>
                                    <input type="text" x-show="editMode" x-model="name"
                                        class="w-full text-center border border-gray-300 rounded p-2" />
                                </td>

                                <!-- Task Description with edit in place -->
                                <td class="py-2 px-4 text-center text-gray-700 font-semibold">
                                    <span x-show="!editMode" x-text="description"></span>
                                    <input type="text" x-show="editMode" x-model="description"
                                        class="w-full text-center border border-gray-300 rounded p-2" />
                                </td>

                                <!-- Edit/Save Button -->
                                @if ('read-only' != $taskList['permission_level'])
                                    <td class="py-4 px-6 text-center">
                                        <a href="{{ route(\App\Http\Controllers\TaskListShare\PublicAccess\ViewTaskListTaskCommentController::class, ['token' => $taskList['task_list_share_token'], 'taskId' => $task['id']]) }}" class="text-blue-500 hover:underline" target="_blank">Ver comentarios</button>
                                    </td>
                                @endif

                                <!-- Edit/Save Button -->
                                @if ('read-only' != $taskList['permission_level'])
                                    <td class="py-4 px-6 text-center">
                                        {{-- <a href="{{ route(\App\Http\Controllers\TaskListShare\PublicAccess\ViewTaskListTaskCommentController::class, ['token' => $taskList['task_list_share_token'], 'taskId' => $task['id']]) }}" class="text-blue-500 hover:underline">Ver comentarios</button> --}}
                                        <button x-show="!editMode && permissionLevel === 'edit'"
                                            @click="editMode = true"
                                            class="text-blue-500 hover:underline">Editar</button>
                                        <button x-show="editMode && permissionLevel === 'edit'"
                                            @click="editMode = false; saveTask({{ $task['id'] }}, name, description)"
                                            class="text-green-500 hover:underline">Guardar</button>
                                    </td>
                                @endif
                            </tr>

                            <!-- Comments Section -->
                            {{-- @if ('read-only' != $taskList['permission_level'])
                                <tr>
                                    <td colspan="4" class="py-4 px-6">
                                        <h4 class="text-gray-700 font-semibold">Comentarios</h4>
                                        <ul>
                                            <template x-for="comment in comments" :key="comment.id">
                                                <li class="py-2" x-text="comment.content"></li>
                                            </template>
                                        </ul>

                                        <!-- Add new comment -->
                                        <div x-show="permissionLevel !== 'read-only'" class="mt-4">
                                            <textarea x-model="newComment" placeholder="Agregar comentario..." class="w-full p-2 border border-gray-300 rounded"></textarea>
                                            <button @click="addComment({{ $task['id'] }}, newComment)"
                                                class="mt-2 text-green-500 hover:underline">Comentar</button>
                                        </div>
                                    </td>
                                </tr>
                            @endif --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function saveTask(taskId, name, description) {
            fetch(`{{ route(\App\Http\Controllers\TaskListShare\Update\TaskListShareUpdateController::class, $taskList['task_list']->id) }}`, {
                method: 'PUT',
                headers: {
                    'Content-type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    id: taskId,
                    name: name,
                    description: description
                })
            }).then(res => {
                if (!res.ok) {
                    throw new Error('Network response was not ok');
                }
                return res.json();
            }).then(data => {
                window.location.reload();
            }).catch(error => {
                window.location.reload();
            });
        }

        /*function addComment(taskId, content) {
            if (!content) {
                alert("El comentario no puede estar vacío.");
                return;
            }

            fetch(`{{ route(\App\Http\Controllers\TaskComment\StoreTaskCommentController::class, $task['id']) }}`, {
                    method: 'POST',
                    headers: {
                        'Content-type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        id: taskId,
                        content: content
                    })
                }).then(res => res.json())
                .then(data => {
                    // Añadir el nuevo comentario a la lista de comentarios
                    document.querySelectorAll(`[x-data="{...}`)[taskId].comments.push(data);
                    // Limpiar el textarea
                    document.querySelectorAll(`[x-data="{...}`)[taskId].newComment = '';
                }).catch(error => {
                    console.error("Error al agregar comentario:", error);
                });
        }*/
    </script>
</x-guest-layout>

{{-- <x-guest-layout>
    <div class="max-w-xl mx-auto mt-8">
        <div class="mt-6 bg-white shadow-md rounded-md p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div>
                    <h3 class="text-gray-700 font-semibold">Nombre de la lista</h3>
                    <p class="mt-2 text-gray-900 text-lg">{{ $taskList['task_list']->name }}</p>
                </div>

                <div>
                    <h3 class="text-gray-700 font-semibold">Descripción de la lista</h3>
                    <p class="mt-2 text-gray-900 text-lg">{{ $taskList['task_list']->description }}</p>
                </div>
            </div>

            <div class="mt-4">
                <table class="w-full table-auto mt-4">
                    <thead>
                        <tr>
                            <th class="py-4 px-6 text-left text-gray-700 font-semibold">Task ID</th>
                            <th class="py-4 px-6 text-right text-gray-700 font-semibold">Task name</th>
                            <th class="py-4 px-6 text-right text-gray-700 font-semibold">Task description</th>
                            @if ('read-only' != $taskList['permission_level'])
                                <th class="py-4 px-6 text-right text-gray-700 font-semibold">Acciones</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($taskList['tasks'] as $task)
                            <tr class="border-t border-gray-200" x-data="{ editMode: false, permissionLevel: '{{ $taskList['permission_level'] }}', name: '{{ $task['name'] }}', description: '{{ $task['description'] }}', comments: {{ $task['comments'] }}, newComment: '' }">
                                <td class="py-4 px-6 text-left text-gray-700 font-semibold">{{ $task['id'] }}</td>

                                <!-- Task Name with edit in place -->
                                <td class="py-4 px-6 text-center text-gray-700 font-semibold"
                                    style="padding-right: 5%;">
                                    <span x-show="!editMode" x-text="name"></span>
                                    <input type="text" x-show="editMode" x-model="name"
                                        class="w-full text-center border border-gray-300 rounded p-2" />
                                </td>

                                <!-- Task Description with edit in place -->
                                <td class="py-2 px-4 text-center text-gray-700 font-semibold">
                                    <span x-show="!editMode" x-text="description"></span>
                                    <input type="text" x-show="editMode" x-model="description"
                                        class="w-full text-center border border-gray-300 rounded p-2" />
                                </td>

                                <!-- Edit/Save Button -->
                                @if ('read-only' != $taskList['permission_level'])
                                    <td class="py-4 px-6 text-center">
                                        <button x-show="!editMode && permissionLevel === 'edit'"
                                            @click="editMode = true"
                                            class="text-blue-500 hover:underline">Editar</button>
                                        <button x-show="editMode && permissionLevel === 'edit'"
                                            @click="editMode = false; saveTask({{ $task['id'] }}, name, description)"
                                            class="text-green-500 hover:underline">Guardar</button>
                                    </td>
                                @endif
                            </tr>

                            <!-- Comments Section -->
                            <tr>
                                <td colspan="4" class="py-4 px-6">
                                    <h4 class="text-gray-700 font-semibold">Comentarios</h4>
                                    <ul>
                                        <template x-for="comment in comments">
                                            <li class="py-2" x-text="comment.content"></li>
                                        </template>
                                    </ul>

                                    <!-- Add new comment -->
                                    <div x-show="permissionLevel !== 'read-only'" class="mt-4">
                                        <textarea x-model="newComment" placeholder="Agregar comentario..." class="w-full p-2 border border-gray-300 rounded"></textarea>
                                        <button @click="editMode = false; addComment({{ $task['id'] }}, newComment)"
                                            class="mt-2 text-green-500 hover:underline">Comentar</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function saveTask(taskId, name, description) {
            fetch(`{{ route(\App\Http\Controllers\TaskListShare\Update\TaskListShareUpdateController::class, $taskList['task_list']->id) }}`, {
                method: 'PUT',
                headers: {
                    'Content-type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    id: taskId,
                    name: name,
                    description: description
                })
            }).then(res => {
                if (!res.ok) {
                    throw new Error('Network response was not ok');
                }
                return res.json();
            }).then(data => {
                // Reload or update UI
            }).catch(error => {
                // Handle error
            });
        }

        function addComment(taskId, content) {
            // `/tasks/${taskId}/comments`
            fetch(`{{ route(\App\Http\Controllers\TaskComment\StoreTaskCommentController::class, $task['id']) }}`, {
                    method: 'POST',
                    headers: {
                        'Content-type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        id: taskId,
                        content: content
                    })
                }).then(res => res.json())
                .then(data => {
                    // Handle successful comment addition
                    // You could add the comment directly to the UI without refreshing
                }).catch(error => {
                    // Handle error
                });
        }
    </script>
</x-guest-layout> --}}

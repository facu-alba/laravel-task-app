<x-guest-layout>
    {{-- @dd($tasks) --}}
    <div class="max-w-xl mx-auto mt-8">
        <div class="mt-6 bg-white shadow-md rounded-md p-6">
            <div class="mt-4">
                <table class="w-full table-auto mt-4">
                    <thead>
                        <tr>
                            <th class="py-4 px-6 text-left text-gray-700 font-semibold">Comentarios de la tarea
                                {{ $tasks['task']['id'] }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks['comments'] as $comment)
                            <tr>
                                <td colspan="4" class="py-4 px-6">
                                    <ul>
                                        {{ $comment->content }}
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-guest-layout>

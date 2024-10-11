<x-app-layout>
    @push('css')
        <style>
            @media screen and (max-width: 768px) {
                input.gridjs-input {
                    width: 80%;
                }
            }

            @media only screen and (max-width: 1080px) {
                input.gridjs-input {
                    width: 80%;
                }
            }
        </style>
    @endpush

    <div id="wrapper" style="margin-top: 1%; margin-left: 8%; margin-right: 8%;"></div>

    @push('scripts')
        <script type="text/javascript">
            let tasksLists = @json($tasksLists);

            const grid = new gridjs.Grid({
                columns: ['id', 'name', 'description', 'user_id',
                    {
                        id: 'actions',
                        name: 'Acciones',
                        width: '130px',
                        formatter: (cell, row) => {
                            const url =
                                `{{ route('App\Http\Controllers\TaskList\ViewSingleTaskListController', ':id') }}`
                                .replace(':id', row.cells[0].data);

                            return gridjs.h('a', {
                                href: url,
                                className: 'inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2',
                            }, @php echo "'" . __('tasks/grid.actions.view') . "'"; @endphp);
                        }
                    }
                ],
                data: tasksLists,
                sort: true,
                search: true,
                pagination: {
                    limit: 10,
                    summary: true
                },
                language: {
                    'search': {
                        'placeholder': '🔍 '
                    },
                    'pagination': {
                        'previous': '⬅️',
                        'next': '➡️',
                        'showing': '',
                        'results': () => ''
                    }
                },
            }).render(document.getElementById("wrapper"));
        </script>
    @endpush
</x-app-layout>

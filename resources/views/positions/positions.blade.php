<x-guest-layout>
    <ul
        class="w-full text-lg font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        @foreach ($positions as $position)
            <li
                class="w-full px-4 py-2 flex items-center justify-between
                    @if ($loop->last) rounded-b-lg @else border-b border-gray-200 dark:border-gray-600 @endif
                    @if ($loop->first) border-b border-gray-200 rounded-t-lg dark:border-gray-600 @endif">
                <p class="text-xl overflow-hidden whitespace-nowrap text-overflow-ellipsis">
                    {{ $position->name }}
                </p>

                <div class="inline-flex rounded-md shadow-sm" role="group">
                    {{-- @include('positions.positions-edit') --}}
                    <a type="button" x-data=""
                        href="{{ route('positions.edit', ['position' => $position]) }}"
                        class="px-4 py-2 text-sm font-medium  border rounded-l-md focus:ring-2 focus:ring-gray-500">
                        Editar
                    </a>

                    <form method="post" action="{{ route('positions.destroy', ['position' => $position->id]) }}"
                        class="p-0">
                        @csrf
                        @method('delete')
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium  border rounded-r-md focus:ring-2 focus:ring-gray-500">
                            Deletar
                        </button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

    {{-- <form method="POST" action="{{ route('positions.create') }}">
        @csrf --}}
    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
            href="{{ route('positions.create') }}">
            {{ __('Criar cargo?') }}
        </a>
    </div>
    {{-- </form> --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const po = @json($positions);
            console.log("🚀 ~ positions:", po);
        });
    </script>
</x-guest-layout>

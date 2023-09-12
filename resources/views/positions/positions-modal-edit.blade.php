<button type="button" x-data=""
    x-on:click.prevent="$dispatch('open-modal', 'confirm-position-deletion {{ $position->id }}')"
    class="px-4 py-2 text-sm font-medium  border rounded-l-md focus:ring-2 focus:ring-gray-500">
    Editar
</button>

<x-modal name="confirm-position-deletion {{ $position->id }}" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <div class="relative rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Edição de Cargo
            </h3>
            <button type="button" x-on:click="$dispatch('close')"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="defaultModal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <form method="post" action="{{ route('positions.update', ['position' => $position]) }}" class="p-0">
            @csrf
            @method('patch')
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div>
                    <x-input-label for="cargo" :value="__('Cargo')" />
                    <x-text-input id="position" name="position" type="text" class="mt-1 block w-full"
                        :value="old('position', $position->name)" autofocus autocomplete="position" />
                    <x-input-error class="mt-2" :messages="$errors->get('position')" />
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-danger-button class="ml-3">
                    {{ __('Editar') }}
                </x-danger-button>
            </div>
        </form>
    </div>
</x-modal>

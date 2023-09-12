<x-guest-layout>
    <form method="POST" action="{{ route('positions.store') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="cargo" :value="__('Cargo')" />
            <x-text-input id="position" class="block mt-1 w-full" type="text" name="position" :value="old('position')"
                autofocus autocomplete="position" />
            <x-input-error :messages="$errors->get('position')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

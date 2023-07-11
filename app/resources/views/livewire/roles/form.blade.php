<form wire:submit.prevent="save" class="overflow-hidden p-6 lg:p-8 bg-white border-b border-gray-2002">
    @csrf
    <section class="space-y-6">
        <header>
            <p class="mt-1 text-sm text-gray-600">
                {{ __("Заполните поля.") }}
            </p>
        </header>

        <div>
            <x-label for="name" :value="__('Post name')"/>
            <x-input wire:model.defer="state.name" id="name" class="block mt-1 w-full" type="text" name="name"
            />
            <x-input-error for="state.name" class="mt-2"/>
        </div>

        <div>
            <x-label for="guard_name" :value="__('Guard')"/>
            <x-input wire:model.defer="state.guard_name" id="guard_name" class="block mt-1 w-full" type="text"
                        name="guard_name" rows="5" :id="'guard_name'"/>
            <x-input-error for="state.guard_name" class="mt-2"/>
        </div>

        <x-button>
            {{ __('Save') }}
        </x-button>

    </section>
</form>

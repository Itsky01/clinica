




<x-jet-form-section submit="updateProfileInformation">
    <button wire:click="crear''">salir</button>
    <x-slot name="actions">
		<div class="d-flex align-items-baseline">
			<x-jet-button>
                <div wire:loading class="spinner-border spinner-border-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>

				{{ __('Save') }}
			</x-jet-button>
           
		</div>
    </x-slot>
    <x-slot name="title">
        {{ __('Su informacion de perfil') }}
    </x-slot>
    
    
    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>
   
    <x-slot name="form">

        <x-jet-action-message on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div class="mb-3" x-data="{photoName: null, photoPreview: null}">
                <!-- Profile Photo File Input -->
                <input type="file" hidden
                       wire:model="photo"
                       x-ref="photo"
                       x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" class="rounded-circle" height="80px" width="80px">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <img x-bind:src="photoPreview" class="rounded-circle" width="80px" height="80px">
                </div>

                <x-jet-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
				</x-jet-secondary-button>
				
				@if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        <div wire:loading wire:target="deleteProfilePhoto" class="spinner-border spinner-border-sm" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>

                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <div class="w-md-75">
            <!-- Name -->
            <div class="mb-3">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" wire:model.defer="state.name" autocomplete="name" />
                <x-jet-input-error for="name" />
            </div>

            <div class="mb-3">
                <x-jet-label for="apellido" value="{{ __('Apellido') }}" />
                <x-jet-input id="apellido" type="text" class="{{ $errors->has('apellido') ? 'is-invalid' : '' }}" wire:model.defer="state.apellido" autocomplete="apellido" />
                <x-jet-input-error for="apellido" />
            </div>

            <div class="mb-3">
                <x-jet-label for="dni" value="{{ __('Documento') }}" />
                <x-jet-input id="dni" type="text" class="{{ $errors->has('Documento') ? 'is-invalid' : '' }}" wire:model.defer="state.dni" autocomplete="dni" />
                <x-jet-input-error for="dni" />
            </div>

            <div class="mb-3">
                <x-jet-label for="telefono" value="{{ __('Telefono') }}" />
                <x-jet-input id="telefono" type="text" class="{{ $errors->has('telefono') ? 'is-invalid' : '' }}" wire:model.defer="state.telefono" autocomplete="telefono" />
                <x-jet-input-error for="telefono" />
            </div>
            <div class="mb-3">
                <x-jet-label for="domicilio" value="{{ __('Domicilio') }}" />
                <x-jet-input id="domicilio" type="text" class="{{ $errors->has('domicilio') ? 'is-invalid' : '' }}" wire:model.defer="state.domicilio" autocomplete="domicilio" />
                <x-jet-input-error for="domicilio" />
            </div>

            <div class="mb-3">
                <x-jet-label for="fecha" value="{{ __('fecha') }}" />
                <x-jet-input id="fecha" type="text" class="{{ $errors->has('fecha') ? 'is-invalid' : '' }}" wire:model.defer="state.fecha" autocomplete="fecha" />
                <x-jet-input-error for="fecha" />
            </div>

            <!-- Email -->
            <div class="mb-3">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" wire:model.defer="state.email" />
                <x-jet-input-error for="email" />
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
		<div class="d-flex align-items-baseline">
			<x-jet-button>
                <div wire:loading class="spinner-border spinner-border-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>

				{{ __('Save') }}
			</x-jet-button>
           
		</div>
    </x-slot>
</x-jet-form-section>
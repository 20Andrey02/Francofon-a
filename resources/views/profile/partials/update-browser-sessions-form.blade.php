<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Sesiones de Navegador') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Administra y cierra tus sesiones activas en otros navegadores y dispositivos.') }}
        </p>
    </header>

    @if (count($sessions) > 0)
        <div class="mt-5 space-y-6">
            <!-- Other Browser Sessions -->
            @foreach ($sessions as $session)
                <div class="flex items-center">
                    <div>
                        @if ($session->agent['is_desktop'])
                            <svg class="w-8 h-8 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                            </svg>
                        @else
                            <svg class="w-8 h-8 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                            </svg>
                        @endif
                    </div>

                    <div class="ms-3">
                        <div class="text-sm text-gray-600">
                            {{ $session->agent['platform'] ? $session->agent['platform'] : __('Desconocido') }} - {{ $session->agent['browser'] ? $session->agent['browser'] : __('Desconocido') }}
                        </div>

                        <div>
                            <div class="text-xs text-gray-500">
                                {{ $session->ip_address }},

                                @if ($session->is_current_device)
                                    <span class="text-green-500 font-semibold">{{ __('Este dispositivo') }}</span>
                                @else
                                    {{ __('Última actividad') }} {{ $session->last_active }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="flex items-center mt-5">
        <x-primary-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-logout-other-sessions')"
        >
            {{ __('Cerrar otras sesiones') }}
        </x-primary-button>

        <x-action-message class="ms-3" on="browser-sessions-terminated">
            {{ __('Hecho.') }}
        </x-action-message>
    </div>

    <!-- Logout Other Devices Confirmation Modal -->
    <x-modal name="confirm-logout-other-sessions" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.sessions.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('¿Estás seguro de que quieres cerrar tus otras sesiones?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Por favor, introduce tu contraseña para confirmar que quieres cerrar tus otras sesiones de navegador en todos tus dispositivos.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Contraseña') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Contraseña') }}"
                />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Cerrar otras sesiones') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>

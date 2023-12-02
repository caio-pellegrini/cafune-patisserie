<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Perfil') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card de imagem de perfil -->
            <div class="md:col-span-1 space-y-6">
                <div class="p-8 bg-white shadow rounded-lg">
                    @include('profile.partials.update-image-form')
                </div>
                <div class="p-8 bg-white shadow rounded-lg">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

            <!-- Card de editar perfil e alterar senha -->
            <div class="md:col-span-2 space-y-6">
                <div class="p-8 bg-white shadow rounded-lg">
                    @include('profile.partials.update-profile-information-form')
                </div>
                <div class="p-8 bg-white shadow rounded-lg">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
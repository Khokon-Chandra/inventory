<x-app-layout>
    <div class="card">
        <div class="card-header">Create Permission</div>
        <div class="card-body">
            <form class="space-y-4" action="{{ route(config('permission_ui.route_name_prefix') . 'permissions.store') }}"
                method="post">
                @csrf

                <div class="mb-3">
                    <label class="text-base font-medium text-gray-700"
                        for="name">{{ __('PermissionsUI::permissions.permissions.fields.name') }}</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}"
                        required />
                    @error('name')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                @if ($roles->count())
                    <div class="space-y-2">
                        <label class="block text-base font-medium text-gray-700"
                            for="permissions">{{ __('PermissionsUI::permissions.roles.title') }}</label>
                        <div class="space-x-2">
                            @foreach ($roles as $id => $name)
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="roles[]"
                                        id="role-{{ $id }}" value="{{ $id }}"
                                        @checked(old('role-' . $id))>
                                    <label class="form-check-label"
                                        for="role-{{ $id }}">{{ $name }}</label>
                                </div>
                            @endforeach
                        </div>
                        @error('roles')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                @endif

                <button class="btn btn-primary" type="submit">
                    {{ __('PermissionsUI::permissions.global.save') }}
                </button>
            </form>
        </div>
    </div>
</x-app-layout>

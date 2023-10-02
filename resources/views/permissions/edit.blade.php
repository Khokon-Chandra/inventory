<x-app-layout>
    <div class="card">
        <div class="card-header">Update permission</div>
        <div class="card-body">
            <form class="space-y-4" action="{{ route(config('permission_ui.route_name_prefix') . 'permissions.update', $permission) }}" method="post">
                @csrf
        
                <div class="mb-3">
                    <label class="text-base font-medium text-gray-700" for="name">{{ __('PermissionsUI::permissions.permissions.fields.name') }}</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $permission->name) }}" required />
                    @error('name')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
        
                @if($roles->count())
                    <div class="mb-3">
                        <label class="block text-base font-medium text-gray-700" for="roles">{{ __('PermissionsUI::permissions.roles.title') }}</label>
                        <div class="space-x-2">
                            @foreach($roles as $id => $name)
                                <div class="form-check mb-3">
                                    <input class="rounded-md border-gray-300 shadow-sm" type="checkbox" name="roles[]" id="role-{{ $id }}" value="{{ $id }}" @checked(in_array($id, old('role', [])) || $permission->roles->contains($id))>
                                    <label class="text-sm font-medium text-gray-700"  for="role-{{ $id }}">{{ $name }}</label>
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

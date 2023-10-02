<x-app-layout>
    <div class="card">
        <div class="card-header">Update Role</div>
        <div class="card-body">
            <form class="space-y-4" action="{{ route(config('permission_ui.route_name_prefix') . 'roles.update', $role) }}" method="post">
                @csrf
                @method('PATCH')
        
                <div class="mb-3">
                    <label class="form-lebel" for="name">{{ __('PermissionsUI::permissions.roles.fields.name') }}</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $role->name) }}" required />
                    @error('name')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
        
                @if($permissions->count())
                    <div class="mb-3">
                        <label class="block text-base font-medium text-gray-700" for="permissions">{{ __('PermissionsUI::permissions.roles.fields.permissions') }}</label>
                        <div class="space-x-2">
                            @foreach($permissions as $id => $name)
                                <div class="inline-flex space-x-1">
                                    <input class="rounded-md border-gray-300 shadow-sm" type="checkbox" name="permissions[]" id="permission-{{ $id }}" value="{{ $id }}" @checked(in_array($id, old('permissions', [])) || $role->permissions->contains($id))>
                                    <label class="text-sm font-medium text-gray-700"  for="permission-{{ $id }}">{{ $name }}</label>
                                </div>
                            @endforeach
                        </div>
                        @error('permissions')
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

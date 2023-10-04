<x-app-layout>
    <div class="card">
        <div class="card-header">Update</div>
        <div class="card-body">
            <form class="mx-2" action="{{ route('permission_ui.users.update', $user) }}" method="post">
                
                @csrf

                @method('PATCH')
        
                <div class="text-base font-medium text-gray-700">{{ __('PermissionsUI::permissions.users.fields.name') }}: <span class="font-bold">{{ $user->name }}</span></div>
        
                @if($roles->count())
                    <div class="space-y-2">
                        <label class="block text-base font-medium text-gray-700" for="permissions">{{ __('PermissionsUI::permissions.users.fields.roles') }}</label>
                        <div class="space-x-2">
                            @foreach($roles as $id => $name)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" id="role-{{ $id }}" value="{{ $id }}" @checked(in_array($id, old('roles', [])) || $user->roles->contains($id))>
                                    <label class="form-check-label" for="role-{{ $id }}">{{ $name }}</label>
                                </div>
                            @endforeach
                        </div>
                        @error('permissions')
                            <span class="text-smtext-danger">{{ $message }}</span>
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
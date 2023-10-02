<x-app-layout>
   <div class="card">
    <div class="card-header">Create new role</div>
    <div class="card-body">
        <form class="gap-3" action="{{ route(config('permission_ui.route_name_prefix') . 'roles.store') }}" method="post">
            @csrf
    
            <div class="mb-3    ">
                <label class="text-base font-medium text-gray-700" for="name">{{ __('PermissionsUI::permissions.roles.fields.name') }}</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" required />
                @error('name')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
    
            @if($permissions->count())
                <div class="mb-3">
                    <label class="block text-base font-medium text-gray-700" for="permissions">{{ __('PermissionsUI::permissions.roles.fields.permissions') }}</label>
                    <div class="form-check">
                        @foreach($permissions as $id => $name)
                            <div class="inline-flex space-x-1">
                                <input class="form-check-input" type="checkbox" name="permissions[]" id="permission-{{ $id }}" value="{{ $id }}" @checked(old('permission-'. $id))>
                                <label class="form-check-label" for="permission-{{ $id }}">{{ $name }}</label>
                            </div>
                        @endforeach
                    </div>
                    @error('permissions')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            @endif
    
            <button class="btn  btn-primary" type="submit">
                {{ __('PermissionsUI::permissions.global.save') }}
            </button>
        </form>
    </div>
   </div>
</x-app-layout>

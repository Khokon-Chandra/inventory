<x-app-layout>
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <h6 class="mb-0">Role:</h6>
        <a class="btn  btn-primary" href="{{ route(config('permission_ui.route_name_prefix') . 'roles.create') }}">{{ __('PermissionsUI::permissions.global.create') }}</a>
    </div>

   <div class="card">
    <div class="card-header">Role information</div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr class="bg-gray-500/5">
                    <th class="px-4">{{ __('PermissionsUI::permissions.roles.fields.id') }}</th>
                    <th>{{ __('PermissionsUI::permissions.roles.fields.name') }}</th>
                    <th>{{ __('PermissionsUI::permissions.roles.fields.permissions') }}</th>
                    <th>{{ __('PermissionsUI::permissions.roles.fields.created_at') }}</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($roles as $role)
                    <tr>
                        <td class="px-4 py-2">{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            @foreach($role->permissions as $permission)
                                <span class="rounded-xl bg-blue-300 px-2 py-1 text-xs text-blue-700">{{ $permission->name }}</span>
                            @endforeach
                        </td>
                        <td>{{ $role->created_at }}</td>
                        <td class="px-4 text-end">
                            <a class="btn btn-sm btn-info" href="{{ route(config('permission_ui.route_name_prefix') . 'roles.edit', $role) }}">
                                {{ __('PermissionsUI::permissions.global.edit') }}
                            </a>

                            <form action="{{ route(config('permission_ui.route_name_prefix') . 'roles.destroy', $role) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-primary" type="submit" onclick="return confirm({{ __('PermissionsUI::permissions.global.confirm_action') }})">
                                    {{ __('PermissionsUI::permissions.global.delete') }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="p-4 text-center" colspan="6  ">{{ __('PermissionsUI::permissions.global.no_records') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
   </div>
</x-app-layout>

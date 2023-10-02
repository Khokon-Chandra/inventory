<x-app-layout>
    <div class="d-flex justify-content-between mb-3">
        <h4 class="mb-0">Permission</h4>
        <a class="btn btn-primary"
            href="{{ route(config('permission_ui.route_name_prefix') . 'permissions.create') }}">{{ __('PermissionsUI::permissions.global.create') }}</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr class="bg-gray-500/5">
                        <th class="px-4">{{ __('PermissionsUI::permissions.permissions.fields.id') }}</th>
                        <th>{{ __('PermissionsUI::permissions.permissions.fields.name') }}</th>
                        <th>{{ __('PermissionsUI::permissions.permissions.fields.created_at') }}</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($permissions as $permission)
                        <tr>
                            <td class="py-3 px-4">{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->created_at }}</td>
                            <td class="text-end">
                                <a class="btn btn-sm btn-info"
                                    href="{{ route(config('permission_ui.route_name_prefix') . 'permissions.edit', $permission) }}">
                                    {{ __('PermissionsUI::permissions.global.edit') }}
                                </a>

                                <form
                                    action="{{ route(config('permission_ui.route_name_prefix') . 'permissions.destroy', $permission) }}"
                                    method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-primary" type="submit"
                                        onclick="return confirm({{ __('PermissionsUI::permissions.global.confirm_action') }})">
                                        {{ __('PermissionsUI::permissions.global.delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="p-4" colspan="4">{{ __('PermissionsUI::permissions.global.no_records') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

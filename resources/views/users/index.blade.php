<x-app-layout>

    <div class="card">
        <div class="card-header">User information</div>
        <div class="card-body">
            <table class="table table">
                <thead>
                    <tr class="bg-gray-500/5">
                        <th class="px-4 py-2">{{ __('PermissionsUI::permissions.users.fields.id') }}</th>
                        <th>{{ __('PermissionsUI::permissions.users.fields.name') }}</th>
                        <th>{{ __('PermissionsUI::permissions.users.fields.email') }}</th>
                        <th>{{ __('PermissionsUI::permissions.users.fields.roles') }}</th>
                        <th>{{ __('PermissionsUI::permissions.users.fields.created_at') }}</th>
                        <th class="px-4">Action</th>
                    </tr>
                </thead>    
    
                <tbody class="whitespace-nowrap divide-y">
                    @forelse($users as $user)
                        <tr>
                            <td class="px-4 py-3">{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                    <span
                                        class="rounded-xl bg-blue-300 px-2 py-1 text-xs text-blue-700">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td>{{ $user->created_at }}</td>
                            <td class="px-4">
                                <a class="btn btn-sm btn-primary"
                                    href="{{ route(config('permission_ui.route_name_prefix') . 'users.edit', $user) }}">
                                    {{ __('PermissionsUI::permissions.global.edit') }}
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="p-4" colspan="4">{{ __('PermissionsUI::permissions.global.no_records') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
    
            @if ($users->links())
                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

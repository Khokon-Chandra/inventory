<x-app-layout>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Users List</h5>
        <a href="{{ route('users.create') }}" class="btn btn-primary">+ Add New</a>
    </div>
    <div class="card">
        <div class="card-header">User Information</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Balance</th>
                        <th>Account Type</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-center">{{ $user->balance }}</td>
                            <td><span class="text-uppercase badge {{ @$user->account_type == \App\Enums\AccountTypeEnum::INDIVIDUAL ? 'bg-success' : 'bg-info' }}">{{ $user->account_type->value }}</span></td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th class="text-center" colspan="7">No User Found</th>
                        </tr>
                    @endforelse
                        
                  
                </tbody>
            </table>
            <div class="d-flex justify-content-end mt-3">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>

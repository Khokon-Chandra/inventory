<x-app-layout>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Transfer List</h5>
        <a href="{{ route('transfers.create') }}" class="btn btn-primary">+ Add New</a>
    </div>
    <div class="card">
        <div class="card-header">Transfer Information</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>From Store</th>
                        <th>To Store</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataset as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->fromStore->name }}</td>
                            <td>{{ $item->toStore->name }}</td>
                            <td>{{ rand(1000,99999) }}</td>
                            <td>{{ $item->status }}</td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-primary">receive</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th class="text-center" colspan="7">No record Found</th>
                        </tr>
                    @endforelse
                        
                  
                </tbody>
            </table>
            <div class="d-flex justify-content-end mt-3">
                {{ $dataset->links() }}
            </div>
        </div>
    </div>
</x-app-layout>

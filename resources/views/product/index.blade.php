<x-app-layout>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Product List</h5>
        <a href="{{ route('products.create') }}" class="btn btn-primary">+ Add New</a>
    </div>
    <div class="card">
        <div class="card-header">Product Information</div>
        <div class="card-body">
           <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Unit</th>
                        <th>Date</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataset as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->unit }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-primary">Edit</a>
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
           </div>
            <div class="d-flex justify-content-end mt-3">
                {{ $dataset->links() }}
            </div>
        </div>
    </div>
</x-app-layout>

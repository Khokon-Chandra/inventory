<x-app-layout>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Stock List</h5>
        <a href="{{ route('reports.stock.pdf') }}" class="btn btn-primary">+ Generate PDF</a>
    </div>
    <div class="card">
        <div class="card-header fs-bold">Stock Report</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Store name</th>
                            <th>Product</th>
                            <th>Stock Status</th>
                            <th>Quantity</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataset as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->store_name }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td><button class="btn btn-sm btn-outline-primary">In stock</button></td>
                                <td>{{ $item->closing_stock }}</td>
                                <td>{{ $item->date }}</td>
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

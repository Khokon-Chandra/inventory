<x-app-layout>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Sales</h5>
        <a href="{{ route('reports.sale.pdf') }}" class="btn btn-primary">+ Generate PDF</a>
    </div>
    <div class="card">
        <div class="card-header">Sales Information</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>

                            <th>Created by</th>
                            <th>Customer</th>
                            <th>Store Name</th>
                            <th>Grand Total</th>
                            <th>Paid</th>
                            <th>Due</th>
                            <th class="text-end">Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataset as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->customer->name }}</td>
                                <td>{{ $item->store->name }}</td>
                                <td>$ {{ $item->total_price }}</td>
                                <td>$ {{ $item->paid }}</td>
                                <td>$ {{ $item->due }}</td>
                                <td class="text-end">
                                    @if ($item->paid == 0)
                                        <button class="btn btn-sm btn-outline-danger">Unpaid</button>
                                        @elseif ($item->due == 0)
                                        <button class="btn btn-sm btn-outline-success">Paid</button>
                                    @else
                                    <button class="btn btn-sm btn-outline-primary">Partial</button>

                                    @endif
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

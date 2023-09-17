<x-app-layout>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Deposit Transaction</h5>
        <a href="{{ route('transactions.deposit.create') }}" class="btn btn-primary">+ Add New</a>
    </div>
    <div class="card">
        <div class="card-header">Deposit Information</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>User</th>
                        <th>Type</th>
                        <th class="text-end">Amount</th>
                        <th class="text-end">Balance</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transactions as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td><span
                                    class="text-uppercase badge {{ @$item->transaction_type == \App\Enums\TransactionTypeEnum::DEPOSIT ? 'bg-success' : 'bg-danger' }}">{{ $item->transaction_type->value }}</span>
                            </td>
                            <td class="text-end">{{ $item->amount }}</td>
                            <td class="text-end">{{ $item->user->balance }}</td>

                        </tr>
                    @empty
                        <tr>
                            <th class="text-center" colspan="7">No record Found</th>
                        </tr>
                    @endforelse


                </tbody>
            </table>
            <div class="d-flex justify-content-end mt-3">
                {{ $transactions->links() }}
            </div>
        </div>
    </div>
</x-app-layout>

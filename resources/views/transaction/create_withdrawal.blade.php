<x-app-layout>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Withdraw</h5>
        <a href="{{ route('transactions.withdrawal') }}" class="btn btn-primary">Withdraw List</a>
    </div>
    <div class="card">
        <div class="card-header">withdraw Information</div>
        <div class="card-body">
            <form action="{{ route('transactions.withdrawal.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label for="user_id">User</label>
                    <select
                        class="form-control @error('user_id')
                        is-invalid
                    @enderror"
                        name="user_id" id="user_id" value="{{ old('user_id') }}">
                        <option value="">--sleect user--</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>



                <div class="mb-3">
                    <label for="amount">Amount</label>
                    <input type="number" step="any" name="amount" class="form-control" id="amount">
                    @error('amount')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3 text-end">
                    <button type="submit" class="btn btn-primary">Withdraw</button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>

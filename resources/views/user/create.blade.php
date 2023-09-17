<x-app-layout>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Users List</h5>
        <a href="{{ route('users.create') }}" class="btn btn-primary">+ Add New</a>
    </div>
    <div class="card">
        <div class="card-header">User Information</div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text"
                        class="form-control @error('name')
                        is-invalid
                    @enderror"
                        name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email"
                        class="form-control @error('email')
                    is-invalid
                @enderror"
                        name="email" id="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="account_type">Account Type</label>
                    <select
                        class="form-control @error('account_type')
                    is-invalid
                @enderror"
                        name="account_type" id="account_type">
                        <option value="{{ \App\Enums\AccountTypeEnum::INDIVIDUAL->value }}">
                            {{ \App\Enums\AccountTypeEnum::INDIVIDUAL->value }}</option>
                        <option value="{{ \App\Enums\AccountTypeEnum::BUSINESS->value }}">
                            {{ \App\Enums\AccountTypeEnum::BUSINESS->value }}</option>
                    </select>

                    @error('account_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="password">Password</label>
                        <input type="password"
                            class="form-control @error('password')
                            is-invalid
                        @enderror"
                            id="password" name="password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mb-3">
                        <label for="password_confirmation">password_confirmation</label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation">
                    </div>

                </div>

                <div class="mb-3 text-end">
                    <button class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>

<x-app-layout>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Transfer Create</h5>
        <a href="{{ route('transfers.index') }}" class="btn btn-primary"> go to list</a>
    </div>
    <div class="card">
        <div class="card-header">Transfer Information</div>
        <div class="card-body">
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="">From Store</label>
                    <select name="from_store" id="" class="form-control">
                        <option value="">--select store--</option>
                        @foreach ($stores as $store)
                            <option value="{{ $store->id }}">{{ $store->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <label for="">To Store</label>
                    <select name="from_store" id="" class="form-control">
                        <option value="">--select store--</option>
                        @foreach ($stores as $store)
                            <option value="{{ $store->id }}">{{ $store->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            


            <div class="mt-4">

                <div class="p-3 rounded shadow border border-light alert-primary col-md-6 offset-md-3 mb-3">
                    <input type="search" class="form-control form-control-lg" placeholder="search product">
                </div>


                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Sub Total</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i < 5; $i++)
                        <tr>    
                            <td>{{ $i }}</td>
                            <td>Realme Narzo 50</td>
                            <td>Android Phone</td>
                            <th>200000</th>
                            <td width="15%">
                                <input type="number" min="1" class="form-control" value="1">
                            </td>
                            <th>50,00000</th>
                            <td class="text-end">
                                <button class="btn btn-sm btn-danger">remove</button>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>

                <div class="text-end mt-3">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

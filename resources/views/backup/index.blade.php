<x-app-layout>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Backup</h5>
        <form method="POST" action="{{ route('backups.store') }}" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-primary">Generate Backup</button>
    </form>
    </div>

    <div class="card">
        <div class="card-header">Backup Information</div>
        <div class="card-body">
           <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Date</th>
                        <th>File</th>
                        <th>File Size</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataset as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->source }}</td>
                            <td>{{ round(Storage::disk('backup')->size($item->source)/1024)}} KB</td>
                            <td class="text-end">
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

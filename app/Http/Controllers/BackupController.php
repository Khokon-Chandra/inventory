<?php

namespace App\Http\Controllers;

use App\Models\Backup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class BackupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backup.index', [
            'dataset' => Backup::paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // lock all tables
        DB::unprepared('FLUSH TABLES WITH READ LOCK;');

        // run the artisan command to backup the db using the package I linked to
        Artisan::call('backup:run', ['--only-db' => true]);  // something like this

        // unlock all tables
        DB::unprepared('UNLOCK TABLES');

        return redirect()->route('backups.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Backup $backup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Backup $backup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Backup $backup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Backup $backup)
    {
        //
    }
}

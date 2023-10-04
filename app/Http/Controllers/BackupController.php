<?php

namespace App\Http\Controllers;

use App\Exports\DatabaseExport;
use App\Models\Backup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller
{

    private $tableNames = [
        'users',
        'orders',
        'stores',
        'stocks',
        'transfers',
        'products',
        'categories',
    ];
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


    private function rowsParser($rows)
    {
        $content = [];

        foreach($rows as $row){
            $values = array_values(collect($row)->toArray());
            $string = [];
            foreach($values as $value){
                $string[]= is_numeric($value) ? $value : "'".$value."'";
            }
           $content[] = "(".implode(',',$string).")";
        }

        return implode(',', $content);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $companyId = Auth::user()->company_id;

        $sqlcontents = "";

        foreach($this->tableNames as $tableName){
            $query = DB::getSchemaBuilder()->getColumnListing($tableName);

            $query = array_map(fn($column) => "`$column`", $query);

            $tableColumns = implode(',',$query);

            $rows = DB::table($tableName)->where('company_id',$companyId)->get()->toArray();

            $values = $this->rowsParser($rows);

            $sqlcontents .= "INSERT INTO `$tableName`($tableColumns) VALUES($values)".PHP_EOL;
        }

        $backupName = Carbon::now()->format('Y-m-d__H-s-i').'.sql';


        Storage::disk('backup')->put($backupName,$sqlcontents, FILE_APPEND);
        
        Backup::create([
            'company_id' => $companyId,
            'source' => $backupName,
        ]);

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

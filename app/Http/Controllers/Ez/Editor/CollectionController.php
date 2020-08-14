<?php

namespace App\Http\Controllers\Ez\Editor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CollectionController extends Controller
{
    public function __construct() {
        $this->collections = $this->getCollections('Collections');
        $this->editableClasses = [];
    }

    /**
     * Instantiates a new instance of a collection model
     * 
     * TODO: Add error checks
     */
    private function loadCollectionClass($className) {
        $fullClassName = "\App\Collections\\".$className;
        return new $fullClassName();
    }

    /**
     * Gets a list of all collection models
     */
    public function getCollections($namespace = "Collections") {
        $path = app_path()."\\".$namespace;
        $out = [];
        $results = scandir($path);
        
        foreach ($results as $result) {
            
            if ($result === '.' or $result === '..') continue;
            $filename = $path . '\\' . $result;

            if (is_dir($filename)) {
                $out[] = array_merge($out, $this->getCollections($filename));
            } else {
                // $out[] = substr($filename,0,-4);
                $fullClass = substr($filename,0,-4);

                $className = last(explode("\\", $fullClass));

                $out[] = [
                    'class' => $className,
                    // TODO: Collection namespace should be dynamic
                    'namespace' => 'App\\Collections',
                    'label' => Str::plural(ucfirst($className)),
                ];
            }
        }

        return $out;
    }

    /**
     * List all collection models
     */
    public function index() {
        return view('collections.index');
    }

    /**
     * Displays a single collection model (and its rows)
     */
    public function show($collection) {
        $collectionModel = $this->loadCollectionClass($collection);

        return view('collections.model.index', [
            'collection' => $collection,
            'columns' => Schema::getColumnListing($collectionModel->getTable()),
            'rows' => $collectionModel->all(),
        ]);
    }

    /**
     * Displays the edit form for a collection's row
     */
    public function editRow($collection, $id) {
        $collectionModel = $this->loadCollectionClass($collection);

        // Find the row
        $row = $collectionModel->find($id);

        // Add the current values for each column
        $columns = array_map(function($col) use($row) {
            // TODO: Remove un-editable columns here rather than in the template
            $col->CurrentValue = $row->{$col->Field};
            return $col;
        }, DB::select('describe '.$collectionModel->getTable()));

        return view('collections.model.edit-row', [
            'collection' => $collection,
            'id' => $id,
            'row' => $row,
            'columns' => $columns,
        ]);
    }

    /**
     * Updates a collection's row
     * 
     * TODO: Validation
     */
    public function updateRow(Request $request, $collection, $id) {
        $collectionModel = $this->loadCollectionClass($collection);

        // Find the row
        $row = $collectionModel->find($id);

        // Only update existing fields
        foreach($request->all() as $key => $newColumnValue) {
            if($row->{$key}) {
                $row->{$key} = $newColumnValue;
            }
        }

        // Save the updated row
        $row->save();

        return redirect()->route('collection.row.show', [
            'collection' => $collection,
            'id' => $id,
        ])->with('info', 'Record updated!');
    }
}

<?php

namespace App\Http\Controllers\Ez\Editor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class CollectionController extends Controller
{
    public function __construct() {
        $this->collectionPaths = $this->getCollections('Collections');
        $this->editableClasses = [];
    }

    public function getCollections($namespace) {
        $path = app_path()."\\".$namespace;
        $out = [];
        $results = scandir($path);
        foreach ($results as $result) {
            if ($result === '.' or $result === '..') continue;
            $filename = $path . '\\' . $result;
            if (is_dir($filename)) {
                $out = array_merge($out, $this->getCollections($filename));
            }else{
                $out[] = substr($filename,0,-4);
            }
        }
        return $out;
    }





    public function index() {
        foreach($this->collectionPaths as $collection) {
            $className = last(explode("\\", $collection));

            $this->editableClasses[] = [
                'class' => $className,
                // TODO: Collection namespace should be dynamic
                'namespace' => 'App\\Collections',
                'label' => Str::plural(ucfirst($className)),
            ];
        }

        // dd($this->editableClasses);

        return view('ez.collections.index', [
            'collections' => $this->editableClasses,
        ]);
    }

    public function show($collection) {
        $fullClassName = "\App\Collections\\".$collection;
        $collectionModel = new $fullClassName();

        // $columns = Schema::getColumnListing($collectionModel->getTable());

        // dd($columns);

        return view('ez.collections.model.index', [
            'columns' => Schema::getColumnListing($collectionModel->getTable()),
            'rows' => $collectionModel->all(),
        ]);

        // dd($collectionModel->all());

        // dd($collection);
    }
}

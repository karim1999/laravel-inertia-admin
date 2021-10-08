<?php

namespace Karim\LaravelInertiaAdmin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Karim\LaravelInertiaAdmin\Module\Grid;

/**
 *
 */
abstract class ModuleController extends Controller
{
    /**
     * @var
     */
    protected $model;
    /**
     * @var
     */
    protected $query;
    /**
     * @var
     */
    protected $grid;
    /**
     * @var int
     */
    protected $pageSize= 10;

    /**
     * @var string[]
     */
    public $options= [
        "key" => "id",
    ];

    /**
     * @param Request $request
     * @return mixed
     */
    public function getData(Request $request){
        $users = ($this->getModel())::query();
        $sort_by= $request->sort_by;
        $sort_type= $request->sort_type === "descend" ? "desc" : "asc";

        if ($sort_by) {
            $users= $users->orderBy($sort_by, $sort_type);
        }

        $limit= $request->limit ?: $this->getPageSize();
        $users= $users->paginate($limit);
        $users= $users->appends(request()->query());;
        return $users;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function renderTable(Grid $grid, Request $request)
    {
        $records= $this->getData($request);
        return Inertia::render('Admin/Module/List', [
            'grid' => $grid,
            'records' => $records,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    abstract public function index(Request $request);

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     * @return ModuleController
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param mixed $query
     * @return ModuleController
     */
    public function setQuery($query)
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGrid()
    {
        return $this->grid;
    }

    /**
     * @param mixed $grid
     * @return ModuleController
     */
    public function setGrid($grid)
    {
        $this->grid = $grid;
        return $this;
    }

    /**
     * @return int
     */
    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    /**
     * @param int $pageSize
     * @return ModuleController
     */
    public function setPageSize(int $pageSize): ModuleController
    {
        $this->pageSize = $pageSize;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param string[] $options
     * @return ModuleController
     */
    public function setOptions(array $options): ModuleController
    {
        $this->options = $options;
        return $this;
    }

}

<?php

namespace Karim\LaravelInertiaAdmin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;

class ModuleController extends Controller
{
    public $model= "";
    public $pageSize= 10;
    public $allowedFilters= ['id', 'name', 'email'];
    public $allowedSorts= ['id', 'name', 'email'];
    public $allowedIncludes= [];
    public $allowedFields= [];
    public $allowedAppends= [];
    public $options= [
        "key" => "id",
    ];

    public function getData(Request $request){
        $users = ($this->model)::query();
        $sort_by= $request->sort_by;
        $sort_type= $request->sort_type === "descend" ? "desc" : "asc";

        if ($sort_by) {
            $users= $users->orderBy($sort_by, $sort_type);
        }

        $limit= $request->limit ?: $this->pageSize;
        $users= $users->paginate($limit);
        $users= $users->appends(request()->query());;
        return $users;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        $records= $this->getData($request);
        return Inertia::render('Admin/Module/List', [
            'headers' => [
                [
                    "title" => "ID",
                    "dataIndex" => "id",
                    "filter" => "text",
                    "sorter" => true,
                    "sortOrder" => ($request->sort_type ?: "ascend") === "descend" ? "descend" : "ascend"
                ],
                [
                    "title" => "Name",
                    "dataIndex" => "name",
                    "filter" => "text",
                ],
                [
                    "title" => "Email",
                    "dataIndex" => "email",
                    "filter" => "text",
                ],
            ],
            'records' => $records,
            'options' => $this->options,
        ]);
    }

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
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeRequest;
use App\Models\Type;
use Illuminate\Http\Request;
use TypeService;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Thể loại';
        $data['types'] = \App\Services\TypeService::getInstance()->getListTypes();
        return view('admin.types.index')->with(['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Thể loại';
        return view('admin.types.create')->with(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeRequest $request)
    {
        \App\Services\TypeService::getInstance()->create($request);
        $data['title'] = 'Thể loại';
        $data['types'] = \App\Services\TypeService::getInstance()->getListTypes();
        toastr()->success('Thêm thể loại thành công!');
        return redirect(route('types.index'))->with(['data', $data]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        //
    }
}

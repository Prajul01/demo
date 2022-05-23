<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\BackendBaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends BackendBaseController
{
    protected $route = 'backend.category.';
    protected $panel = 'Categories';
    protected $model;

    public function __construct()
    {
        $this->model = new Category();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rows'] =$this->model->all();
       return view($this->__DataToView($this->route . 'index'),compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['row']=$this->model->all();
        return view($this->__DataToView($this->route . 'create'),compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {  $request->request->add(['created_by'=>auth()->user()->id]);
        $data['row']=$this->model->create($request->all());
        if ($data['row']){
            request()->session()->flash('success',$this->panel . 'Created Successfully');
        }else{
            request()->session()->flash('error',$this->panel . 'Creation Failed');
        }
//        return redirect()->route('category.index',compact('data'));
        return redirect()->route($this->__DataToView($this->route . 'index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data['row']=$this->model->find($id);
        return view($this->__DataToView($this->route . 'show'),compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['row']=$this->model->find($id);
        return view($this->__DataToView($this->route . 'edit'),compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $data['row'] =$this->model->find($id);
        $request->request->add(['updated_by'=>auth()->user()->id]);
        if(!$data ['row']){
            request()->session()->flash('error','Invalid Request');
            return redirect()->route($this->__DataToView($this->route . 'index'));
        }
        if ($data['row']->update($request->all())) {
            $request->session()->flash('success', $this->panel .' update Successfully');
        } else {
            $request->session()->flash('error', $this->panel .' Update failed');

        }
        return redirect()->route($this->__DataToView($this->route . 'index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['row'] =$this->model->find($id);
        if(!$data ['row']){
            request()->session()->flash('error','Invalid Request');
            return redirect()->route($this->__DataToView($this->route . 'index'));
        }
        if ($data['row']->delete($id)) {
            session()->flash('success', $this->panel .' Delete Successfully');
        } else {
            session()->flash('error', $this->panel .' delete failed');
        }
        return redirect()->route($this->__DataToView($this->route . 'index'));
    }

    public function check_slug(Request $request)
    {
        $slug = str_slug($request->title);
        return response()->json(['slug' => $slug]);
    }
}

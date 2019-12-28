<?php

namespace App\Http\Controllers;

use App\AbsentPresent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AbsentPresentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = AbsentPresent::all();
        return $items;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $uniqueRule =  Rule::unique('absent_presents')->where(function ($query) use ($data){
            $query->where('student_id', $data['student_id']);
            $query->where('checkdate', $data['checkdate']);
        });

        $validator = Validator::make($request->all(),[
            'student_id' => 'required | exists:students,id',
            'checkdate' => ['required' , 'date', $uniqueRule],
        ]);

        if($validator->fails()){
            return $validator->errors()->first();
        }

        AbsentPresent::create($request->all());
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return AbsentPresent::findOrFail($id);
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
        $validator = Validator::make($request->all(),[
            'student_id' => 'sometimes | exists:students,id',
            'checkdate' => ['sometimes' , 'date'],
        ]);

        if($validator->fails()){
            return $validator->errors()->first();
        }

        $item = AbsentPresent::findOrFail($id);

        $item->update($request->all());
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = AbsentPresent::findOrFail($id);

        $item->delete();
        return 'Deleted Successfully';
    }
}

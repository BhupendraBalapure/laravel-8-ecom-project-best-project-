<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    public function index()
    {
        $result['data'] = Color::all();
        return view('admin.color', $result);
    }

    public function manage_color(Request $request,$id='')
    {
        if($id>0){
            $arr=Color::where(['id'=>$id])->get();
            $result['color']=$arr['0']->color;
            $result['id']=$arr['0']->id;

        }
        else {
            $result['color']='';
            $result['id']='';


        }
        return view('admin.manage_color',$result);
    }

    public function manage_color_process(Request $request)
    {
        // return $request->post();
        $request->validate([
            'color' => 'required|unique:colors,color,'.$request->post('id'),
        ]);
        if($request->post('id')>0)
        {
            $model = Color::find($request->post('id'));
            $msg ="color update";

        }
        else {
            $model = new Color();
            $msg ="color insert";
        }

        $model->color = $request->post('color');
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/color');
    }

    public function delete(Request $request, $id)
    {
        $model = Color::find($id);
        $model->delete();
        $request->session()->flash('message', 'delete Successfully');
        return back();
    }

    public function status(Request $request,$status,$id)
    {
        $model = Color::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message', 'color Updated');
        return back();

    //    dd($status);
    }}

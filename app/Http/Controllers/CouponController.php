<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function index()
    {
        $result['data'] = Coupon::all();
        return view('admin.coupon', $result);
    }

    public function manage_coupon(Request $request,$id='')
    {
        if($id>0){
            $arr=Coupon::where(['id'=>$id])->get();
            $result['title']=$arr['0']->title;
            $result['code']=$arr['0']->code;
            $result['value']=$arr['0']->value;

            $result['id']=$arr['0']->id;

        }
        else {
            $result['title']='';
            $result['code']='';
            $result['value']='';
            $result['id']='';


        }
        // dd($result);
        // echo '<pre>';
        //     print_r($result);
        //     die();

        return view('admin.manage_coupon',$result);
    }

    public function manage_coupon_process(Request $request)
    {
        // return $request->post();
        $request->validate([
            'title' => 'required',
            'value' => 'required',
            'code' => 'required|unique:coupons,code,'.$request->post('id'),
        ]);
        if($request->post('id')>0)
        {
            $model = Coupon::find($request->post('id'));
            $msg ="coupon update";

        }
        else {
            $model = new Coupon();
            $msg ="coupon insert";
        }

        $model->title = $request->post('title');
        $model->code = $request->post('code');
        $model->value = $request->post('value');
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/coupon');
    }

    public function delete(Request $request, $id)
    {
        $model = Coupon::find($id);
        $model->delete();
        $request->session()->flash('message', 'delete Successfully');
        return redirect('admin/coupon');
    }
    public function status(Request $request,$status,$id)
    {
        $model = Coupon::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message', 'Coupon Updated');
        return redirect('admin/coupon');
 
    //    dd($status);
    }
}

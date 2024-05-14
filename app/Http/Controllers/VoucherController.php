<?php

namespace App\Http\Controllers;

use App\Models\UserVoucher;
use Illuminate\Http\Request;
use App\Models\Voucher;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

session_start();

class VoucherController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session()->get('admin_id');
        if ($admin_id) {
            return Redirect::to('/dashboard');
        } else {
            return Redirect::to('/admin')->send();
        }
    }
    public function add_voucher()
    {
        $this->AuthLogin();
        return view('admin.add_voucher');
    }
    public function all_voucher()
    {
        $this->AuthLogin();
        $voucher = Voucher::orderby('voucher_id', 'DESC')->get();
        return view('admin.all_voucher')->with(compact('voucher'));
    }
    public function delete_voucher($voucher_id)
    {
        $voucher = Voucher::find($voucher_id);
        $voucher->delete();
        Session()->put('message', 'Xóa mã giảm giá thành công');
        return Redirect::to('all-voucher');
    }
    public function save_voucher(Request $request)
    {
        $data = $request->all();
        $voucher = new Voucher;
        $voucher->voucher_name = $data['voucher_name'];
        $voucher->voucher_number = $data['voucher_number'];
        $voucher->voucher_code = $data['voucher_code'];
        $voucher->voucher_time = $data['voucher_time'];
        $voucher->voucher_condition = $data['voucher_condition'];
        $voucher->save();

        Session()->put('message', 'Thêm mã giảm giá thành công');
        return Redirect::to('add-voucher');
    }
    public function check_voucher(Request $request)
    {

        $data = $request->all();
        $voucher = Voucher::where('voucher_code', $data['voucher'])->first();
        $user_id = Auth::user()->id;


        if ($voucher == null) {
            return redirect()->back()->with('error', 'Mã giảm giá không tồn tại');
        }
        $voucher_time = $voucher->voucher_time;
        if ($voucher_time == 0) {

            return redirect()->back()->with('error', 'Mã giảm giá đã hết lượt sử dụng');
        }
        $userVoucher = UserVoucher::where('user_id', $user_id)
            ->where('voucher_id', $voucher->voucher_id)
            ->first();
        if ($userVoucher) {

            return redirect()->back()->with('error', 'Bạn đã sử dụng mã giảm giá này rồi');
        }
        if (Cart::count() == 0) {
            Session()->forget('voucher');
        }

        $cou[] = array(
            'voucher_code' => $voucher->voucher_code,
            'voucher_condition' => $voucher->voucher_condition,
            'voucher_number' => $voucher->voucher_number,
        );
        Session()->put('voucher', $cou);
        Session()->save();
        return redirect()->back()->with('message', 'Thêm mã giảm thành công');
        // if ($voucher) {
        //     $count_voucher = $voucher->count();
        //     if ($count_voucher > 0) {
        //         $count_session = Session()->get('voucher');
        //         if ($count_session == true) {
        //             $is_available = 0;
        //             if ($is_available == 0) {
        //                 $cou[] = array(
        //                     'voucher_code' => $voucher->voucher_code,
        //                     'voucher_condition' => $voucher->voucher_condition,
        //                     'voucher_number' => $voucher->voucher_number,
        //                 );
        //                 Session()->put('voucher', $cou);
        //             }
        //         } else {
        //             $cou[] = array(
        //                 'voucher_code' => $voucher->voucher_code,
        //                 'voucher_condition' => $voucher->voucher_condition,
        //                 'voucher_number' => $voucher->voucher_number,
        //             );
        //             Session()->put('voucher', $cou);
        //         }
        //         Session()->save();
        //         return redirect()->back()->with('message', 'Thêm mã giảm thành công');
        //     }
        // } else {
        //     return redirect()->back()->with('error', 'Mã giảm giá không đúng');
        // }
    }
    public function del_vou()
    {
        Session()->forget('voucher');
        return redirect()->back();
    }
}

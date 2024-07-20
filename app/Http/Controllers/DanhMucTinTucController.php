<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DanhMucTinTucController extends Controller
{
    public function index()
    {
        $data = DB::table("danh_muc_tin_tucs")
            ->get();
        return view("admin.danhmuc.index", compact("data"));
    }

    public function getDanhMucs()
    {
        return DB::table("danh_muc_tin_tucs")->get();
    }

    public function create()
    {
        return view("admin.danhmuc.create");
    }

    public function store(Request $request)
    {
        DB::table("danh_muc_tin_tucs")
            ->insert([
                "ten_danh_muc" => $request->input("tendanhmuc"),
            ]);
        return redirect("/danh-muc")->with("success", "Thêm sản phẩm thành công");
    }

    public function edit($id)
    {
        $danhmuc = DB::table("danh_muc_tin_tucs")
            ->where("id", $id)
            ->first();
        return view("admin.danhmuc.edit", compact("danhmuc"));
    }

    public function update(Request $request, $id)
    {
        DB::table("danh_muc_tin_tucs")
            ->where("id", $id)
            ->update([
                "ten_danh_muc" => $request->input("tendanhmuc"),
            ]);
        return redirect("/danh-muc")->with("success", "Sửa Thành Công");
    }

    public function destroy($id)
    {
        DB::table("danh_muc_tin_tucs")
            ->where("id", $id)
            ->delete();
        return redirect("/danh-muc")->with("success", "Xóa sản phẩm thành công");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DanhMucTinTucController;
use Illuminate\Support\Facades\DB;

class TinTucController extends Controller
{

    protected $danh_mucs;

    public function __construct()
    {
        $this->danh_mucs = new DanhMucTinTucController();
    }

    public function timkiem(Request $request)
    {
        $timkiem = $request->input('timkiem');

        $tintucs = DB::table('tin_tucs')
            ->where('tieu_de', 'like', '%' . $timkiem . '%')
            ->orWhere('tom_tat', 'like', '%' . $timkiem . '%')
            ->orderBy('ngay_dang', 'desc')
            ->get();

        return view('user.timkiem', compact('tintucs', 'timkiem'));
    }

    public function tinMoi()
    {
        $data = DB::table("tin_tucs")->get();
        return view("user.tinmoi", compact("data"));
    }

    public function chiTietTin($id)
    {
        $binhluan = DB::table('binh_luans')
            ->where('tin_tuc_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();
        DB::table('tin_tucs')
            ->where('id', $id)
            ->increment('luot_xem');

        $tintuc = DB::table('tin_tucs')
            ->where('id', $id)
            ->first();

        $lq1 = DB::table('tin_tucs')
            ->select('id', 'tom_tat', 'hinh_anh', 'ngay_dang', 'tieu_de')
            ->orderBy('ngay_dang', 'desc')
            ->limit(6)
            ->get();
        return view('user.chitiet', compact('id', 'tintuc', "lq1", "binhluan"));
    }

    public function index()
    {
        $tintucs = DB::table('tin_tucs as tt')
            ->join('danh_muc_tin_tucs as dm', 'tt.danh_muc_id', '=', 'dm.id')
            ->select('tt.*', 'dm.ten_danh_muc')
            ->latest('tt.id')
            ->simplePaginate(6);
        return view("admin.tintuc.index", compact("tintucs"));
    }

    public function indexUser()
    {
        $tintop10 = DB::table('tin_tucs')
            ->select('id', 'tieu_de', 'hinh_anh', 'luot_xem')
            ->orderBy('luot_xem', 'desc')
            ->limit(10)
            ->get();
        $lq1 = DB::table('tin_tucs')
            ->select('id', 'tom_tat', 'hinh_anh', 'ngay_dang', 'tieu_de')
            ->orderBy('ngay_dang', 'desc')
            ->limit(10)
            ->get();
        $tinmoi = DB::table('tin_tucs')
            ->select('id', 'tieu_de', 'tom_tat', 'hinh_anh', 'ngay_dang')
            ->orderBy('ngay_dang', 'desc')
            ->limit(2)
            ->get();
        $tintucs = DB::table("tin_tucs")
            ->get();

        return view("user.index", compact("tintucs", "tintop10", "tinmoi", "lq1"));
    }


    public function tinLoai($id)
    {
        $kq = DB::table('danh_muc_tin_tucs')
            ->where('id', $id)
            ->first();
        $data = DB::table("tin_tucs")
            ->where("danh_muc_id", $id)
            ->get();

        return view("user.danhmuctin", compact("id", "data", "kq"));
    }

    public function create()
    {
        $danhmuc = $this->danh_mucs->getDanhMucs();
        return view("admin.tintuc.create", compact("danhmuc"));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('hinh_anh')) {
            $file = $request->file('hinh_anh')
                ->store('uploads/tintuc', 'public');
        } else {
            $file = 'null';
        }

        DB::table("tin_tucs")->insert([
            "tieu_de" => $request->input("tieu_de"),
            "noi_dung" => $request->input("noi_dung"),
            "tom_tat" => $request->input("tom_tat"),
            "hinh_anh" => $file,
            "ngay_dang" => $request->input("ngay_dang"),
            "danh_muc_id" => $request->input("danh_muc"),
        ]);

        return redirect("tin-tuc")
            ->with("success", "Thêm tin tức thành công");
    }

    public function show($id)
    {
        $danhmuc = $this->danh_mucs->getDanhMucs();
        $tintuc = DB::table("tin_tucs")
            ->where('id', $id)
            ->first();
        return view("admin.tintuc.show", compact("danhmuc", "tintuc"));
    }
    public function edit($id)
    {
        $danhmuc = $this->danh_mucs->getDanhMucs();
        $tintuc = DB::table("tin_tucs")
            ->where('id', $id)
            ->first();
        return view("admin.tintuc.edit", compact("danhmuc", "tintuc"));
    }

    public function update(Request $request, $id)
    {

        if ($request->hasFile("hinh_anh")) {
            $file = $request->file("hinh_anh")
                ->store("uploads/tintuc", "public");
        } else {
            $file = null;
        }

        DB::table("tin_tucs")
            ->where("id", $id)
            ->update([
                "tieu_de" => $request->input("tieu_de"),
                "noi_dung" => $request->input("noi_dung"),
                "hinh_anh" => $file,
                "tom_tat" => $request->input("tom_tat"),
                "ngay_dang" => $request->input("ngay_dang"),
                "danh_muc_id" => $request->input("danh_muc"),
            ]);

        return redirect("tin-tuc")
            ->with("success", "Sửa tin tức thành công");
    }

    public function destroy($id)
    {
        DB::table("tin_tucs")
            ->where("id", $id)
            ->delete();

        return redirect()->route('tintuc.trangchu')
            ->with("success", "Xóa tin tức thành công");
    }
}
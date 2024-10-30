<?php 
namespace App\Http\Controllers;
use App\models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function getsiswa()
    {
        $dt_siswa=siswa::join('kelas','siswa.id','=','kelas.id')
        ->get();
        return response()->json($dt_siswa);
    }

    public function createsiswa(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'nama'=>'required',
            'alamat'=>'required',
            'tanggal_lahir'=>'required',
            'gender'=>'required',
            'id_kelas'=>'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors()->toJson());
        }
        $save = siswa::create([
            'nama'=>$req->get('nama'),
            'alamat'=>$req->get('alamat'),
            'tanggal_lahir'=>$req->get('tanggal_lahir'),
            'gender'=>$req->get('gender'),
            'id_kelas'=>$req->get('id_kelas'),
        ]); 
        if($save){
            return Response()->json(['status'=>true, 'message' => 'Sukses menambah siswa']);
        }else{
            return Response()->json(['status'=>false, 'message' => 'Gagal menambah siswa']);
        } 
    }
}
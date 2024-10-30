<?php 
namespace App\Http\Controllers;
use App\models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

Class KelasController extends Controller
{
    Public function createkelas(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'id'=>'required',
            'nama_kelas'=>'required',
            'kelompok'=>'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors()->toJson());
        }
        $save = kelas::create([
            'id'=>$req->get('id'),
            'nama_kelas'=>$req->get('nama_kelas'),
            'kelompok'=>$req->get('kelompok'),
        ]); 
        if($save){
            return Response()->json(['status'=>true, 'message' => 'Sukses menambah kelas']);
        }else{
            return Response()->json(['status'=>false, 'message' => 'Gagal menambah kelas']);
        }
    } 
}
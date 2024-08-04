<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Jawaban;
use App\Models\Pertanyaan;
use App\Models\Responden;
use App\Models\TipeMbti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TipeMbtiController extends Controller
{
    public function getListMbti(){
        $listmbti = TipeMbti::get();
        $arrayGambar = [
            "https://assets-global.website-files.com/641271c355d47587e5061016/64e2cab5a55e58e2f15b404d_6_ESTJ%20Big-p-500.png",
            "https://assets-global.website-files.com/641271c355d47587e5061016/64e2cab5bb8618a54227e0d1_6_ENTP%20Big%201-p-500.png",
            "https://assets-global.website-files.com/641271c355d47587e5061016/64e2cab56f9e84517ae5703b_6_ENFP%20Big%201-p-500.png",
            "https://assets-global.website-files.com/641271c355d47587e5061016/64e2cab7eba14476cc8ef748_6_ENTJ%20Big%201-p-500.png",
            "https://assets-global.website-files.com/641271c355d47587e5061016/64e2cab4b4f5ea9cddd3c898_6_ENFJ%20Big%201-p-500.png",
            "https://assets-global.website-files.com/641271c355d47587e5061016/64e2cab6b5b9edeac76d3f7e_6_INTP%20Big%201-p-500.png",
            "https://assets-global.website-files.com/641271c355d47587e5061016/64e2cab6e073f390272ea7ec_6_INFP%20Big%201-p-500.png",
            "https://assets-global.website-files.com/641271c355d47587e5061016/64e2cab6b4f5ea9cddd3c940_6_INTJ%20Big%201-p-500.png",
            "https://assets-global.website-files.com/641271c355d47587e5061016/64e2cab663b2f660d8a6550f_6_INFJ%20Big%201-p-500.png",
            "https://assets-global.website-files.com/641271c355d47587e5061016/64e2cab4afe3bbe1853a66f8_6_ESTP%20Big%201-p-500.png",
            "https://assets-global.website-files.com/641271c355d47587e5061016/64e2cab41b138bcd3e99edba_6_ISTP%20Big%201-p-500.png",
            "https://assets-global.website-files.com/641271c355d47587e5061016/64e2cab6e073f390272ea7ff_6_ESFP%20Big%201-p-500.png",
            "https://assets-global.website-files.com/641271c355d47587e5061016/64e2cab5a55e58e2f15b404d_6_ESTJ%20Big-p-500.png",
            "https://assets-global.website-files.com/641271c355d47587e5061016/64e2cab51b138bcd3e99ee3f_6_ESFJ%20Big%201-p-500.png",
            "https://assets-global.website-files.com/641271c355d47587e5061016/64e2cab6333767c273c96888_6_ISFP%20Big%201-p-500.png",
            "https://assets-global.website-files.com/641271c355d47587e5061016/64e2cab6ff07e6b1ff3958ae_6_ISTJ%20Big-p-500.png",
        ];
        return view("Tipe.index", compact('listmbti','arrayGambar'));
    }
    public function getDetailMbti($id){
        $listmbti = TipeMbti::where('id', $id)->first(); // Gunakan first() untuk mendapatkan satu hasil
        return view('Tipe.detail', compact('listmbti'));
    }
    public function saveName(Request $request) {
        Session::forget('userId');
        $saveUser = Responden::create(
            ['nama'=> $request->input('name')]
        );
        $saveUser->save();
        Session::put('userId',$saveUser->id);
        return redirect()->route('pertanyaan',['id'=> 6]);
    }
     public function getQuestion($id){
        $pertanyaan = Pertanyaan::where('id',$id)->first();
        $jawaban = Jawaban::where('kode_penyakit', $pertanyaan->kode_pertanyaan)->get();

        return view("Pertanyaan.index", compact('pertanyaan', 'jawaban'));
     }

     public function nextQuestion($id,$idJawab){
        $pertanyaan = Pertanyaan::where('id',$id)->first();
        $kodeJawab = Jawaban::where('id',$idJawab)->first();
        $jawab = Hasil::create([
            "kode_pertanyaan" => $pertanyaan->kode_pertanyaan,
            "kode_jawaban" => $kodeJawab->kode_Jawaban,
            "id_responden" => Session::get('userId'),
        ]);
        if ($jawab) {
            // Simpan jawaban baru
            $jawab->save();
        
            // Hitung total jumlah pertanyaan
            $totalPertanyaan = Pertanyaan::count();
        
            // Cek apakah pertanyaan saat ini adalah yang terakhir
            if ($pertanyaan->id == $totalPertanyaan) {
                return redirect()->route('hasil',['userId' => Session::get('userId')]);
            } else {
                // Jika bukan pertanyaan terakhir, lanjutkan ke pertanyaan berikutnya
                $next_id = $pertanyaan->id + 1;
                return redirect()->route('pertanyaan', ['id' => $next_id]);
            }
        }
     }

     public function hasil($id) {
        $getHasil = Hasil::where('id_responden', $id)->get();
        $user = Responden::where('id',$id)->first();
// Ambil semua kode jawaban dari hasil
$kodeJawaban = $getHasil->pluck('kode_jawaban');

// Ambil semua jawaban yang sesuai dengan kode jawaban
$getKodeJawab = Jawaban::whereIn('kode_Jawaban', $kodeJawaban)->get();

// Inisialisasi hitungan kepribadian
$kepribadianCount = [
    'E' => 0,
    'I' => 0,
    'N' => 0,
    'S' => 0,
    'F' => 0,
    'T' => 0,
    'P' => 0,
    'J' => 0,
];

// Hitung jumlah masing-masing kode kepribadian
foreach ($getKodeJawab as $jawaban) {
    $kode = $jawaban->kode_kepribadian;
    if (array_key_exists($kode, $kepribadianCount)) {
        $kepribadianCount[$kode]++;
    }
}

// Tentukan mana yang lebih besar
$EI = $kepribadianCount['E'] >= $kepribadianCount['I'] ? 'E' : 'I';
$NS = $kepribadianCount['N'] >= $kepribadianCount['S'] ? 'N' : 'S';
$FT = $kepribadianCount['F'] >= $kepribadianCount['T'] ? 'F' : 'T';
$PJ = $kepribadianCount['P'] >= $kepribadianCount['J'] ? 'P' : 'J';

// Gabungkan hasil kepribadian
$finalKepribadian = $EI . $NS . $FT . $PJ;

// Tampilkan hasil
// echo "Kepribadian akhir: " . $finalKepribadian;
    $detailId = TipeMbti::where('nama',$finalKepribadian)->first();
// // Debug untuk memastikan data sudah benar
// dd($getHasil, $getKodeJawab, $kepribadianCount);
return view('hasil',compact('finalKepribadian','user','detailId'));
     }
     
     
}

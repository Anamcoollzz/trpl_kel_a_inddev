<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\PencairanSaldo;
use App\RekeningMember;
use Auth;

class SaldoController extends Controller
{

	public function index()
	{
		$PencairanSaldo = PencairanSaldo::with('rekening')->where('user_id',Auth::id())->latest()->paginate(10);
		return view('frontend.pencairan-saldo.saya',[
			'title'=>'Pencairan Saldo',
			'data'=>$PencairanSaldo,
		]);
	}

	public function baru()
	{
		$rekeningku = RekeningMember::where('user_id', Auth::id())->orderBy('default','desc')->get();
		return view('frontend.pencairan-saldo.baru',[
			'rekening'=>$rekeningku,
		]);
	}

	public function baruPost(Request $request)
	{
		$user = $request->user();
		$maks = $user->saldo;
		if($user->saldo > 10000000){
			$maks = 10000000;
		}
		$validator = Validator::make($request->all(), [
			'jumlah_pencairan'=>[
				'required',
				'numeric',
				'min:10000',
				'max:'.$maks,
				function($attribute, $value, $fail){
					if($value % 10000 != 0){
						$fail(ucwords(str_replace('_',' ',$attribute)).' harus dengan kelipatan '.'10.000');
					}
				},
				function($attribute, $value, $fail){
					$totalPencairan = PencairanSaldo::where('user_id', Auth::id())->where('created_at', '>=', date('Y-m-d', strtotime('-7 days')))->count();
					if($totalPencairan >= 2){
						$fail('Pencairan Saldo maksimal 2x dalam seminggu');
					}
				},
			]
		]);

		if ($validator->fails()) {
			return redirect()
			->back()
			->withErrors($validator)
			->withInput();
		}

		$ps = new PencairanSaldo();
		$ps->jumlah = $request->jumlah_pencairan;
		$ps->user_id = Auth::id();
		$ps->id_rekening_member = $request->id_rekening_member;
		$ps->save();
		$user = Auth::user();
		$user->saldo -= $request->jumlah_pencairan;
		$user->save();
		return redirect('pencairan-saldo');
	}

}

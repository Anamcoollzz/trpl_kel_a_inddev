<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Chat;
use App\ChatDetail;
use Auth;
use DB;

class ChatController extends Controller
{

	public function show($devEmail)
	{
		$user = User::where('email',$devEmail)->first();
		if(is_null($user)){
			return redirect('/');
		}
		$chat = Chat::
		with('member', 'developer')->
		where('id_member', Auth::id())
		->orWhere('id_developer', Auth::id())
		// ->groupBy('id_member','id_developer')
		// ->latest()
		->orderBy('created_at', 'asc')
		->get();
		$id = $chat->pluck('id_member')->toArray()+$chat->pluck('id_developer')->toArray();
		// unset yg login
		foreach (array_keys($id, Auth::id()) as $key) {
			unset($id[$key]);
		}
		$users = User::whereIn('id', $id)->get();
		return view('frontend.chat.show',[
			'chat'=>$chat,
			'users'=>$users
		]);
	}

	public function index()
	{
		// DB::enableQueryLog();
		// $chat = DB::select('select * from chat join users on users.id = chat.id_member where id_member = '.Auth::id().' or id_developer = '.Auth::id().' group by chat.id_member, chat.id_developer ');
		$chat = Chat::
		withCount(['detail'=>function($q){
			$q->where('sudah_dibaca', 'tidak');
		}])
		// with('member', 'developer')->
		->where('id_member', Auth::id())
		->orWhere('id_developer', Auth::id())
		->groupBy('id_member','id_developer')
		// ->latest()
		->get();
		// $id = $chat->pluck('id_member')->toArray();
		// $id = array_merge($id, $chat->pluck('id_developer')->toArray());
		// unset yg login
		// foreach (array_keys($id, Auth::id()) as $key) {
		// 	unset($id[$key]);
		// }
		// $users = User::whereIn('id', $id)->get();
		// return $id;
		// return $chat;
		// return DB::getQueryLog();
		return view('frontend.chat.index',[
			'chat'=>$chat
		]);
	}

	public function post(Request $request, $id)
	{
		$chatDetail = new ChatDetail();
		$chatDetail->id_user = Auth::id();
		$chatDetail->isi = $request->pesan;
		$chatDetail->id_chat = $id;
		$chatDetail->save();
		return redirect()->back();
	}

	public function chatDev($email)
	{
		$dev = User::where('email',$email)->first();
		$chat = Chat::where('id_member', Auth::id())->where('id_developer', $dev->id)->first();
		if(is_null($chat)){
			$chat = new Chat();
			$chat->id_member = Auth::id();
			$chat->id_developer = $dev->id;
			$chat->save();
		}
		return redirect('chat-id/'.$chat->id);
	}

	public function chatId(Chat $chat)
	{
		$cd = ChatDetail::where('id_chat', $chat->id)->where('id_user', '!=', Auth::id())->update([
			'sudah_dibaca'=>'ya'
		]);
		$chat->load('member', 'developer', 'detail');
		return view('frontend.chat.show',[
			'chat'=>$chat,
			// 'users'=>$users
		]);
	}

}

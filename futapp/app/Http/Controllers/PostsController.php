<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
class PostsController extends Controller
{
    public function index()
	{
		return view('posts.index');
	}

	public function mycards()
	{
		$players = DB::table('mycards')->join('completedataset','mycards.playerid','=','completedataset.Index')->where('userid','=',Auth::id())->get();

	return view('posts.show',compact('players'));
	}
	public function mycardsfilter($filter,$order,$show)
	{
		$players = DB::table('mycards')->join('completedataset','mycards.playerid','=','completedataset.Index')->where('userid','=',Auth::id())->select('completedataset.*')->orderBy($filter,$order)->take($show)->get();
		
	return view('posts.show',compact('players'));
	}
	
	public function openpack()
	{
		$user = DB::table("users")->where("id","=",Auth::id())->first();
		$dateuser = date($user->cardrequest);
		date_default_timezone_set('Europe/Brussels');
		$date = date('Y-m-d H:i:s');
		
		if($dateuser<$date){
			$diff_in_hours = 0;
		} else {
			$diff_in_hours	= floor(abs(strtotime($dateuser) - strtotime($date))/60);
		}

		return view('posts.openpack',compact("diff_in_hours"));
	}
	public function players()
	{
		$players = DB::table('completedataset')->orderBy('Overall','desc')->take(10)->get();

        return view('posts.show',compact('players'));
	} 
	public function searchPlayer(Request $request){
	   $req = $request->Name;
        $players = DB::table('completedataset')->where('Name','like','%' . $req . '%')->get();
       return view('posts.show',compact('players'));
	}
	public function filter($filter,$order,$show)
	{
		
		$players = DB::table('completedataset')->orderBy($filter,$order)->take($show)->get();
		
        return view('posts.show',compact('players'));
    	
	} 
	public function newplayers()
	{
		$user = DB::table("users")->where("id","=",Auth::id())->first();
		$dateuser = date($user->cardrequest);
		date_default_timezone_set('Europe/Brussels');
		$date = date('Y-m-d H:i:s');
		
		$diff_in_hours	= floor(abs(strtotime($dateuser) - strtotime($date))/60);
		if($dateuser<$date){
		 $players = DB::table('completedataset')->inRandomOrder()->take(5)->get();
		 foreach($players as $player){
		 	DB::insert('insert into mycards (playerid,userid) values (?,?)',[$player->Index,Auth::id()]);
		 	// $mycards = new mycards;
		 	// $mycards->playerid = $player->Index;
		 	// $mycards->save();
		 }
		 $extratime = date("Y-m-d H:i:s", strtotime ("+3 hour"));
		 DB::table("users")->where("id","=",Auth::id())->update(['cardrequest'=>$extratime]);
        return view('posts.newplayers',compact('players'));
    	} else {
    		return back();
    	}
	}
	public function findplayer($name)
	{
		$player = DB::table('completedataset')->where('Name',$name)->first();
       return view('posts.player',compact('player'));
	}
	public function findplayertosell($name)
	{
		$player = DB::table('mycards')->join('completedataset','mycards.playerid','=','completedataset.Index')->where('Name',$name)->first();
       return view('posts.player',compact('player'));
	}
	public function market()
	{
		return view('posts.market');
    	
    }

    public function api(){
    	$players = DB::table('transfers')->join("completedataset","transfers.cardId","=","completedataset.Index")->orderBy("transfers.remainingTime")->get();
    	//return $players;
    	  return response()->json($players);
    }
    public function playerById($id){
    	$player = DB::table('transfers')->join("completedataset","transfers.cardId","=","completedataset.Index")->where('transfers.id','=',$id)->first();
    	//return $players;
    	  return response()->json($player);
    }
    public function sell(Request $request)
    {
    	//dd($request);

    	$time = date("Y-m-d H:i:s", strtotime ("+24 hour"));
    	DB::table('transfers')->insert([
    		['cardId'=>$request->cardid,'playerId'=>$request->playerid,'startPrice'=>$request->startprice,'buyNowPrice'=>$request->buynowprice,'remainingTime'=>$time,'bidPrice'=>0,'userid'=>$request->userid]
    	]);
    	DB::table('mycards')->where('id','=',$request->mycardsid)->delete();
    	return redirect('/market');
    }
    public function deleteTransfer(Request $request, $id){
    	if($request->bidprice >0){
    		DB::table("mycards")->insert([['playerid'=>$request->cardid,'userid'=>$request->bidderid]]);
    		DB::table('users')->where('id','=',$request->userid)->increment('coins', $request->bidprice);
    		DB::table('users')->where('id','=',$request->bidderid)->decrement('coins', $request->bidprice);
    	}
    	DB::table('transfers')->where('id','=',$id)->delete();
    }
    public function postTransfer(Request $request){
    	
    	//deleteTransfer($request->transferid);
    	DB::table("mycards")->insert([['playerid'=>$request->cardid,'userid'=>Auth::id()]]);
    	DB::table('transfers')->where('id','=',$request->transferid)->delete();
    	DB::table('users')->where('id','=',$request->userid)->increment('coins', $request->buynowprice);
    	DB::table('users')->where('id','=',Auth::id())->decrement('coins', $request->buynowprice);
    }
    public function bidTransfer(Request $request){
    	
    	//DB::table('transfers')->where('id','=',$request->transferid)->delete();
    	DB::table('transfers')->where('id','=',$request->transferid)->update(['bidPrice' => $request->bidprice,'bidderid'=>Auth::id()]);
    	
    }
    public function leaderBoard(){
    	
    	$users = DB::table("users")->select(array('users.*',DB::raw('COUNT(mycards.userid)as cards'),DB::raw('AVG(completedataset.Overall)as overall')))->join("mycards","users.id","=","mycards.userid")->join("completedataset","mycards.playerid","=","completedataset.Index")->groupBy("users.id")->orderBy("users.coins","desc")->get();
    	//$users = DB::table('users')->select(array('users.*',DB::raw('COUNT(mycards.userid)as cards'),DB::raw('AVG(completedataset.Overall)as overall')))->join("mycards","users.id","=","mycards.userid")->join("completedataset","mycards.playerid","=","completedataset.Index")->get();
    	return view('posts.leaderboard',compact('users'));
    }
}

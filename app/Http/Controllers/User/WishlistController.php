<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    
	public function ViewWishlist(){
		return view('frontend.wishlist.view_wishlist');
	}

	public function GetWishlistProduct(){

		$wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
		return response()->json($wishlist);
	} // end mehtod 


	public function RemoveWishlistProduct($id){

		Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
		return response()->json(['success' => 'Successfully Product Remove']);
	}


	


}
 
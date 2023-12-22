<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use Auth;
use Carbon\Carbon;
use Hash;
use App\Models\User;



class UserController extends Controller{



public function index(Request $request){
	 $user = User::query();

    if ($request->has('search')) {
        $user->where('name','like','%'.$request->search .'%')
            ->orWhere('email','like','%'.$request->search .'%')
            ->orWhere('id','like','%'.$request->search.'%');
    }
 $users=$user->get();

 
 return view('admin.extends.user.manage_user',compact('users'));

}
	


	public function store(Request $request){

	
		$validated=$request->validate([
        'name' => 'required|max:255',
        'email' => 'required',
        'date_of_birth' => 'required',
    ]);

		$user=new User;
		$user->name=$request->name;
		$user->email=$request->email;
		$user->date_of_birth=$request->date_of_birth;
		$user->save();

      return response()->json(['data'=>$data,'Msg'=>'Data Successfully Showed','Code'=>200]);

	}

	public function show($id){
	$data=User::where('id',$id)->first();
	return response()->json(['data'=>$data,'Msg'=>'Data Successfully Showed','Code'=>200]);
	}


	public function edit($id){
	$data=User::where('id',$id)->first();
	return response()->json(['data'=>$data,'Msg'=>'Data Successfully Showed','Code'=>200]);
	}


	public function update(Request $request,$id){

		$validated=$request->validate([
        'name' => 'required|max:255',
        'email' => 'required',
        'date_of_birth' => 'required',
    ]);

	$data=User::where('id',$request->id)->update([
	   
	   'name'=>$request->amount,
	   'email'=>$request->debit_credit,
	   'date_of_birth'=>$request->total_saving,  

	]);


return response()->json(['data'=>$data,'Msg'=>'Data Successfully Showed','Code'=>200]);
	}

	public function destroy($id){

		$data=User::where('id',$id)->delete();
		  return response()->json(['message' => 'User deleted successfully']);

		  return response()->json(['data'=>$data,'Msg'=>'Data Successfully Showed','Code'=>201]);

	}



		public function store_payment(Request $request){

	
		$validated=$request->validate([
       
        'user_id' => 'required',
        'amount' => 'required',
       
    ]);

	

		$admin=new Admin;
		$admin->user_id=$request->user_id;
		$admin->amount=$request->amount;
		$admin->save();


	}




} 

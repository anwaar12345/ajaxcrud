<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;

class UsersAjaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            if(Auth::user()->role==1){
                $data = User::latest()->get()->where('id','!=',Auth::user()->id);
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editUser">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteUser">Delete</a>';
                            return $btn;
                    })
                    ->editColumn('status', function ($data) {
                        return ($data->status == 1) ? 'active' : 'Inactive';
                    })
                    ->editColumn('role', function ($data) {
                        return ($data->role == 1) ? 'Admin' : 'User';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }else{
                $data = User::latest()->get()->where('id',Auth::user()->id);
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editUser">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteUser">Delete</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            
        }
      
        return view('userAjax');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,User $User)
    {
        if($request->user_id){
            $data=[
                'name' => $request->name,
                 'email' => $request->email,
                 'role' => $request->role, 
                 'status' => $request->status
            ];
           $User->where('id',$request->user_id)->update($data);        
   
        return response()->json(['success'=>'User saved successfully.']);
    }else{
        $data=[
            'name' => $request->name,
             'email' => $request->email,
             'role' => $request->role, 
             'status' => $request->status,
             'password' => Hash::make($request->password)
        ];

        $User->create($data);
        return response()->json(['success'=>'User Created successfully.']);
    }
}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       User::find($id)->delete();
     
       return response()->json(['success'=>'User deleted successfully.']);
    }
}
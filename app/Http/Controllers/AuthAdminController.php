<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Role;
use App\Models\Member;
class AuthAdminController extends Controller
{
    public function loginAdmin()
    {
        return view('loginAdmin');
    }
    public function loginPostAdmin(Request $request)
    {
        $this->validate($request, [
            'userID' => 'required|email',
            'password' => 'required'
        ]);
        $em=db::table('employee')->where('userID',$request->userID)->first();
        //dd($em);
        $credentials = [
            'emailAdmin' => $request->userID,
        ];
        $member = QueryBuilder::for(Member::class)
            ->leftJoin('rank', 'member.rank', '=', 'rank.rankID')
            ->get();
            
        $admin = Admin::where('userID', $credentials['emailAdmin'])->first();
        $admins = DB::table('employee')->where('userID', $request->userID)->first();
        //dd($em);
        
        
        if ($em==null){
            
            return redirect('/loginAdmin')->with('error', 'Invalid password.');
        }
        $role = QueryBuilder::for(Role::class)
                    ->leftJoin('roletype','role.roletypeID','=','roletype.roletypeID')
                    ->where('role.empID','=',$em->employeeID)
                    ->get();
        $memID = $em->employeeID;
        session(['id'=>$memID]);
        //session(['name'=>$member->Name]);
        $value = session()->get("id");
        //dd($value);

        if ($admin === null) {
            //dd($value);
            return redirect('/login')->with('error', 'Invalid member credentials.');
        }

        if ($request->password === $admin->password) {
            //dd($value);
            return view('/StartAdmin', compact('admins','role','member','memID'))->with('success', 'Login berhasil!');

        } else {
           // dd($value);
            return redirect('/loginAdmin')->with('error', 'Invalid password.');
        }
    }
    public function logoutAdmin()
    {
        Auth::logout();
        return redirect()->route('loginAdmin');
    }
}

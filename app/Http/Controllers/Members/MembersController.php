<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Member_type;
use App\Models\Users as User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class MembersController extends Controller
{

    public function store()
    {

        $member = Member::create($this->validateRequest());
        return redirect($member->path());
    }

    public function show()
    {
        $members = Member::all();
        $member_type = Member_type::all();
        return view('Members.members_list', ['members' => $members,'member_type' => $member_type]);
    }

    public function add_member(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'middle_name' => 'required|max:50',
            'email' => 'required|email|unique:users,email|max:100',
            'member_type_id' => 'required',
            //'photo_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $user = User::orderBy('syspk_user', 'desc')->take(1)->first();
        $member_type_id = $this->__get_orig_id( $request->input('member_type_id') );
        $member = Member_type::find( $member_type_id );
        $SysPK_User = $user->syspk_user + 1;

        $file_path = null;
      
        if($request->file('photo_path'))
        {
            $img_file = $request->file('photo_path');
            $dir = 'storage/uploads/profile_picture/';
            //count the number of files in the directory
            $filecount = count(glob($dir . "*")) + 1;
            $file_path = date('m_d_Y_H_i_s').'_profile_'.$filecount.'.'.$img_file->getClientOriginalExtension();
            $full_path = $dir.$file_path;
            $img_file->move($dir, $file_path);

            //create generated username & password
            $username = $request->input('email');
            $pos = strpos($username, '@');//fin the position of @
            $username = substr($username, 0, $pos);//remove starting from @
            //PASSWORD IS YOUR EMAIL WITHOUT @GMAIL ECT. PLUS CURRENT YEAR EX. EMAIL@GMAIL.COM THE PASSOWRD WILL BE EMAIL2019
            $password = password_hash($username.date('Y'), PASSWORD_DEFAULT,  ['option' => 12]);
            $salt = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 8)), 0, 8);

            $user = new User();
            $user->fill([
                'username' => $request->input('email'), 
                'first_name' => strtoupper($request->input('first_name')), 
                'last_name' => strtoupper($request->input('last_name')), 
                'middle_name' => strtoupper($request->input('middle_name')), 
                'email' => $request->input('email'),
                'member_type_id' => $member_type_id,
                'member_type' => strtoupper($member->employee_type),
                'web_password' => $password,
                'salt' => $salt,
                'photo' => $full_path,
                'syspk_user' => $SysPK_User
                ]);

           // dd($user);   
            $user->save(); 
                       
        }  
        
        return redirect('/member-list?new_member_reg='.date('m-d'))->with('success_message', 'New member successfully registered!');    
    }

    public function update(Member $member)
    {
        $member->update($this->validateRequest());
        return redirect($member->path());
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect('/members');
    }

    protected function validateRequest()
    {
        return request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'birth_date' => 'date_format:Y-m-d|before:today|nullable',
            'birth_place' => 'required',
            'age' => 'required',
            //'gender' => 'required|in:male,female' ,
            'civil_status' => '',
            'present_address' => '',
            'landline_no' => '',
            'mobile_no' => '',
            'status' => '',
            'category' => '',
        ]);
    }
}
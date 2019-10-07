<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;

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

        return view('Members.members_list', ['members' => $members]);
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
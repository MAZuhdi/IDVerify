<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{

    /**
     * Check availability of member
     *
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        $validateData = $request->validate([
            'idnumber' => 'required|max:10',
        ]);
        $member = Member::find($request['idnumber']);
        if ($member) {
            // dd('found');
            return view('verify.found', compact('member'));
        }
        if (!$member) {
            // dd($request['idnumber'].' is not found');
            return view( 'verify.notfound', ['idnumber' => $request['idnumber']]);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::get();
        return view('member.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::get();

        $positions = Position::select('name')->get();
        // $positions = DB::table('positions')
        //     ->select('name')
        //     ->get();
        // $data = [$members, $positions];
        return view('member.form-create-member', compact('positions', 'members'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'idnumber' => 'required|max:10|unique:members', // tambahin unique
            // 'photo' => 'required|file|image|mimes:jpeg,png,jpg|max:5120',
            'name' => 'required|max:50',
            'callname' => 'max:30',
            'phone' => 'required',
            'position' => 'required',
            'validity' => 'required',
        ]);
        // if ($files = $request->file('photo')) {
        //     $destinationPath = 'image/photos/'; // upload path
        //     $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        //     $validateData['photo'] = $destinationPath."".$profileImage;
        //     $files->move($destinationPath, $profileImage);
        // }
        Member::create($validateData);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $member = Member::find($member);
        return view('member.form-edit-member', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $validateData = $request->validate([
            'idnumber' => 'required|max:10|unique:members', // tambahin unique
            // 'photo' => 'required|file|image|mimes:jpeg,png,jpg|max:5120',
            'name' => 'required|max:50',
            'callname' => 'max:30',
            'phone' => 'integer',
            'position' => 'required',
            'validity' => 'required',
        ]);
        // if ($files = $request->file('photo')) {
        //     $destinationPath = 'image/photos/'; // upload path
        //     $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        //     $validateData['photo'] = $destinationPath."".$profileImage;
        //     $files->move($destinationPath, $profileImage);
        // }
        Member::where('idnumber', $member->idnumber)->update($validateData);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->back();
    }
}

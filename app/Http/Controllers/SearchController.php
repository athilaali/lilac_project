<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Designation;
use App\Models\Department;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function search(Request $request)
    {

    $Searchengine_results=[];
    $Search_Users = User::where('Name', 'like', $request->search_text.'%')->get();
    $Designation_results = Designation::where('Name', 'like', $request->search_text.'%')->get();
    $Department_results = Department::where('Name', 'like', $request->search_text.'%')->get();

    foreach($Search_Users as $Search_User)
    {
    array_push($Searchengine_results,$Search_User);
    }

    foreach ($Designation_results as $Designation_result)
    {
        foreach($Designation_result->Users as $User)
        {
            if(! $this->UserExist($Searchengine_results,$User->id))
            {
                array_push($Searchengine_results,$User);
            }
        }
    }

    foreach ($Department_results as $Department_result)
    {
        foreach($Department_result->Users as $User)
        {
            if(! $this->UserExist($Searchengine_results,$User->id))
            {
                array_push($Searchengine_results,$User);
            }
        }
    }

    asort($Searchengine_results);
    return view("search", compact('Searchengine_results'));
}


private function UserExist($Users,$UserID)
{
    foreach($Users as $User)
    {
        if($User->id==$UserID)
        {
            return true;
        }
    }
    return false;
}
}



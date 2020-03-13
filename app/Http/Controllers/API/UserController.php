<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\User;
use App\Rating;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\UserResource;
use App\Http\Resources\RatingResource;
use App\Http\Resources\UserCollection;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return $this->sendRequest(new UserCollection($user),"All Users are in view");
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
        $userDetail = User::find($id);
        if(is_null( $userDetail)){
            return $this->notFoundError();
        }
        $param = [
            "user" => $userDetail,
            "type" => 'getType1'
        ];
        return $this->sendRequest(new UserResource(  $param ),"User Information is in view");
    }
    public function getUserBook($id){
        $userDetail = User::find($id);
        $cc =  $userDetail->ratings;
        $userBooks = [];
        foreach( $cc as $bb){
            $userBooks[] = $bb->book;
        }
        return $this->sendRequest( $userBooks,"All user's books list are in view");
    }
    public function getUserBookDetail($id,$book_id){
        $rated = Rating::where('user_id',$id)->where('book_id',$book_id)->first();
        $detailUserBook = $rated->book;
       return $this->sendRequest( $detailUserBook,"All user's books list are in view");
    }
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
}

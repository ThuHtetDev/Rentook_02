<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\BookResource;
use App\Http\Resources\BookResourceCollection;
use App\Book;
use Validator;

class BookController extends BaseController
{
    public function index()
    {
        $book = Book::all();
        return $this->sendRequest(new BookResourceCollection($book),"All books are in view");
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required'
        ]);
        if($validator->fails()){
            return $this->errorRequest('Validation Error.', $validator->errors());       
        }
        // $validation = $this->apiValidation($request->all(),[
        //     'name' => 'required',
        //     'description' => 'required'
        // ]);
        // if($validation instanceof Response){
        //     return $validation;
        // }
        $bookStore = Book::create($request->all());
        return $this->sendRequest($bookStore,"New Book is successfully added in view");
    }
    public function show($id)
    {
        $bookDetail = Book::find($id);
        if(is_null( $bookDetail)){
            return $this->notFoundError();
        }
        return $this->sendRequest(new BookResource($bookDetail),"Detail Book is in view");
    }

    public function update(Request $request, $id)
    {
        $bookEdit = Book::find($id);
        if(is_null( $bookEdit)){
            return $this->notFoundError();
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required'
        ]);
        if($validator->fails()){
        
            return $this->errorRequest('Validation Error.', $validator->errors());    
        }
        $bookEdit->name = $request['name'];
        $bookEdit->description = $request['description'];
        $bookEdit->save();

        return $this->sendRequest($bookEdit,"Book is successfully edited in view");
    }
    public function destroy($id)
    {
        $bookDelete = Book::find($id);
        $bookDelete->delete();
        return $this->giveMsg("Selected Book is successfully deleted in view",202);
    }
    public function validated(){

    }
}

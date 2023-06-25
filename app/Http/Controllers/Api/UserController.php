<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressStoreRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\AddressResource;
use App\Http\Resources\UserResource;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = UserResource::collection(User::all());
        dd($user);
       // return response()->json(User::get(), 200);
    }

    public static function show($id){

        return new UserResource(User::with('address')->findOrFail($id));
    }
    public function addresses($id){
        $addresses = Address::where('user_id','=', $id)->get();
        return AddressResource::collection($addresses);
    }

    public function store(UserStoreRequest $request){
       // $users_created = User::create($request->validated());
        $users_created = User::create($request->validated());
        return new UserResource($users_created);
    }
    /*public function storeAddressUser(AddressStoreRequest $request, $id){

        $address_created = Address::where('user_id','=',$id)->create($request->validated());
        return new AddressResource($address_created);
    }*/
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return new UserResource($user);
    }
    public function destroy( User $user)
    {
       $user->delete();
        return response()->json('', 204);

    }
}

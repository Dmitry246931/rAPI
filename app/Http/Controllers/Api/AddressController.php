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
use Illuminate\Support\Facades\DB;


class AddressController extends Controller
{
    public function index(User $user)
    {
        //dd($user);
        //return DB::table('address')->where('user_id', '=', $user->id)->get();
        //return AddressResource::collection(DB::table('addresses')->where('user_id', '=', $user->id)->get());
    }

    public function show($id)
    {
        //
    }

    public function store(AddressStoreRequest $request, User $user )
    {

        $address_created = Address::create($request->validated())->where('user_id','=',$user->id);
        return new AddressResource($address_created);
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(Request $request, User $user)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostUserRequest;
use App\Http\Requests\UpdatePostUserRequest;
use App\Models\PostUser;

class PostUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post=PostUser::all();
        return response()->json($post);
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
     * @param  \App\Http\Requests\StorePostUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostUser  $postUser
     * @return \Illuminate\Http\Response
     */
    public function show(PostUser $postUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostUser  $postUser
     * @return \Illuminate\Http\Response
     */
    public function edit(PostUser $postUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostUserRequest  $request
     * @param  \App\Models\PostUser  $postUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostUserRequest $request, PostUser $postUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostUser  $postUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostUser $postUser)
    {
        //
    }
}

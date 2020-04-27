<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Http\Resources\Chat as ChatResource;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $chats = Chat::all();

        return ChatResource::collection($chats);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Chat::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Chat::where("users", (int)$id)->get();
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
        $chat = Chat::findOrFail((int)$id);
        $chat->push('messages', array(
            "senderID" => $request->get('userID'),
            "msg" => $request->get('newMessage')
        ));
        $chat->save();
        return $chat;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Chat::findOrFail((int)$id);
        return $user->delete();
    }
}

<?php

namespace App\Http\Controllers\Backend\Room;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRoomRequest;
use App\Models\Admin;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listroom = Room::sortable()->orderby('id', 'desc')->paginate(15);
        return view('pages.rooms.list', compact('listroom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoomRequest $request)
    {
        $room = new Room();

        $room->fill($request->all());

        $room->save();

        return redirect()->route('rooms.index')->with(['message'=>'Tạo mới phòng ban thành công!']);
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
        $room = Room::find($id);
        return view('pages.rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateRoomRequest $request, $id)
    {
        Room::find($id)->update([
            'room_name'=>$request->room_name,
            'history'=>$request->history,
            'mission'=>$request->mission,
            'achievement'=>$request->achievement,
        ]);

        return redirect()->route('rooms.index')->with(['message'=>'Cập nhật phòng ban thành công!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::find($id);
        $account_admin = Admin::where('room_id', $room->id)->get();

        foreach($account_admin as $item){
            Admin::where('id', $item->id)->update(['room_id'=>001]);
        }

       $room->delete();

        return redirect()->route('rooms.index')->with(['message'=>'Xóa phòng ban thành công!']);
    }


    // search
    public function search (){
        $key = $_GET['key'];

        $search_text = trim($key);

        try {
            if($search_text == null){
             return redirect()->route('rooms.index');
            }else {
            $listroom=Room::where('id','LIKE', '%'.$search_text.'%')
            ->orwhere('room_name','LIKE', '%'.$search_text.'%')
            ->orwhere('history','LIKE', '%'.$search_text.'%')
            ->orwhere('mission','LIKE', '%'.$search_text.'%')
            ->orwhere('achievement','LIKE', '%'.$search_text.'%')
            ->paginate(15);
        }

        return view('pages.rooms.list', compact('listroom'));
        } catch (\Throwable $th) {
            return $th;
        }
    }
}

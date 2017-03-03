<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = User::paginate(2);
        return view('backend.users.index')->with(['items'=>$items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //dd($request->all());
        $input = $request->only([
            'name', 'email', 'address','gender','avatar','birthday','password'
        ]);
        $input['role'] = 1;
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            //getting timestamp
            $timestamp = time();

            $name = $timestamp . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/photo/', $name);
            $input['avatar'] = $name;
        }
        User::create($input);

        return redirect()->route('admin.index')
            ->with('success', 'Product create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = User::find($id);
        //dd($item);
        return view('backend.users.show')->with(['item'=>$item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item= User::find($id);
        return view('backend.users.edit')->with(['item'=>$item]);
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
        $item = User::find($id);
        $item->name = $request->name;
        $item->email = $request->email;
        $item->address = $request->address;
        $item->gender = $request->gender;
        $item->avatar = $request->avatar;
        $item->birthday = $request->birthday;
        if ($request->hasFile('avatar')) {

            $file = $request->file('avatar');
            //getting timestamp
            $timestamp = time();

            $name = $timestamp . '.' . $file->getClientOriginalExtension();

            $file->move(public_path() . '/avatar/', $name);
            $item->avatar = $name;
        }
        $item->save();
        return redirect()->route('admin.index')
            ->with('success', 'User update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item= User::find($id);
        $item->delete();
        return redirect()->route('admin.index')
            ->with('success','User deleted');
    }
}

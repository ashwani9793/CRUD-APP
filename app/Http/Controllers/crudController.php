<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\CrudModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;

class crudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showdata(Request $request)
    {
        $search = $request['search'] ?? ""; //To get value what you have search and check that box null or not

        if ($search != '') {

            // $items = CrudModel::where('name', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%")->get();
            $users = CrudModel::where('name', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%")->count();
            $items = CrudModel::where('name', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%")->paginate($users);

        } else {
            // $items = CrudModel::all(); // Retrieve all items from the database
            $items = CrudModel::paginate(5);  // Retrieve all items from the database with paginate
            $users = CrudModel::count(); // Retrieve all users count from database 
        }
        return view('showUsers', compact('items', 'search'), ['Users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            // 'password' => 'required|confirmed',
            // 'password_confirmation' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',

        ]);
        $password = $request->password;

        $password = Hash::make($password);

        $data = new CrudModel();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $password;
        $data->save();
        return redirect()->route('get')
            ->with('created', 'New user created successfully.✔');
        // return  redirect()->back();
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
     * @param  \App\Models\CrudModel  $crudModel
     * @return \Illuminate\Http\Response
     */
    public function show(CrudModel $crudModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CrudModel  $crudModel
     * @return \Illuminate\Http\Response
     */
    public function edit(CrudModel $crudModel, $id)
    {
        $crudModel = CrudModel::find($id);
        return view('edit', ['crudModel' => $crudModel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CrudModel  $crudModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CrudModel $crudModel, $id)
    {

        $crudModel = CrudModel::find($id);
        $password = $request->password;
        $password = Hash::make($password);
        $crudModel->name = $request->name;
        $crudModel->email = $request->email;
        $crudModel->password = $password;
        $crudModel->save();
        return redirect('getdata')->with('updated', "Id no-> {$id} has been updated successfully...");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CrudModel  $crudModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CrudModel $crudModel, $id)
    {
        $crudModel = CrudModel::find($id);
        $crudModel->delete();
        return redirect()->back()->with('deleted', "Record id-> {$id} moved to 'Trash' successfully.");
    }

    // update status using AJAX
    public function changeStatus(Request $request)
    {
        $status = $request->status;
        $id = $request->userId;
        $crudModel = CrudModel::find($id);
        $crudModel->status = $status;
        $crudModel->save();
        return response()->json(['success' => 'Status changed successfully']);
    }

    // login method
    public function authenticate(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $email = $credentials['email'];
            return view('home', ['email' => $email]);
        }

        return redirect()->back()->with('error', 'Invalid email or password. Retry🤦‍♂️');
    }


    public function logout()
    {
        // Log the user out
        Auth::logout();

        // Clear all session data
        session()->flush();
        return redirect('/login')->with('logOutMassage', 'You have been logged out.😕');
    }

    public function trash()
    {
        $items = CrudModel::onlyTrashed()->get();
        $data = compact('items');
        return view('trashData')->with($data);
    }

    public function restore($id)
    {
        $crudModel = CrudModel::withTrashed()->find($id);
        if (!is_null($crudModel)) {
            $crudModel->restore();
            return redirect('getdata');
        }
    }
    public function forceDelete($id)
    {
        $user = CrudModel::withTrashed()->find($id);
        $user->forceDelete();
        return redirect('trashData');
    }
}

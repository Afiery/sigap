<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $data['admins'] = User::all();

        return view('admin.index', $data);
    }

    public function store(Request $request)
    {
        $userIdByEmail = $this->findUserIdByEmail($request->email);
        if($userIdByEmail) return redirect()->back()->with('ERR','Email sudah digunakan');
        User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->back()->with('OK','Admin baru berhasil ditambahkan');
    }

    public function detailJson(Request $request)
    {
        $data['admin'] = User::find($request->id);

        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $userIdByEmail = $this->findUserIdByEmail($request->email);
        if($userIdByEmail && $userIdByEmail != $id) return redirect()->back()->with('ERR','Email sudah digunakan');
        $user->update([
            'email' => $request->email,
            'name' => $request->name,
        ]);

        if ($request->password) {
            $user->update([
                'password' => bcrypt($request->password)
            ]);
        }

        return redirect()->back()->with('OK','Berhasil update admin');
    }

    private function findUserIdByEmail($email)
    {
        $userId = null;
        $user = User::where('email',$email)->first();
        if($user) $userId = $user->id;

        return $userId;
    }
    
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('ERR','Admin tidak ditemukan!');
        }

        $user->delete();

        return redirect()->back()->with('OK','Berhasil hapus admin');
    }
}

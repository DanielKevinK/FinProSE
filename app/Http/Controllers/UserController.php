<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if ($validator->fails()) {
            return back()->withErrors([
                'email' => 'Invalid credentials.',
            ]);
        }

        $user = User::create([
            'role' => $request->role ? $request->role : 'user',
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if ($user) {
            $token = $user->createToken('auth_token')->plainTextToken;

            return redirect()->intended('/')->with('token', $token);
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    public function registerInvestor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if ($validator->fails()) {
            return back()->withErrors([
                'email' => 'Invalid credentials.',
            ]);
        }

        $user = User::create([
            'role' => 'investor',
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if ($user) {
            $token = $user->createToken('auth_token')->plainTextToken;

            $investments = new Investment();
            $investments->product_id = $request->product_id;
            $investments->investor_id = $user->id;
            $investments->invest_quantity = $request->invest_quantity;
            $investments->commission = 0;
            $investments->save();

            return redirect()->intended('/')->with('token', $token);
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = User::where('email', $request['email'])->firstOrFail();
            $token = $user->createToken('auth_token')->plainTextToken;
            
            return redirect()->intended('/')->with('token', $token);
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    public function loginApi(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request['email'])->firstOrFail();
            $token = $user->createToken('auth_token')->plainTextToken;
            
            return response()->json([
                'message' => 'Success',
                'token' => $token
            ], 200);
        }
    }

    // method for user logout and delete token
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return redirect()->intended('/');
        // return [
        //     'message' => 'You have successfully logged out and the token was successfully deleted'
        // ];
    }

    public function index()
    {
        $users = User::paginate(10);

        return view('/admin/user', compact('users'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role' => 'required|in:user,admin',
            'username' => 'required|string|max:255',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        try {
            DB::beginTransaction();

            $user = User::create([
                'role' => $request->role,
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            if ($user) {
                DB::commit();

                return redirect()->back()->with('successAdd', 'User Berhasil Ditambahkan!');
            }
        } catch (\Throwable $th) {
            DB::rollBack();

            throw $th;
        }
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $user = User::find($id);

            if ($user) {
                $user->name = $request->name ? $request->name : $user->name;
                $user->role = $request->role ? $request->role : $user->role;
                $user->email = $request->email ? $request->email : $user->email;
                $user->username = $request->username ? $request->username : $user->username;
                $user->password = $request->password ? Hash::make($request->password) : $user->password;
                $user->save();

                if ($user) {
                    DB::commit();

                    return redirect()->back()->with('successEdit', 'User Berhasil Diupdate!');
                }
            }
        } catch (\Throwable $th) {
            DB::rollBack();

            throw $th;
        }
    }

    public function delete($id)
    {
        $auth = auth()->user();
        $user = User::find($id);
        if ($auth->role == 'admin') {
            if ($auth->id == $id) {
                return redirect()->back()->with('failed', 'Tidak Bisa Hapus User Login!');
            } else {
                if ($user) {
                    $user->delete();
    
                    return redirect()->back()->with('success', 'User Berhasil Dihapus!');
                } else {
                    return redirect()->back()->with('failed', 'User Tidak Ditemukan!');
                }
            }
        } else {
            return redirect()->back()->with('failed', 'Anda Bukan Admin!');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnum;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return redirect()->back()->with('message', 'Email atau Password salah');
    }

    public function signup(Request $request)
    {
        return view('signup');
    }

    public function store(SignupRequest $request)
    {
        DB::beginTransaction();

        try {
            $md5Ktp = md5($request->ktp_number);

            $cvFn = $request->file('cv')->getClientOriginalName();
            $cv = $request->file('cv')->storeAs("public/cv/{$md5Ktp}", $cvFn);

            $documentFn = $request->file('document')->getClientOriginalName();
            $document = $request->file('document')->storeAs("public/document/{$md5Ktp}", $documentFn);

            $photoFn = $request->file('photo')->getClientOriginalName();
            $photo = $request->file('photo')->storeAs("public/photo/{$md5Ktp}", $photoFn);

            $data = $request->all();
            $data['cv'] = $cv;
            $data['photo'] = $photo;
            $data['document'] = $document;

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role' => UserRoleEnum::KANDIDAT->value,
            ]);

            $user->candidate()->create($data);

            Auth::loginUsingId($user->id);

            DB::commit();

            if ($request->referrer) {
                return redirect($request->referrer);
            } else {
                return redirect()->route('index');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}

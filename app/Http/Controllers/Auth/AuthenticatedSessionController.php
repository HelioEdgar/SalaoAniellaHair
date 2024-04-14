<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }
    

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if ($request->user()->estado == 'inactivo') {
            Auth::logout();
            throw ValidationException::withMessages([
                'inactive' => ['Sua conta está inativa. Entre em contato com o administrador.'],
            ]);
        }

        $url = '';
        if($request->user()->perfil === 'administrador'){
            $url = '/admin/dashboard';
        }elseif($request->user()->perfil === 'funcionario'){
            $url = '/func/dashboard';
        }elseif($request->user()->perfil === 'utilizador'){
            $url = '/salao';
        }

        $notification = array(
            'message' => 'Login Efecutado com Sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->intended($url)->with($notification);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

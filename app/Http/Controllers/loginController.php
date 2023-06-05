<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
 
class loginController extends Controller
{
    public function view_login(){
        return view('viewRegistro_Login.login');
    }
    public function view_register(){
        return view('viewRegistro_Login.registro_usuario');
    }
    public function view_registarAdmin(){
        return view('viewRegistro_Login.registro_admin');
    }
    public function cadastro_usuario(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'data_nascimento'=>'required',
            'endereco'=>'required',
            'cpf'=>'required',
        ],[
            'name.required'=>'Usuário é obrigatório',
            'email.required'=>'E-mail é obrigatório',
            'password.required'=>'Senha é obrigatório'
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password' => Hash::make($request->password),
            'imagem_user'=>$request->file('imagem_user')->store('fotos_user'),
            'admin'=>0,
            'client'=>1,
            'data_nascimento'=>$request->data_nascimento,
            'endereco'=>$request->endereco,
            'cpf'=>$request->cpf
        ]);
        return redirect('/login')->with('success','Conta criada com sucesso!');
    }
    public function cadastro_admin(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'data_nascimento'=>'required',
            'endereco'=>'required',
            'cpf'=>'required'
        ],[
            'name.required'=>'Usuário é obrigatório',
            'email.required'=>'E-mail é obrigatório',
            'password.required'=>'Senha é obrigatório'
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password' => Hash::make($request->password),
            'imagem_user'=>$request->file('imagem_user')->store('fotos_user'),
            'admin'=>1,
            'client'=>0,
            'data_nascimento'=>$request->data_nascimento,
            'endereco'=>$request->endereco,
            'cpf'=>$request->cpf
        ]);
        return redirect('/produtos_page')->with('success','Conta criada com sucesso!');
    }
    public function logout(){
            Auth::logout();
            return redirect('/login');
        }
    public function auth(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'E-mail é obrigatório',
            'password.required'=>'Senha é obrigatório',
        ]);
         if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('viewProdutos');
         }
         else{
            return redirect()->back()->with('danger','E-mail ou senha inválida');
         }
    }
    public function authTabelas(){
        if (Auth::check()) {
            // o usuário está autenticado, exibe a página desejada
            return view('viewTabelas.tabelas');
        } else {
            // o usuário não está autenticado, redireciona para a tela de login
            return redirect('/login')->with('invalido','Precisa estar logado para continuar.');
        }
    }
}

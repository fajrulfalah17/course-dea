<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login_form()
    {
        return view('login');
    }

    public function login_action(Request $request)
    {
        // $hashed_password = Hash::check();
        $users = User::where('username', $request->username)->first();

        if ($users == null) 
        {
            return redirect()->back()->with('error', 'Username tidak ditemukan');
        }

        $db_password = $users->password;
        $hashed_password = Hash::check($request->password, $db_password);

        if($hashed_password) {
            $users->token = Str::random(20);
            $users->save();
            $request->session()->put('token', $users->token);

            return to_route('dashboard_index');
        } else {
            return redirect()->back()->with('error', 'Data yang anda masukkan salah');
        }
    }

    public function register()
    {
        return view('register');
    }

    public function register_action(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:users|min:5',
            'password'  => 'required'
        ]);

        $register = User::create([
            'username'  => $request->input('username'),
            'password'  => bcrypt($request->input('password'))
        ]);

        // dd($register);

        $db_password = $register->password;
        $hashed_password = Hash::check($request->password, $db_password);

        if($hashed_password) {
            $register->token = Str::random(20);
            $register->save();
            $request->session()->put('token', $register->token);

            Alert::success('Sukses', 'Register Berhasil!');
            return redirect()->route('login_form');
        }
        else {
            Alert::error('Gagal', 'Register Gagal!');
            return redirect()->route('register');
        }
    }

    public function dashboard_index()
    {
        if (Session::has('token')) {
            $users = User::where('token', Session::get('token'))->first();
            $articles = Article::paginate(8);
            return view('dashboard.index', [
                'title'     => 'DASHBOARD ADMIN',
                'users'     => $users,
                'articles'  => $articles
            ]);
        }
        else {
            return redirect()->back();
        }
    }

    public function dashboard_logout(Request $request)
    {
        User::where('token', $request->token)->update([
            'token' => NULL,
        ]);

        Session::pull('token');

        return to_route('login_form');
    }
    
    public function article_delete_action(Request $request)
    {
        Article::find($request->id)->delete();
        Alert::success('Sukses', 'Artikel Berhasil Dihapus!');
        return redirect()->back();
    }

    public function article_add_action(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description'   => 'required',
            'tag'   => 'required'
        ]);

        $article = Article::create([
            'title' => $request->input('title'),
            'description'   => $request->input('description'),
            'tag'   => $request->input('tag')
        ]);

        $article->save();

        if($article) {
            Alert::success('Sukses', 'Artikel berhasil dibuat');
            return redirect()->back();
        }
        else {
            Alert::success('Sukses', 'Artikel Gagal dibuat');
            return redirect()->back();
        }
    }

    public function article_edit_action($id)
    {
        $article = Article::findOrFail($id);
        return view('dashboard.edit', [
            'article' => $article
        ]);
    }

    public function article_update_action(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $this->validate($request, [
            'title' => 'required',
            'description'   => 'required',
            'tag'   => 'required' 
        ]);
        
        $article->update([
            'title' => $request->input('title'),
            'description'   => $request->input('description'),
            'tag'   => $request->input('tag')
        ]);

        if($article)
        {
            Alert::success('Sukses', 'Artikel berhasil diupdate!');
            return redirect()->route('dashboard_index');
        }
        else {
            Alert::success('Sukses', 'Artikel gagal diupdate!');
            return redirect()->route('dashboard_index');
        }
    }
}

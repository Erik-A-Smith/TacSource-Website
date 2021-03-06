<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// Model inclusions
use App\Admin;
use App\User;
use App\AuditLog;
use URL;

class AdminController extends Controller
{
    public function index()
    {
      if(Auth::user()->isAdmin()){
        return view('Admin.index');
      }
    }

    public function promotion()
    {
      if(Auth::user()->isAdmin()){
        $users = User::all();
        return view('Admin.promotion',compact("users"));
      }
    }

    public function audit()
    {
      if(Auth::user()->isAdmin()){
        $auditLogs = AuditLog::orderBy("created_at", "desc")->get();
        $baseUrl = URL::to("/");
        return view('Admin.audit',compact("auditLogs","baseUrl"));
      }
    }

}

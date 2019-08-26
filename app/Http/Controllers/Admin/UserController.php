<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\BaseController;

class UserController extends BaseController
{
    public function __construct()
    {
        $this->model = User::class;
        $this->prefix = "admin.user";
        $this->routePath="users.index";
    }

}

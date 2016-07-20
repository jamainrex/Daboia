<?php
namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('welcome');
    }
}
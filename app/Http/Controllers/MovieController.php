<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public $movies;

    public function __construct()
    {
        for ($i = 0; $i < 10; $i++) {
            $this->movies[] = [
                'title' => 'movie controller ' . $i,
                'genre' => 'Comedy',
                'year' => '2021'
            ];
        }
    }

    public function index()
    {
        return $this->movies;
    }
}

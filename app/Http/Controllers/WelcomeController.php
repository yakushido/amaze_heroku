<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Gender;
use App\Models\Genre;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Part;
use App\Models\Campaign;
use App\Models\PartDetail;

class WelcomeController extends Controller
{
    public function index()
    {
        $genders = Gender::all();
        $campaigns = Campaign::orderBy('created_at', 'DESC')->get();
        $today = date("Y-m-d H:i:s");
        $users = User::all();
        return view('welcome', compact(
            'genders',
            'campaigns',
            'today',
            'users'
        ));
    }

    public function show($id)
    {
        $menus = Menu::where('gender_id', $id)
            ->join('categories', 'menus.category_id', 'categories.id')
            ->select('categories.genre_id')
            ->groupBy('genre_id')
            ->get();
        
        $genres = Genre::all();
        $gender = Gender::find($id);
        return view('genre', compact(
            'genres',
            'menus',
            'gender'
        ));
    }

    public function menu_show($gender_id, $genre_id)
    {
        $categories = Category::where('genre_id', $genre_id)->get();
        $menus = Menu::where('gender_id', $gender_id)->get();
        $parts = Part::all();
        $gender = Gender::find($gender_id);
        $genre = Genre::find($genre_id);
        $part_details = PartDetail::all();
        return view('menu', compact(
            'categories',
            'parts',
            'gender',
            'menus',
            'genre',
            'part_details'
        ));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;
use App\Models\Order;
use App\Models\Ingredient;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countOrder = Order::count();

        $countPizza = Pizza::count();

        $countIngredient = Ingredient::count();

        return view('admin.dashboard', compact(['countOrder', 'countIngredient', 'countPizza']));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pizzas ()
    {
        return view('admin.pizzas');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ingredients ()
    {
        return view('admin.ingredients');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orders ()
    {
        return view('admin.orders');
    }
}

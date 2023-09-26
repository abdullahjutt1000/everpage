<?php

namespace App\Http\Controllers;

use Database\Seeders\boxdata;
use Illuminate\Http\Request;
use App\Models\profile;
use App\Models\biodata;


class dummyapi extends Controller
{
    // For getting data from database id-wise or all
    //
    // function getdata($id = null)
    // {
    //     return $id ? profile::find($id) : profile::all();


    // }

    // For Inserting data into database

    function add(Request $req)
    {
        $add = new profile;
        $add->name = $req->name;
        $result = $add->save();
        if ($result) {
            return ["result" => "data saved successfully"];
        } else {
            return ["result" => "error occured "];

        }
    }
}
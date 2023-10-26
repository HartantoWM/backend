<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Animalcontroller extends Controller
{
    public $animals= [];
    //method untuk menampilkan data hewan
    public function index()
    {
        echo "menampilkan data hewan <br>";

        foreach($this->animals as $animals) {
            echo "- $animals <br>";
        }
    }
    // method untuk menambahkan data hewan 
    public function store(request $request)
    {
        echo "menambahkan hewan baru <br> ";

        //menambahkan data property animals
        array_push($this->animals, $request->animals);

        //panggil method animals
        $this->index();
    }
    // method untuk mengupdate data  hewan
    public function update($id, request $request) {
        echo "mengupdate data hewan id $id";

        //update data property animal
        $this->animals[$id] = $request->animal;

        //panggil method animals
        $this->index();
    }

    public function destroy($id) {
        echo "menghapus data hewan id $id";

        unset($this->animals[$id]);


        // panggil method index animals
        $this->index();
    }


    

}

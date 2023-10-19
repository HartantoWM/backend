<?php
class Animal
{

    private $animals = [];

    public function __construct()
    {
    }

    public function index()
    {
        print_r($this->animals);
        echo '<br/>';
    }

    public function store($data)
    {
        echo "menambahkan " . $data . "<br>";
        array_push($this->animals, $data);
    }

    public function update(int $index,String $data)
    {
        echo "item index ". $index . " di update menjadi ". $data . '<br/>';
        $this->animals[$index] = $data;
    }

    public function destroy(int $index)
    {
        echo 'item '. $this->animals[$index] . ' di hapus <br/>';
        unset($this->animals[$index]);
    }
}


$animals = new Animal();

$animals->index();

$animals->store('Ayam');
$animals->store('Ikan');

$animals->index();


$animals->update(1, 'paus');

$animals->index();

$animals->destroy(1);
$animals->index();
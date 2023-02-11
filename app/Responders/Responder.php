<?php 

namespace App\Responders;

interface Responder
{

    public function all($data);

    public function addedSuccessfully();

    public function updatedSuccessfully();
    
    public function deletedSuccessfully();
    
    public function get($data);
}
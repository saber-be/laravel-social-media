<?php

namespace App\Repositories\Interfaces;

interface EntityRepository
{
    public function all();
    public function add($data);
    public function update($entity_id, $data);
    public function delete($entity_id);
    public function get($entity_id);
}
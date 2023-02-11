<?php

namespace App\Repositories\Interfaces;

interface PostRepository
{
    public function all();
    public function add($data);
    public function update($post_id, $data);
    public function delete($post_id);
    public function get($post_id);
}
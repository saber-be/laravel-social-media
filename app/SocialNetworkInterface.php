<?php 

namespace App;

interface SocialNetworkInterface {
  public function all();
  public function add($entity);
  public function update($entityId, $entity);
  public function delete($entityId);
  public function view($entityId);
}
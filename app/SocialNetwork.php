<?php

namespace App;
use App\Responders\Responder;
use App\Repositories\Interfaces\EntityRepository;
class SocialNetwork implements SocialNetworkInterface
{

    private $entityRepository;
    private $responder;

    public function __construct(EntityRepository $entityRepository, Responder $responder) {
        $this->entityRepository = $entityRepository;
        $this->responder = $responder;
    }
    public function all() {
        return $this->responder->all($this->entityRepository->all());
    }
    public function add($entity) {
        $this->entityRepository->add($entity);
        return $this->responder->addedSuccessfully();
    }

    public function update($entityId, $entity) {
        $this->entityRepository->update($entityId, $entity);
        return $this->responder->updatedSuccessfully(); 
    }

    public function delete($entityId) {
        $this->entityRepository->delete($entityId);
        return $this->responder->deletedSuccessfully(); 
    }

    public function view($entityId) {
        $entity = $this->entityRepository->get($entityId);
        return $this->responder->get($entity);
    }
   
}
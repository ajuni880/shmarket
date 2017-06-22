<?php
interface EntityInterfaceDAO{

  public function findAll();

  public function add($entity);

  public function delete($entity);

  public function update($entity);

  public function findById($entity);

}

?>

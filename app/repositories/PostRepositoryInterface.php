<?php

interface PostRepositoryInterface {
    public function findById($id);
    public function findAll();
    public function paginate($limit = null);
    public function store($data);
    public function update($id, $data);
    public function destroy($id);
    public function validate($data);
    public function instance($data = array());
}

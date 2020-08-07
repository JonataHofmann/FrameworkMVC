<?php

namespace App\Core;

class Api
{
    protected $model;
    protected $referencedTables;

    function __construct()
    {
        $class = getModel($this->model);
        $this->model = new $class();
    }

    public function get()
    {
        if (!empty($_GET['id'])) {
            $data = $this->model->find($_GET['id'], true);
        } else {
            $data = $this->model->all(true);
        }
        $this->response(200, json_encode($data));
    }

    public function post()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $return = $this->model->create($data);
        $this->response(200, $return);
    }

    public function put()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $updated = $this->model->update($data['id'], $data);
        $this->response(200, $updated);
    }
    public function delete()
    {
        $return = $this->model->destroy($_GET['id']);
        $this->response(200, $return);
    }

    private function response($code = 200, $body)
    {
        header('Content-Type: application/json');
        header(getHttpStatusDescription($code));
        http_response_code($code);
        echo $body;
    }
}

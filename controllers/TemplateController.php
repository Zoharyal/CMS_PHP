<?php

class TemplateController {

    public function display() {
        ConnectionHelper::checkConnectedUser();
        $page = new PageModel();
        $content = $page->getAll();
        echo TemplateHelper::displayTemplate('display', $content);
    }

    public function changeContent() {
        $crud = new CrudModel();
        $content = $crud->update();
    }


}
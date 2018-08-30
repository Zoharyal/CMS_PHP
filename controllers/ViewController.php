<?php


class ViewController 
{
    static public function home() { 
        ConnectionHelper::checkConnectedUser();
        $page = new PageModel();
        $content = $page->getOne('title', 'Home');
        echo TemplateHelper::createTemplate('home', $content);
    }

    static public function contact() {
        $page = new PageModel();
        $content = $page->getOne('title', 'Contact');
        echo TemplateHelper::createTemplate('contact', $page->getOne('title', 'Contact'));
    }
}
?>

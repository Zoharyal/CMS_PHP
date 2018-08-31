<?php


class ViewController 
{
    static public function home() { 
        ConnectionHelper::checkConnectedUser();
        $page = new PageModel();
        $content = $page->getOne('title', 'Home');
        echo TemplateHelper::createTemplate('home', $content);
    }

    static public function simon() { 
        ConnectionHelper::checkConnectedUser();
        $page = new PageModel();
        $content = $page->getOne('title', 'Simon');
        echo TemplateHelper::createTemplate('home', $content);
    }

    static public function test1() { 
        ConnectionHelper::checkConnectedUser();
        $page = new PageModel();
        $content = $page->getOne('title', 'Test1');
        echo TemplateHelper::createTemplate('home', $content);
    }

    static public function contact() {
        $page = new PageModel();
        $content = $page->getOne('title', 'Contact');
        echo TemplateHelper::createTemplate('contact', $page->getOne('title', 'Contact'));
    }
}
?>

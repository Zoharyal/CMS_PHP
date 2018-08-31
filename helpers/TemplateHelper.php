<?php

class TemplateHelper 
{
    const TEMPLATE_DIRECTORY = 'views';

    public static function createTemplate(String $templateName, stdClass $content) {
        $header = file_get_contents(self::TEMPLATE_DIRECTORY . '/layouts/header.html');
        $emptyTemplate = file_get_contents(self::TEMPLATE_DIRECTORY  . '/' . $templateName . '.html');
        $footer = file_get_contents(self::TEMPLATE_DIRECTORY . '/layouts/footer.html');

        $result = $header . $emptyTemplate . $footer;
        foreach($content as $key => $value) {
            if(strpos($result, '%%' .strtoupper($key) . '%%')) {
                $result = str_replace('%%' . strtoupper($key) . '%%', $value, $result);
            }
        }
        return $result;
    }


    public static function displayTemplate(String $templateName, $content) {
        $header = file_get_contents(self::TEMPLATE_DIRECTORY . '/layouts/header.html');
        $emptyTemplate = file_get_contents(self::TEMPLATE_DIRECTORY  . '/' . $templateName . '.html');
        $footer = file_get_contents(self::TEMPLATE_DIRECTORY . '/layouts/footer.html');
        $result = $header . $footer;
        $test = '';
        foreach($content as $key => $value) {
            //   $test .= "<a href=''>" . $value->title . '</a>';
            $tag = array('%%TITLE%%', '%%CONTENT%%');
            $info = array($value->title, $value->content);
            $result .= str_replace($tag, $info, $emptyTemplate);
        } 
        return $result;
    }
}
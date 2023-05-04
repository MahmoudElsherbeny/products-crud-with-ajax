<?php 

namespace App\Core;

class View
{
    //$fileDirectory located in views.
    //$pageTitle to display in the page title.

    public static function display(string $fileDirectory, $page_title = SITE_NAME, array $data = null)
    {
        if($data != null) {
            foreach ($data as $key => $value) {
                ${$key} = $value;
            }
        }
        
        $pageTitle = $page_title;
        $content = APP_ROOT.'/views/'.$fileDirectory;

        include APP_ROOT.'/views/layouts/app.php';
    }
}
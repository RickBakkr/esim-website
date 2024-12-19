<?php

namespace App\View;

use Illuminate\View\FileViewFinder;

class ThemeViewFinder extends FileViewFinder
{
    protected string $theme;

    public function setTheme(string $theme)
    {
        $this->theme = $theme;
    }

    public function find($view)
    {
        $delimiteredView = str_replace('.', DIRECTORY_SEPARATOR, $view);
        $paths = [
            resource_path("views/themes/{$this->theme}/{$delimiteredView}.blade.php"),
            resource_path("views/themes/default/{$delimiteredView}.blade.php"),
        ];

        foreach ($paths as $path) {
            if ($this->files->exists($path)) {
                return $path;
            }
        }

        return parent::find($view);
    }
}

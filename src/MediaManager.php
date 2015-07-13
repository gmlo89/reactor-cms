<?php

namespace Gmlo\CMS;


class MediaManager
{
    protected $namespace = 'media_manager';

    public function __construct()
    {

    }


    public function initializeJs()
    {
        $route = route('CMS::admin.media-manager.index');
        $scripts = "window.{$this->namespace} = {};";
        $scripts .= "window.{$this->namespace}.route = '{$route}';";

        return $scripts;
    }

    public function renderRoutesJS()
    {
        $route = route('CMS::admin.media-manager.assets');
        $upload_route = route('CMS::admin.media-manager.upload');
        $update_route = route('CMS::admin.media-manager.update');
        $destroy_route = route('CMS::admin.media-manager.destroy');
        $finder_route = route('CMS::admin.media-manager.finder');
        $scripts = "window.{$this->namespace} = {};";
        $scripts .= "window.{$this->namespace}.route = '{$route}';";
        $scripts .= "window.{$this->namespace}.upload_route = '{$upload_route}';";
        $scripts .= "window.{$this->namespace}.update_route = '{$update_route}';";
        $scripts .= "window.{$this->namespace}.finder_route = '{$finder_route}';";
        $scripts .= "window.{$this->namespace}.destroy_route = '{$destroy_route}';";

        return $scripts;
    }
}
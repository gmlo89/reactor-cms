<?php

/**
 * Helpers for the CMS
 */


function cms_asset_path($file_name = '')
{
    return \CMS::assetPath($file_name);
}

function cms_body_class()
{
    // Skin
    $class = 'skin-' . config('cms.template_skin');

    // layout options
    $class .= ' ' . implode(' ', config('cms.template_layout_options'));
    return $class;
}
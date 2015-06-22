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


function getUserTypesList()
{
    $user_types = config('cms.user_types');
    $result = [];

    foreach($user_types as $type)
    {
        if(\Lang::has('CMS::core.user_types.' . $type))
        {
            $result[$type] = trans('CMS::core.user_types.' . $type);
        }
        else
        {
            $result[$type] = ucwords($type);
        }
    }

    return $result;
}
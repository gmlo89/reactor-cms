<?php

namespace Gmlo\CMS;

use Collective\Html\FormBuilder as Form;
use Illuminate\View\Factory as View;
use Illuminate\Session\Store as Session;

class FieldBuilder {

    protected $form;
    protected $view;
    protected $session;

    // For delete button
    protected $delete_button = [
        'entity'    => null,
        'id'        => null,
        'route'     => null,
    ];

    protected $defaultClass = [
        'default' => 'form-control',
        'checkbox' => '',
        'file' => ''
    ];

    public function __construct(Form $form, View $view, Session $session)
    {
        $this->form = $form;
        $this->view = $view;
        $this->session = $session;
    }

    public function getDefaultClass($type)
    {
        if (isset ($this->defaultClass[$type]))
        {
            return $this->defaultClass[$type];
        }

        return $this->defaultClass['default'];
    }

    public function buildCssClasses($type, &$attributes)
    {
        $defaultClasses = $this->getDefaultClass($type);

        if (isset ($attributes['class']))
        {
            $attributes['class'] .= ' ' . $defaultClasses;
        }
        else
        {
            $attributes['class'] = $defaultClasses;
        }
    }

    public function buildLabel($name, $attributes = null)
    {
        if(isset($attributes['label']))
        {
            return $attributes['label'];
        }
        if (\Lang::has('validation.attributes.' . $name))
        {
            $label = \Lang::get('validation.attributes.' . $name);
        }
        else
        {
            $label = str_replace('_', ' ', $name);
        }

        return ucfirst($label);
    }

    public function buildControl($type, $name, $value = null, $attributes = array(), $options = array())
    {
        if(ends_with($type, 'Group'))
        {
            $attributes['placeholder'] = $this->buildLabel($name);
        }
        $type_aux = str_replace('Group', '', $type);
        switch ($type_aux)
        {
            case 'select':
                if(!isset($attributes['no-instructions']) or !$attributes['no-instructions'])
                {
                    if(is_a($options, 'Illuminate\Support\Collection'))
                    {
                        $options = $options->toArray();
                    }
                    $options = array('' => trans('CMS::core.select')) + $options;
                    //
                }
                return $this->form->select($name, $options, $value, $attributes);
            case 'password':
                return $this->form->password($name, $attributes);
            case 'checkbox':

                return $this->form->checkbox($name, $value, isset($attributes['checked']), $attributes);
            case 'textarea':
                return $this->form->textarea($name, $value, $attributes);
            case 'date':
                $attributes['data-mask'] = '';
                return $this->form->input('text', $name, $value, $attributes);
            case 'daterange':
                return $this->form->input('text', $name, $value, $attributes);
            default:
                return $this->form->input($type, $name, $value, $attributes);
        }
    }

    public function buildError($name)
    {
        $error = null;
        if ($this->session->has('errors'))
        {
            $errors = $this->session->get('errors');

            if ($errors->has($name))
            {
                $error = $errors->first($name);
            }
        }
        return $error;
    }

    public function buildTemplate($type)
    {
        if(ends_with($type, 'Group'))
        {
            return 'CMS::components/fields/input_group';
        }
        else if ( \File::exists( __DIR__ . '/views/components/fields/' . $type . '.blade.php' ) )
        {

            return 'CMS::components/fields/' . $type;
        }

        return 'CMS::components/fields/default';
    }

    public function input($type, $name, $value = null, $attributes = array(), $options = array())
    {
        $this->buildCssClasses($type, $attributes);
        $icon = '';
        if(isset($attributes['icon']))
        {

            $icon = $attributes['icon'];

        }

        $label = $this->buildLabel($name, $attributes);
        $control = $this->buildControl($type, $name, $value, $attributes, $options);
        $error = $this->buildError($name);
        $template = $this->buildTemplate($type);

        return $this->view->make($template, compact ('name', 'label', 'control', 'error', 'icon'));
    }

    public function password($name, $attributes = array())
    {
        return $this->input('password', $name, null, $attributes);
    }

    public function select($name, $options, $value = null, $attributes = array())
    {
        return $this->input('select', $name, $value, $attributes, $options);
    }

    public function selectYesNo($name, $value = null, $attributes = array())
    {
        $options = [ 'SI' => 'Si', 'NO' => 'No'];
        return $this->input('select', $name, $value, $attributes, $options);
    }
    public function selectRange($name, $min = 0, $max = 10, $value = null, $attributes = array())
    {
        $options = [];
        for($i = $min; $i <= $max; $i++)
        {
            $options[$i] = $i;
        }
        return $this->input('select', $name, $value, $attributes, $options);
    }

    public function __call($method, $params)
    {
        array_unshift($params, $method);
        return call_user_func_array([$this, 'input'], $params);
    }

    public function deleteButton($entity, $route = null)
    {
        $view = $this->makeDeleteButton($entity, $route);
        $view .= $this->renderDeleteButtonDialogs();
        return $view;
    }

    public function makeDeleteButton($entity, $route = null)
    {
        $this->delete_button = [
            'id'    => 'deleteButton' . ucwords(str_random()),
            'route' => $route,
            'entity' => $entity
        ];
        return $this->view->make('CMS::components.fields.delete-button', $this->delete_button)->render();
    }

    public function renderDeleteButtonDialogs()
    {
        extract($this->delete_button);

        if($route === null)
        {
            $entity_class = get_class($entity);
            $entity_class = class_basename($entity_class);

            $entity_route = strtolower($entity_class);
            $entity_route = str_plural($entity_route);

            $route = 'CMS::admin.' . $entity_route . '.destroy';

        }

        return $this->view->make('CMS::components.fields.dialog-delete-button', compact('id', 'entity', 'route'))->render();
    }
}
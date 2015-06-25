<?php

namespace Gmlo\CMS;

use Illuminate\View\Factory as View;
use Illuminate\Session\Store as Session;

class Alert {

    protected $session_name = 'alertMessages';
    protected $template     = 'CMS::components.alerts.default';

    protected $session;
    protected $view;

    public function __construct(View $view, Session $session)
    {
        $this->session  = $session;
        $this->view     = $view;
    }

    public function message($message, $type='success')
    {
        $message = trans($message);
        $messages = $this->session->get($this->session_name, array());
        if(is_object($message) and get_class($message) == 'Illuminate\Support\MessageBag')
        {
            $messages[] = ['message' => array_values($message->all()), 'type' => $type];
        }
        else
        {
            $messages[] = compact('message', 'type');
        }
        $this->session->flash($this->session_name, $messages);
    }

    public function render()
    {
        $messages   = $this->session->get($this->session_name, null);
        $html       = '';
        if ($messages != null)
        {
            $this->session->flash($this->session_name, null);
            foreach ($messages as $message) {
                $html.= Alert::make($message['message'], $message['type']);
            }
        }

        return $html;
    }




    /**
     * Get a bootstrap alert
     *
     * @param string $message Message to show
     * @param string $type Alert type (For example, if you want a "alert-danger", you need put only "danger")
     * @param bool $close Define if you want a close button
     *
     * @return string Html string with the element
     */
    public function make($message, $type='success')
    {

        $message_html = '';
        if(!is_array($message))
        {
            $message_html = '<p>'.trans($message).'</p>';
        }
        else
        {
            foreach ($message as $msg) {
                $message_html .='<p>'.trans($msg).'</p>';
            }
        }

        return $this->view->make($this->template)
            ->with('type',      $type)
            ->with('message',   $message_html);
    }

}
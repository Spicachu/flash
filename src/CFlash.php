<?php

namespace Anax\Flash;
 
/**
 * Class for Flashmessages.
 *
 */
class CFlash
{

    protected $message; // keeps flash message string
    
    
    /**
     * Contructor for flash message
     * 
     */
    public function __construct()
    {
    }

    /**
     * flash message (without default class)
     * @param string $msg message to flash
     */
    public function message($msg, $class = null)
    {
        // combine msg and class into html
        $html = "<div class='" . $class . "'>" . $msg . "</div>";
        
        // save html 
        $this->save($html);

        // return html
        return $html;
    }

    
    
    /**
     * Error flash message
     * @param string $msg message to flash
     * @param string optional replacementclass to append to message
     * @return string
     */
    public function error($msg, $class = "flash-error")
    {        
        // pass parameters on to message method
        $html = $this->message($msg, $class);
        // return result
        return $html;
    }

    /**
     * Success flash message
     * @param string $msg message to flash
     * @param string optional replacementclass to append to message
     * @return string
     */
    public function success($msg, $class = "flash-success")
    {
        // pass parameters on to message method
        $html = $this->message($msg, $class);
        // return result
        return $html;
    }


    /**
     * notice flash message
     * @param string $msg message to flash
     */
    public function notice($msg, $class = "flash-notice")
    {
        // pass parameters on to message method
        $html = $this->message($msg, $class);
        // return result
        return $html;
    }

    /**
     * output flash message
     */
    public function output()
    {
        return $this->message;
    }

    /**
     * saving to message property
     * @param string $msg string to save
     */
    protected function save($msg)
    {
        // concatenate msg with existing messages
        $this->message .= $msg;
    }
}
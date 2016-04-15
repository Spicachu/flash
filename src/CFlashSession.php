<?php

namespace Anax\Flash;

/**
 * Class for Flashmessages supporting messages saved in session
 *
 */
class CFlashSession extends CFlash implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;
        
    /**
     * constant used as name for sessionvariable  
     */
    const SESSION_VARIABLE = 'flashmessage';

    /**
     * flush message variable from session
     */
    public function flush()
    {
        $this->session->set(self::SESSION_VARIABLE, null);
    }
    
    /**
     * output flash message from session
     */
    public function output()
    {
        if ($this->session->has(self::SESSION_VARIABLE)) {
            return $this->session->get(self::SESSION_VARIABLE);
        }
    }

    /**
     * saving message to session
     * @param string $msg message to save
     */
    protected function save($msg)
    {
        // append not overwrite
        if ($this->session->has(self::SESSION_VARIABLE)) {
            $msg = $this->session->get(self::SESSION_VARIABLE) . $msg;
        }
        
        $this->session->set(self::SESSION_VARIABLE, $msg);
    }
    
}
<?php

namespace Talal\LabelPrinter\Command;

class AutoCut implements CommandInterface
{
    /**
     * Brother ESC/P Command Reference
     * 
     * https://download.brother.com/welcome/docp000706/cv_ql720_eng_escp_100.pdf
     * 
     * Advanced commands -> Specify cutting
     * 
     * ASCII:   ESC    i    C    n
     * 
     * Specifies cutting after printing.
     * 
     *     n = 1 or 49 ("1"): Specifies cutting.
     *     n = 0 or 48 ("0"): Cancels cutting.
     * 
     */
    const ENABLED  = 49;
    const DISABLED = 48;
    
    /**
     * state
     *
     * @var int
     */
    protected $state;
    
    /**
     * __construct
     *
     * @param  int $state
     */
    public function __construct($state)
    {
        $this->state = $state;
    }
     
    /**
     * @inheritdoc
     */
    public function read()
    {
        return chr(27) . 'iC' . chr($this->state);
    }
}

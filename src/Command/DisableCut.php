<?php

namespace Talal\LabelPrinter\Command;

class DisableCut implements CommandInterface
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

     
    /**
     * @inheritdoc
     */
    public function read()
    {
        return chr(27) . 'iC' . chr(48);
    }
}

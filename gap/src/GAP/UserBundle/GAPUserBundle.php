<?php

namespace GAP\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class GAPUserBundle extends Bundle {

    public function getParent() {
        
        return 'FOSUserBundle';
    }

}

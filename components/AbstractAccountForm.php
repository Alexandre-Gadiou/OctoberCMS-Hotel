<?php

namespace Algad\Hotel\Components;

use RainLab\User\Components\Account as RAccount;

abstract class AbstractAccountForm extends RAccount
{

    public function getRedirectTo()
    {
        $url = $this->property('redirect_to');
        $redirect_to = '';
        if ($url != null && $url != '')
        {
            $redirect_to = 'data-request-data="redirect:' . "'" . $url . "'" . '"';
        }
        return $redirect_to;
    }

}

?>

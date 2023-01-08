<?php

namespace Interface\Biller;

use Interface\Biller\BillerInterface;

class JkoPay implements BillerInterface
{
    public function bill($account_id, $amount)
    {
        // 實做利用jko pay的方法
    }
}

?>
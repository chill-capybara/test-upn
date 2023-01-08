<?php

namespace Interface\Biller;

use Interface\Biller\BillerInterface;

class LinePay implements BillerInterface
{
    public function bill($account_id, $amount)
    {
        // 實做利用line pay的方法
    }
}

?>
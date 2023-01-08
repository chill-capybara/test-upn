<?php

namespace Interface\Biller;

interface BillerInterface
{
    public function bill($account_id, $amount);
}
?>
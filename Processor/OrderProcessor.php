<?php

namespace Processor;

use Interface\BillerInterface;

class OrderProcessor {
 
    public function __construct(BillerInterface $biller)
    {
        $this->biller = $biller;
    }

    /**
     * 建立訂單
     * @param $order App\Models\Order
     * @return mixed
     */
    public function process(Order $order)
    {
        // 取得5分鐘內, 同一用戶建立的訂單數量
        $recent = $this->getRecentOrderCount($order, 5);

        if ($recent > 0)
        {
            throw new Exception('Duplicate order likely.');
        }

        $this->biller->bill($order->account->id, $order->amount);
        $createOrderStatus = $this->createOrder($order);
        if (createOrderStatus !== true) {
            throw new Exception('Create order fail');
        }

        return true;
    }

    /**
     * 取得N分鐘內, 同一用戶建立的訂單數量
     * @param $order App\Models\Order
     * @param $minutes
     * @return int
     */
    protected function getRecentOrderCount(Order $order, $minutes)
    {
        return DB::table('orders')
            ->where('account', $order->account->id)
            ->where('created_at', '>=', $this->beforeMinute($minutes))
            ->count();
    }

    /**
     * 建立訂單資料
     * @param $order App\Models\Order
     * @return mixed
     */
    protected function createOrder(Order $order)
    {
        return \DB::table('orders')->insert([
            'account'    => $order->account->id,
            'amount'     => $order->amount;
            'created_at' => Carbon::now();
        ]);
    }

    /**
     * 取得相較當下時間, N分鐘前的時間
     * @param $minutes int 分鐘
     * @return int
     */
    protected function beforeMinute($minutes)
    {
        return Carbon::now()->subMinutes($minutes)->timestamp;
    }

}
?>
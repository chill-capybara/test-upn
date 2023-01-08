<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Processor\OrderProcessor;
use Interface\Biller\LinePay;

class OrderProcessorTest extends TestCase
{

    public function testGetRecentOrderCount()
    {
        assertEquals int
    }

    public function testCreateOrderSuccess()
    {
        assertEquals boolean
    }

    public function testBeforeMinute()
    {
        assertEquals int & timestamp format
    }

    public function testProcessSuccess()
    {
        assertEquals boolean
    }

    public function testProcessFail()
    {
        使用try catch 接錯, 並符合Exception帶入的code做預期錯誤測試
    }
}
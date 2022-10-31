<?php

namespace Codilar\Gtask\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Emp extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('empdata', 'id');
    }
}

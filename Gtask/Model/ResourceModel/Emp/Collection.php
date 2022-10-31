<?php
namespace Codilar\Gtask\Model\ResourceModel\Emp;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Codilar\Gtask\Model\Emp as Model;
use Codilar\Gtask\Model\ResourceModel\Emp as ResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}

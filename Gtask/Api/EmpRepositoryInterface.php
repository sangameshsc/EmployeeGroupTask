<?php
namespace Codilar\Gtask\Api;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Codilar\Gtask\Api\Data\EmpInterface;
use Magento\Framework\Api\SearchCriteriaInterface;


interface EmpRepositoryInterface
{

    public function save(EmpInterface $empdata);

    public function getList(SearchCriteriaInterface $criteria);

    public function delete(EmpInterface $id);

    public function deleteById($id);


    // public function getById($id);


}

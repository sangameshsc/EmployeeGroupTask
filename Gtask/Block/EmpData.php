<?php
namespace Codilar\Gtask\Block;


use Magento\Framework\View\Element\Template;
use Codilar\Gtask\Model\ResourceModel\Emp\CollectionFactory as ViewCollectionFactory;
use Codilar\Gtask\Model\EmpFactory  as ModelFactory;
use Magento\Framework\Api\SearchCriteriaInterface;


class EmpData extends Template
{

    private $_collection;
    private $_fetch;
    protected $_dataHelper;

    public function __construct(
        Template\Context                          $context,
        ViewCollectionFactory                     $collection,
        ModelFactory                              $modelFactory,
        \Codilar\Gtask\Model\EmpRepository $modelRepository,
        \Codilar\Gtask\Helper\Data  $dataHelper,
      
        array                                       $data = []
    )
    {
        parent::__construct($context, $data);
        $this->_collection = $collection;
        $this->modelFactory = $modelFactory;
        $this->_fetch = $modelRepository;
        $this->_dataHelper = $dataHelper;
     
    }

    public function getCollection()
    {

        $viewCollection = $this->_collection->create();
        $viewCollection->addFieldToSelect('*')->load();
        return $viewCollection->getItems();
    }


    public function fetchData()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $searchCriteriaBuilder = $objectManager->create('Magento\Framework\Api\SearchCriteriaBuilder');
        $searchCriteria = $searchCriteriaBuilder->addFilter('id','%%','like')->create();
        $list = $this->_fetch->getList($searchCriteria);
        return $list->getItems();
    }

    public function getAddPostUrl() {

        return $this->getUrl('Gtask/index/savedata');
    }
    public function canShowBlock()
    {
        return $this->_dataHelper->isModuleEnabled();
    }


}

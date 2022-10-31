<?php
namespace Codilar\Gtask\Controller\Adminhtml\Emp;

class Index extends \Magento\Backend\App\Action
{
    
    protected $_resultPageFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) 
    {
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
    }

   
    public function execute()
    {
        $resultPage = $this->_resultPageFactory->create();
        return $resultPage;
    }

   
}
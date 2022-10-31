<?php

namespace Codilar\Gtask\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Customer\Model\Session;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_resultPageFactory;
    protected $_customerSession;

    public function __construct(Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory,Session $customerSession)
    {
        $this->_customerSession = $customerSession;
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
      
            $resultPage = $this->_resultPageFactory->create();
            return $resultPage;
        
    }
}

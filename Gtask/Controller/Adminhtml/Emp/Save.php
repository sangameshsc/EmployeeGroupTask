<?php
/**
 * Emp Admin Cagegory Map Record Save Controller.
 * @category  Webkul
 * @package   Webkul_Emp
 * @author    Webkul
 * @copyright Copyright (c) 2010-2017 Webkul Software Private Limited (https://webkul.com)
 * @license   https://store.webkul.com/license.html
 */
namespace Codilar\Gtask\Controller\Adminhtml\Emp;
class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Webkul\Emp\Model\EmpFactory
     */
    var $EmpFactory;
    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Webkul\Emp\Model\EmpFactory $EmpFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Codilar\Gtask\Model\EmpFactory $EmpFactory
    ) {
        parent::__construct($context);
        $this->EmpFactory = $EmpFactory;
    }
    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getParams();
        if (!$data) {
            $this->_redirect('emp/emp/addrow');
            return;
        }
        try {
            $rowData = $this->EmpFactory->create();
            $rowData->setData($data);
            if (isset($data['id'])) {
                $rowData->setEntityId($data['id']);
            }
            $rowData->save();
            $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('emp/emp/index');
    }
    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Codilar_Gtask::save');
    }
}
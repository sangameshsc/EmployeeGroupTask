<?php
namespace Codilar\Gtask\Controller\Index;



    use Magento\Framework\App\Action\Action;
    use Magento\Framework\App\Action\Context;
    use Magento\Framework\Exception\CouldNotSaveException;
    use Magento\Framework\Exception\LocalizedException;
    use Magento\Framework\Exception\NoSuchEntityException;
    use Magento\Framework\View\Result\PageFactory;
    use Magento\Framework\Api\SearchCriteriaInterface;

    use Codilar\Gtask\Api\EmpRepositoryInterface;
    use Codilar\Gtask\Api\Data\EmpInterface;

    class Savedata extends Action

    {
        protected $_pageFactory;

        protected $_EmpRepository;
        protected $_EmpModel;


        public function __construct(
            Context                 $context,
            PageFactory             $pageFactory,
            EmpRepositoryInterface $EmpRepository,
            EmpInterface           $EmpInterface

        ) {
            $this->_pageFactory = $pageFactory;
            $this->_EmpRepository=$EmpRepository;
            $this->_EmpModel = $EmpInterface;
            return parent::__construct($context);
        }

        public function execute()
        {
            $data = $this->getRequest()->getParams();

            $firstname = $data['firstname'];
            $lastname = $data['lastname'];
            $email = $data['email'];
            $phone = $data['phone'];


            $EmpModel = $this->_EmpModel;
            $EmpModel->setFirstname($firstname);
            $EmpModel->setLastname($lastname);
            $EmpModel->setEmail($email);
            $EmpModel->setPhone($phone);
            try {
                       $this->_EmpRepository->save($EmpModel);
                        $this->messageManager->addSuccessMessage("your data is stored");
                    
                } catch (CouldNotSaveException $e) {
                    $this->messageManager->addErrorMessage(__("Error saving data"));
                }

            $redirect = $this->resultRedirectFactory->create();
            $redirect->setPath('Gtask');
            return $redirect;

        }
    }

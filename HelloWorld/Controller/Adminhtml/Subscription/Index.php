<?php
namespace AHT\HelloWorld\Controller\Adminhtml\Subscription;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;

        /**
     * Contact constructor.
     *
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
   	 Context $context,
   	 PageFactory $resultPageFactory
    ) {
   	 parent::__construct($context);
   	 $this->resultPageFactory = $resultPageFactory;
    }

     /**
     * Index action.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('AHT_HelloWorld::subscription');
        $resultPage->addBreadcrumb(__('HelloWorld'), __('HelloWorld'));
        $resultPage->addBreadcrumb(__('Manage Subscriptions'), __('Manage Subscriptions'));
        $resultPage->getConfig()->getTitle()->prepend(__('Subscriptions'));
        return $resultPage;
    }
   	 
    protected function _isAllowed()
    {
   	 return $this->_authorization->isAllowed('AHT_HelloWorld::subscription');
    }
}
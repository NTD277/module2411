<?php
namespace AHT\Question\Block\Product;

class FormQuestion extends \Magento\Framework\View\Element\Template
{
    private $_registry;
    private $_customerSession;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Customer\Model\Session $customerSession,
        array $data = []
    ) {
        $this->_registry = $registry;
        $this->_customerSession = $customerSession;
        parent::__construct($context, $data);
    }

    public function getCustomerSession()
    {
        // var_dump($this->_customerSession->isLoggedIn());die;
        return $this->_customerSession;
    }

    public function getCurrentProduct()
    {
        return $this->_registry->registry('current_product');
    }

}

<?php 

namespace AHT\HelloWorld\Model\ResourceModel; 

class Subscription extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb { 

    public function __construct(\Magento\Framework\Model\ResourceModel\Db\Context $context)
    {
        parent::__construct($context);
    }
    
    public function _construct() { 

   	 $this->_init('AHT_helloworld_subscription', 'subscription_id'); 

    } 

} 
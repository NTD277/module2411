<?php
namespace AHT\Portfolio\Model;


// class Portfolio extends AbstractModel implements IdentityInterface
class Portfolio extends \Magento\Framework\Model\AbstractModel {
    const CACHE_TAG = 'aht_portfolio_post';

    protected $_cacheTag = 'aht_portfolio_post';

    protected $_eventPrefix = 'aht_portfolio_post';
    
    public function __construct(
   	 \Magento\Framework\Model\Context $context,
   	 \Magento\Framework\Registry $registry,
   	 \Magento\Framework\Model\ResourceModel\AbstractResource $resource =
   	 null,
   	 \Magento\Framework\Data\Collection\AbstractDb $resourceCollection =
   	 null,
   	 array $data = []
    ) {
   	 parent::__construct($context, $registry, $resource,$resourceCollection, $data);
    }
    public function _construct() {
		$this->_init('AHT\Portfolio\Model\ResourceModel\Portfolio');
    }    
}
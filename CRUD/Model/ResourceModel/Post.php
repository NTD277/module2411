<?php
namespace AHT\CRUD\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Post extends AbstractDb
{
    public function __construct(\Magento\Framework\Model\ResourceModel\Db\Context $context)
    {
        parent::__construct($context);
    }

    public function _construct()
    {
        $this->_init('post', 'post_id');
    }
    
}
<?php

namespace AHT\Portfolio\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeData implements UpgradeDataInterface
{
	protected $_postFactory;	
	protected $_cateFactory;



	public function __construct(\AHT\Portfolio\Model\PortfolioFactory $postFactory, \AHT\Portfolio\Model\CategoryFactory $cateFactory)
	{
		$this->_postFactory = $postFactory;
		$this->_cateFactory = $cateFactory;
	}

	public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		if (version_compare($context->getVersion(), '1.0.6', '<')) {
			$data = [
				'title' => "It is Test Upgrade Data", 
				'images' => "test.jpg Upgrade Data",
				'description'      => "t is Test's description Upgrade Data"
			];
			$post = $this->_postFactory->create();
			$post->addData($data)->save();
		}

		if (version_compare($context->getVersion(), '1.0.7', '<')) {
			$data = [
				'title' => "It is Test Upgrade Data", 
				'images' => "test.jpg Upgrade Data",
				'description'      => "t is Test's description Upgrade Data",
				'test' => "test"
			];
			$post = $this->_postFactory->create();
			$post->addData($data)->save();
		}

		if (version_compare($context->getVersion(), '1.0.9', '<')) {
            $setup->getConnection()->update(
                $setup->getTable('aht_portfolio'),
                [
                    'description' => 'Default description'
                ],
                $setup->getConnection()->quoteInto('id = ?', 2)
            );
        }
		
		if (version_compare($context->getVersion(), '1.0.10', '<')) {
			$data = [
				'name' => "name 10.",
			];
			$post = $this->_cateFactory->create();
			$post->addData($data)->save();
		}
	}
}
<?php
namespace AHT\AttributeCustomerDemoo\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Model\Config;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory, Config $eavConfig)
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavConfig       = $eavConfig;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        $eavSetup->removeAttribute(\Magento\Customer\Model\Customer::ENTITY, 'phone_contact');
        $eavSetup->addAttribute(
            \Magento\Customer\Model\Customer::ENTITY,
            'phone_contact',
            [
                'type' => 'varchar',
                'backend' => '',
                'frontend' => '',
                'label' => 'Phone',
                'input' => 'text',
                'class' => '',
                'source' => '',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => 'simple',
                'position'     => 1002,
                'system'       => 0,
            ]
        );

        $customerAttr = $this->eavConfig->getAttribute(\Magento\Customer\Model\Customer::ENTITY, 'phone_contact');
        $customerAttr->setData(
            'used_in_forms', [
                'adminhtml_customer', 'checkout_register', 'customer_account_create', 'customer_account_edit', 'adminhtml_checkout'
            ]);
        $customerAttr->save();
        
        $setup->endSetup();
    }
}
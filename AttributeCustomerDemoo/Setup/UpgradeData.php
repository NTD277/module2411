<?php
namespace AHT\AttributeCustomerDemoo\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Model\Config;

class UpgradeData implements UpgradeDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory, Config $eavConfig)
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavConfig       = $eavConfig;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if ($context->getVersion() && version_compare($context->getVersion(), '1.0.7') < 0) {

            $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
    
            $attributes = [
                'organization_name' => [
                    'type' => 'text',
                    'backend' => '',
                    'frontend' => '',
                    'label' => 'Organization Name',
                    'input' => 'text',
                    'class' => '',
                    'source' => '',
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'default' => '0 ',
                    'searchable' => false,
                    'filterable' => false,
                    'comparable' => false,
                    'visible_on_front' => false,
                    'used_in_product_listing' => true,
                    'unique' => false,
                    'apply_to' => 'simple',
                    'position'     => 2002,
                    'system'       => 0,
                ],
                'phone_contact'=>
                [
                    'type' => 'varchar',
                    'backend' => '',
                    'frontend' => '',
                    'label' => 'Phone Contact',
                    'input' => 'text',
                    'class' => '',
                    'source' => '',
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'default' => '0',
                    'searchable' => false,
                    'filterable' => false,
                    'comparable' => false,
                    'visible_on_front' => false,
                    'used_in_product_listing' => true,
                    'unique' => false,
                    'apply_to' => 'simple',
                    'position'     => 1999,
                    'system'       => 0,
                ],
                'company_type' => [
                    'type' => 'int',
                    'backend' => '',
                    'frontend' => '',
                    'label' => 'Company type',
                    'input' => 'select',
                    'class' => '',
                    'source' => 'AHT\AttributeCustomerDemoo\Model\Source\CompanyTypeSelect',
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'default' => '0',
                    'searchable' => false,
                    'filterable' => false,
                    'comparable' => false,
                    'visible_on_front' => false,
                    'used_in_product_listing' => true,
                    'unique' => false,
                    'apply_to' => 'simple',
                    'position'     => 2001,
                    'system'       => 0,
                ]
            ];

            foreach ($attributes as $key => $value) {
                $eavSetup->removeAttribute(\Magento\Customer\Model\Customer::ENTITY, $key);
                $eavSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY, $key, $value);
                $customerAttr = $this->eavConfig->getAttribute(\Magento\Customer\Model\Customer::ENTITY, $key);
                $customerAttr->setData(
                    'used_in_forms',
                    ['adminhtml_customer', 'checkout_register', 'customer_account_create', 'customer_account_edit', 'adminhtml_checkout']
                );
                $customerAttr->save();
            }
        }
        $setup->endSetup();
    }
}
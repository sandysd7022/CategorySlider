<?php
/**
 * @category  CategorySlider
 * @package   SD_CategorySlider
 * @author    SD
 */

namespace SD\CategorySlider\Setup;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
  
class UpgradeData implements UpgradeDataInterface
{
    private $eavSetupFactory;
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if ($context->getVersion() && version_compare($context->getVersion(), '1.0.1') < 0) {
   
            $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
   
            $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'subcategory_slider',
            [
                'type' => 'int',
                'label' => 'SubCategory Slider',
                'input' => 'boolean',
                'source'   => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
                'required' => false,
                'sort_order' => 10,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'wysiwyg_enabled' => true,
                'default' => 0,
                'group' => 'General Information'
            ]
        );
        } 
        $setup->endSetup();
    }
}
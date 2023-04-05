<?php
/**
 * @category  CategorySlider
 * @package   SD_CategorySlider
 * @author    SD
 */
namespace SD\CategorySlider\Block;


class CurrentCate extends \Magento\Framework\View\Element\Template
{
        protected $_registry;
        protected $categoryData;
        
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,        
        \Magento\Framework\Registry $registry,
        \Magento\Catalog\Model\Category $categoryData,
        array $data = []
    )
    {        
        $this->_registry = $registry;
        $this->categoryData = $categoryData;
        parent::__construct($context, $data);
    }
    
    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }
    public function getMainCategory()
    {        
         return $this->_registry->registry('current_category');
    }  

    public function getCurrentCategory()
    {        
         $category = $this->_registry->registry('current_category');

         return $category->getChildrenCategories();
    }  
    
    public function categoryDetail() 
    {
    	return $this->categoryData;
    }
}
?>
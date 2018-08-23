<?php
/**
 * Created by PhpStorm.
 * User: CSTAR-R
 * Date: 8/21/2018
 * Time: 4:17 PM
 */
namespace Starmage\FeaturedCategories\Block;
class FeaturedCategories extends \Magento\Framework\View\Element\Template
{

    protected $_categoryCollectionFactory;
    protected $_categoryHelper;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollectionFactory,
        \Magento\Catalog\Helper\Category $categoryHelper,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $data = []
    )
    {
        $this->_categoryCollectionFactory = $categoryCollectionFactory;
        $this->_categoryHelper = $categoryHelper;
        $this->_storeManager = $storeManager;
        parent::__construct($context, $data);
    }

    public function getCategories(){

        $collection = $this->_categoryCollectionFactory->create();
        $collection->addAttributeToSelect('*')
            ->addAttributeToFilter('show_in_homepage','1')
            ->setStore($this->_storeManager->getStore());
        return  $collection;
    }
}
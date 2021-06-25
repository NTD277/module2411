<?php
namespace AHT\Question\Ui\Component\Listing;

use Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider;

class CustomDataProvider extends DataProvider
{
    protected $_collectionFactory;
    protected $_answerCollection;
    protected $_coreRegistry;
    protected $loadedData;

    public function __construct(
        \AHT\Question\Model\ResourceModel\Answer\CollectionFactory $collectionFactory,
        \Magento\Framework\Registry $coreRegistry
    )
    {
        $this->_collectionFactory = $collectionFactory;
        $this->_coreRegistry = $coreRegistry;
    }

    public function getData()
    {
        $id = $this->_coreRegistry->registry('question_id');
        $this->_answerCollection = $this->_collectionFactory->create();
        $this->_answerCollection
            ->addFieldToFilter('question_id', $id);
        $this->_answerCollection->getSelect();
        $items = $this->_answerCollection->getItems();
        foreach ($items as $item) {

        }
        return $this->_answerCollection;
    }
}

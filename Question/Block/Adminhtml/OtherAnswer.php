<?php
namespace AHT\Question\Block\Adminhtml;

class OtherAnswer extends \Magento\Backend\Block\Widget\Grid\Extended
{
    /**
     * @var \Magento\Framework\Module\Manager
     */
    protected $moduleManager;

    protected $itemFactory;

    protected $answerFactory;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \Magento\Framework\Module\Manager $moduleManager
     * @param array $data
     *
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Magento\Sales\Model\Order\ItemFactory $itemFactory,
        \Magento\Framework\Module\Manager $moduleManager,
        \AHT\Question\Model\AnswerFactory $answerFactory,
        array $data = []
    ) {
        $this->itemFactory = $itemFactory;
        $this->moduleManager = $moduleManager;
        $this->answerFactory = $answerFactory;
        parent::__construct($context, $backendHelper, $data);
    }

    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('answerGrid');
        $this->setDefaultSort('created_at');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(false);
        $this->setVarNameFilter('grid_record');
    }

    /**
     * @return $this
     */
    protected function _prepareCollection()
    {
        //You can select your custom data here
        $collection = $this->answerFactory->create()->getCollection();

        $this->setCollection($collection);

        parent::_prepareCollection();

        return $this;
    }

    /**
     * @return $this
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
         'user_name',
         [
             'header' => __('Username'),
             'index' => 'user_name',
         ]
        );
        $this->addColumn(
         'answer_content',
         [
             'header' => __('Answer'),
             'index' => 'answer_content',
         ]
        );
        $block = $this->getLayout()->getBlock('grid.bottom.links');
        if ($block) {
            $this->setChild('grid.bottom.links', $block);
        }

        return parent::_prepareColumns();
    }        
}

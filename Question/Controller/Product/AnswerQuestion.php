<?php
namespace AHT\Question\Controller\Product;

class AnswerQuestion extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;
    protected $_answerFactory;
    protected $_answerResource;
    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
       \Magento\Framework\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory,
       \AHT\Question\Model\AnswerFactory $answerFactory,
       \AHT\Question\Model\ResourceModel\Answer $answerResource
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_answerResource = $answerResource;
        $this->_answerFactory = $answerFactory;
        return parent::__construct($context);
    }
    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $answer = $this->_answerFactory->create();
        if(isset($_POST['question_id'])) {
            $answer->setQuestionId($this->getRequest()->getParam('question_id'));
            $answer->setAnswerContent($this->getRequest()->getParam('answer'));
            $answer->setUserName($this->getRequest()->getParam('user_name'));
            $this->_answerResource->save($answer);
            echo json_encode($answer->getData());
        }
    }
}

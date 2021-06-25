<?php
namespace AHT\Question\Model;

class Answer extends \Magento\Framework\Model\AbstractModel
{
    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('AHT\Question\Model\ResourceModel\Answer');
    }

    public function getAnswerId()
    {
        return $this->getData("answer_id");
    }

    public function setAnswerId($answerId)
    {
        return $this->setData("answer_id", $answerId);
    }

    public function getQuestionId()
    {
        return $this->getData("question_id");
    }

    public function setQuestionId($questionId)
    {
        return $this->setData("question_id", $questionId);
    }

    public function getAnswer()
    {
        return $this->getData("answer_customer");
    }

    public function setAnswer($answer)
    {
        return $this->setData("answer_customer", $answer);
    }

    public function getUserName()
    {
        return $this->getData("user_name");
    }

    public function setUserName($userName)
    {
        return $this->setData("user_name", $userName);
    }

    public function getCreatedAt()
    {
        return $this->getData("created_at");
    }

    public function getUpdatedAt()
    {
        return $this->getData("updated_at");
    }

    public function setCreatedAt($created_at)
    {
        return $this->setData("created_at", $created_at);
    }

    public function setUpdatedAt($updated_at)
    {
        return $this->setData("updated_at", $updated_at);
    }
}

<?php

namespace AHT\CRUD\Controller\Index;
 
use Magento\Framework\App\Filesystem\DirectoryList;

class Save extends \Magento\Framework\App\Action\Action
{
     protected $_pageFactory;
     protected $_postFactory;
     protected $_filesystem;
     protected $_cacheTypeList;
     protected $_cacheFrontendPool;
     protected $_saveFactory;
     protected $_request;
     protected $_coreRegistry;
     protected $_coreSession;

     public function __construct(
          \Magento\Framework\App\Action\Context $context,
          \Magento\Framework\View\Result\PageFactory $pageFactory,
          \AHT\CRUD\Model\PostFactory $postFactory,
          \Magento\Framework\Filesystem $filesystem,
          \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList,
          \Magento\Framework\App\Cache\Frontend\Pool $cacheFrontendPool,
          \AHT\CRUD\Model\ResourceModel\PostFactory $saveFactory,
          \Magento\Framework\App\Request\Http $request,
          \Magento\Framework\Registry $coreRegistry,
          \Magento\Framework\Session\SessionManagerInterface $coreSession
          )
     {
          $this->_pageFactory = $pageFactory;
          $this->_postFactory = $postFactory;
          $this->_filesystem = $filesystem;
          $this->_cacheTypeList = $cacheTypeList;
          $this->_cacheFrontendPool = $cacheFrontendPool;
          $this->_saveFactory = $saveFactory;
          $this->_request = $request;
          $this->_coreRegistry = $coreRegistry;
          $this->_coreSession = $coreSession;
          return parent::__construct($context);
     }
 
     public function execute()
     {
          if ($this->getRequest()->isPost()) {
               $input = $this->getRequest()->getPostValue();
               $post = $this->_postFactory->create();
     
               $postResource = $this->_saveFactory->create();
               // save session for editing
               $id = $this->_coreSession->getId();
               $this->_coreSession->unsId();

               if(isset($id)){
                    // $post->load($input[$paramId]);
                    $postResource->load($post, $id);
                   
               }
               $post->setData($input);
               $post->setId($id);
               $postResource->save($post);
               // try {
               //      echo"456";
               //      // $post->setData($input)->save();
                    
               // } catch (\Exception $e) {
               //      echo "123";
               //      var_dump($e->getMessage());
               // }
               
               // die;
               // $post->setData($input)->save();


               // if(isset($input['edit'])){
                    
               //      $post->setData($input);
               //      var_dump($post->getData());
               //      die;
               //      $post->setId($input['post_id']);
               //      $post->save();
               // }else{
               //      $post->setData($input)->save();
               // }
               $types = array('config','layout','block_html','collections','reflection','db_ddl','eav','config_integration','config_integration_api','full_page','translate','config_webservice');
               foreach ($types as $type) {
                    $this->_cacheTypeList->cleanType($type);
               }
               foreach ($this->_cacheFrontendPool as $cacheFrontend) {
                    $cacheFrontend->getBackend()->clean();
               }
               return $this->_redirect('crud/index/index');
          }
     }
}
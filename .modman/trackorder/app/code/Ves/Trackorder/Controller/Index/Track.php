<?php
/**
 * Venustheme
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the Venustheme.com license that is
 * available through the world-wide-web at this URL:
 * http://www.venustheme.com/license-agreement.html
 * 
 * DISCLAIMER
 * 
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 * 
 * @category   Venustheme
 * @package    Ves_Trackorder
 * @copyright  Copyright (c) 2014 Venustheme (http://www.venustheme.com/)
 * @license    http://www.venustheme.com/LICENSE-1.0.html
 */

namespace Ves\Trackorder\Controller\Index;

use Magento\Customer\Controller\AccountInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Track extends \Magento\Framework\App\Action\Action {

     /**
     * @var \Magento\Framework\App\RequestInterface
     */
     protected $_request;

    /**
     * @var \Magento\Framework\App\ResponseInterface
     */
    protected $_response;

    /**
     * @var \Magento\Framework\Controller\Result\RedirectFactory
     */
    protected $resultRedirectFactory;

    /**
     * @var \Magento\Framework\Controller\ResultFactory
     */
    protected $resultFactory;

    /**
     * @var \Ves\Trackorder\Helper\Data
     */
    protected $_trackorderHelper;

    /**
     * @var \Magento\Sales\Model\Order
     */
    protected $_orderModel;

    /**
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    /**
     * @var \Magento\Framework\Controller\Result\ForwardFactory
     */
    protected $resultForwardFactory;

    protected $_layout;

    /**
     * @param Context                                             $context              
     * @param \Magento\Store\Model\StoreManager                   $storeManager         
     * @param \Magento\Framework\View\Result\PageFactory          $resultPageFactory    
     * @param \Ves\Trackorder\Helper\Data                              $trackorderHelper
     * @param \Magento\Sales\Model\Order                              $order     
     * @param \Magento\Framework\Registry                              $registry           
     * @param \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory 
     */
    public function __construct(
        Context $context,
        \Magento\Store\Model\StoreManager $storeManager,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Ves\Trackorder\Helper\Data $trackorderHelper,
        \Magento\Sales\Model\Order $order,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\View\LayoutInterface $layout,
        \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory
        ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_trackorderHelper = $trackorderHelper;
        $this->resultForwardFactory = $resultForwardFactory;
        $this->_orderModel = $order;
        $this->_coreRegistry = $registry;
        $this->_layout = $layout;
        parent::__construct($context);
    }

    public function initOrder($data = array()) {
        if ($data) {
            $orderId = $data["order_id"];
            $email = $data["email_address"];
            $order = $this->_orderModel->loadByIncrementId($orderId);

            $cEmail = $order->getCustomerEmail();
            if ($cEmail == trim($email)) {
                $this->_coreRegistry->register('current_order', $order);
            } else {
                $this->_coreRegistry->register('current_order', $this->_orderModel);
            }
        }
    }

    /**
     * Default customer account page
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        if(!$this->_trackorderHelper->getConfig('trackorder_general/enabled')){
            return $this->resultForwardFactory->create()->forward('noroute');
        }
        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $post = $this->getRequest()->getPost();
        if ($post) {
            try {
                $this->initOrder($post);
                $order = $this->_coreRegistry->registry('current_order');
                if ($order->getId()) {
                    $this->_view->loadLayout();
                    $html = $this->_layout->getBlock('order.details')->toHtml();
                    $this->messageManager->addSuccess(__('We found a order detail #').$post['order_id']);
                    $this->getResponse()->setBody($html);
                    return;
                } else {
                    $customMessage = $this->_trackorderHelper->getConfig('trackorder_general/custom_message');
                    if($customMessage){
                        $this->messageManager->addError($customMessage);
                    } else {
                        $this->messageManager->addError(__('Order Not Found. Please try again later'));
                    }
                    $this->getResponse()->setBody($this->_layout->getMessagesBlock()->getGroupedHtml());
                    return;
                }
            } catch (\Exception $e) {
                die($e->getMessage());
                $this->messageManager->addError(
                    __('Please Enter Order Detail.')
                    );
                $this->getResponse()->setBody($this->_layout->getMessagesBlock()->getGroupedHtml());
                return;
            }
        } else {
            $this->_redirect('*/*/');
        }
        $page = $this->resultPageFactory->create();
        return $page;
    }
}

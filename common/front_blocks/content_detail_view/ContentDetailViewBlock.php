<?php

/**
 * Class for render Content Detail View
 * 
 * 
 * @author Tuan Nguyen <nganhtuan63@gmail.com>
 * @version 1.0
 * @package common.front_blocks.content_detail_view
 */

class ContentDetailViewBlock extends CWidget
{
    
    //Do not delete these attr block, page and errors
    public $id='content_detail_view';
    public $block=null;     
    public $errors=array();
    public $page=null;
    public $layout_asset='';    
    
   
    
    
    
    public function setParams($params){
	   return;
    }
    
    public function run()
    {        
            $this->renderContent();
    }       
 
 
    protected function renderContent()
    {
		if(isset($this->block) && ($this->block!=null)){	    
	            //Set Params from Block Params
	            $params=unserialize($this->block->params);
		    	$this->setParams($params);     			
				$post_id=(int)$_GET['id'];				
				if($post_id){
					$post=Object::model()->findByPk($post_id);
					if($post){						
						$this->render(BlockRenderWidget::setRenderOutput($this),array('post'=>$post));	
					} else {
						throw new CHttpException('404',t('Page not found'));
					}
				} else {
					throw new CHttpException('404',t('Page not found'));	
				}
				
				                    
	            
		} else {
		    echo '';
		}
       
    }
    
    public function validate(){
		return true;
    }
    
    public function params()
    {
            return array(                                     
            );
    }
    
    public function beforeBlockSave(){
		return true;
    }
    
    public function afterBlockSave(){
		return true;
    }
}

?>
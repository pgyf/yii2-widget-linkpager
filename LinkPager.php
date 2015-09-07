<?php
namespace liyunfang\linkpager;

use yii\helpers\Html;

/**
 * Description of LinkPager
 *
 * @author liyunfang <381296986@qq.com>
 * @date 2015-09-07
 */
class LinkPager extends \yii\widgets\LinkPager{
    
    const POSITION_LEFT = 'left';
    const POSITION_RIGHT = 'right';

    /**
     * display pageSize
     */
    public $showPageSize = true;
    /**
     * pageSize list
     */
    public $pageSizeList = [10, 20, 30, 50];

    /**
     *  drop-down box position
     *  default is 'right'
     */
    public $dropDownPosition = 'right';
    
    private $dropDownOptions = ['class' => 'form-control','style' => 'display: inline-block;width:auto;margin-left:5px;margin-right:5px;margin-top:0px;'];

    /**
     * Executes the widget.
     * This overrides the parent implementation by displaying the generated page buttons.
     */
    public function run()
    {
        if ($this->registerLinkTags) {
            $this->registerLinkTags();
        }
        $leftContent = "";
        $rightContent = "";
        if($this->showPageSize && $this->pagination->totalCount > 0){
            $dropDownList = $this->renderPageDropDownList();
            if($this->dropDownPosition == static::POSITION_LEFT){
                $leftContent = $dropDownList;
            }
            else if($this->dropDownPosition == static::POSITION_RIGHT){
                $rightContent = $dropDownList;
            }
        }
        echo $leftContent.$this->renderPageButtons().$rightContent;
    }
    
    protected function renderPageDropDownList(){
        $pageSizeList = [];
        foreach ($this->pageSizeList as $value) {
            $pageSizeList[$value] = $value;
        }
        //$linkurl =  $this->pagination->createUrl($page);
        return Html::dropDownList($this->pagination->pageSizeParam, $this->pagination->getPageSize(), $pageSizeList, $this->dropDownOptions);
    }
}

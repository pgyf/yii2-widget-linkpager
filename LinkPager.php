<?php

namespace liyunfang\pager;

use Yii;
use yii\helpers\Html;

/**
 * Description of LinkPager
 *
 * @author liyunfang <381296986@qq.com>
 * @date 2015-09-07
 */
class LinkPager extends \yii\widgets\LinkPager
{
    public $options = [
        'class' => ['pagination'],
        'style' => [
            'margin-top' => '0',
            'margin-bottom' => '-4px',
        ],
    ];

    /**
     * {pageButtons} {customPage} {pageSize}
     */
    public $template = '
<div class="form-inline">
    <div class="form-group">{pageButtons}</div>
    <div class="form-group">
        <label>跳转到：</label>
        {customPage}
    </div>
    <div class="form-group">
        <label>每页：</label>
        {pageSize}
    </div>
</div>
';

    /**
     * pageSize list
     */
    public $pageSizeList = [10, 20, 30, 50];

    /**
     * pageSize style
     */
    public $pageSizeOptions = [
        'class' => 'form-control',
        'style' => ['width' => '80px'],
    ];

    /**
     * customPage style
     */
    public $customPageOptions = [
        'class' => 'form-control',
        'style' => ['width' => '50px'],
    ];


    /**
     * Executes the widget.
     * This overrides the parent implementation by displaying the generated page buttons.
     */
    public function run()
    {
        if ($this->registerLinkTags) {
            $this->registerLinkTags();
        }
        echo $this->renderPageContent();
    }

    protected function renderPageContent()
    {
        return preg_replace_callback('/\\{([\w\-\/]+)\\}/', function ($matches) {
            $name = $matches[1];
            if ('customPage' == $name) {
                return $this->renderCustomPage();
            } else if ('pageSize' == $name) {
                return $this->renderPageSize();
            } else if ('pageButtons' == $name) {
                return $this->renderPageButtons();
            }
            return '';
        }, $this->template);
    }

    protected function renderPageSize()
    {
        $pageSizeList = [];
        foreach ($this->pageSizeList as $value) {
            $pageSizeList[$value] = $value;
        }
        //$linkurl =  $this->pagination->createUrl($page);
        return Html::dropDownList($this->pagination->pageSizeParam, $this->pagination->getPageSize(), $pageSizeList, $this->pageSizeOptions);
    }

    protected function renderCustomPage()
    {
        $pageCount = $this->pagination->getPageCount();
        if ($pageCount < 2 && $this->hideOnSinglePage) {
            return '';
        }
        $page = 1;
        $params = Yii::$app->getRequest()->queryParams;
        if (isset($params[$this->pagination->pageParam])) {
            $page = intval($params[$this->pagination->pageParam]);
            if ($page < 1) {
                $page = 1;
            } else if ($page > $pageCount) {
                $page = $pageCount;
            }
        }
        return Html::textInput($this->pagination->pageParam, $page, $this->customPageOptions);
    }
}

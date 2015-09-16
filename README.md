# yii2-widget-linkpager
LinkPager widgets for Yii Framework 2.0
===============================
Increase the pageSize of the page drop-down box
![Effect picture 1](https://github.com/liyunfang/wr/blob/master/images/yii2-widget-linkpager-1.png "Effect picture 1")  
![Effect picture 2](https://github.com/liyunfang/wr/blob/master/images/yii2-widget-linkpager-2.png "Effect picture 2") 




Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
 composer require --prefer-dist liyunfang/yii2-widget-linkpager
```

or add

```
"liyunfang/yii2-widget-linkpager": "*"
```

to the require section of your `composer.json` file.

Requirements
------------
This extension require twitter-bootstrap

Usage
-----

Once the extension is installed, simply use it in your code by  :

GridView options
```php
    'filterSelector' => "select[name='".$dataProvider->getPagination()->pageSizeParam."'],input[name='".$dataProvider->getPagination()->pageParam."']",
    'pager' => [
        'class' => \liyunfang\pager\LinkPager::className(),
        //'template' => '{pageButtons} {customPage} {pageSize}',
        //'pageSizeList' => [10, 20, 30, 50],
        //'customPageWidth' => 50,
        //'customPageBefore' => ' Jump to ',
        //'customPageAfter' => ' Page ',
    ],
 ```
 
ModelSearch
```php
    public function search($params)
    {
        ...
        $pageSize = isset($params['per-page']) ? intval($params['per-page']) : 10;
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' =>  ['pageSize' => $pageSize,],
        ]);
        
 ```
2015-09-16 重构代码，增加自定义跳转页面文本框

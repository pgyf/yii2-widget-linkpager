# yii2-widget-linkpager
LinkPager widgets for Yii Framework 2.0
===============================
Increase the pageSize of the page drop-down box
![Effect picture 1](https://github.com/liyunfang/wr/blob/master/images/yii2-widget-linkpager-1.png "Effect picture 1")  




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
    'pager' => [
        'class' => \liyunfang\pager\LinkPager::className(),
        'showPageSize' => true,
        'dropDownPosition' => \liyunfang\pager\LinkPager::POSITION_RIGHT,
        'pageSizeList' => [10,20],
    ],
 ```
 

该扩展为gird的分页栏提供了页大小下拉框，可以显示在分页按钮的左边和右边两个位置

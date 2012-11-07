数値変換
======================
配列で渡したマップを元に数値を任意に変換する。

利用方法
------

### 10進数から62進数へ ###

```php
<?php
require_once './Digit.php';

/* 変換元となる配列を指定する */
$map = array_merge(range('0', '9'), range('a', 'z'), range('A', 'Z'));
$digit = new Digit($map);

echo $digit->encode(45783278930);
```

### 出力結果 ###
    
    NYpYiK
    

### 62進数から10進数へ ###

```php
<?php
require_once './Digit.php';

/* 変換元となる配列を指定する */
$map = array_merge(range('0', '9'), range('a', 'z'), range('A', 'Z'));
$digit = new Digit($map);

echo $digit->decode('67e4Lsr5');
```
### 出力結果 ###
    
    21540185562055
    

任意の配列
------

### 数値から任意の文字列へ ###

```php
<?php
require_once './Digit.php';

/* 変換元となる配列を指定する */
$map = array('z','x','c','v','b','n','m','<','>','?');
$digit = new Digit($map);

echo $digit->encode(63386);
```

### 出力結果 ###
    
    mvv>m
    

### 任意の配列から数値へ ###

```php
<?php
require_once './Digit.php';

/* 変換元となる配列を指定する */
$map = array('z','x','c','v','b','n','m','<','>','?');
$digit = new Digit($map);

echo $digit->decode('m<cb>m');
```
### 出力結果 ###
    
    672486
    

ライセンス
----------
Copyright &copy; 2012 Yujiro Takahashi  
Licensed under the [MIT License][MIT].  
Distributed under the [MIT License][MIT].  

[MIT]: http://www.opensource.org/licenses/mit-license.php

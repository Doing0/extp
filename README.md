


# 使用说明
## 介绍
> 1. 是基于ThinkPHP5(下简写TP5)重写的抛出异常类，故只能用于TP5内部不能适用于其他框架
> 2. 请用composer安装此包
> 3. 安装命令：`composer require doing/exceptionfromtp dev-master`
> 4. 请先更改TP5的配置选项引入此类（在application/config.php里面搜索`exception_handle`,默认值是空修改成`'exception_handle' => '\exceptionfromtp5\src\ExceptionHandler',`）  



# 使用说明

## 介绍

> 1.  是基于ThinkPHP5(下简写TP5)重写的抛出异常类，故只能用于TP5内部不能适用于其他框架
> 2.  请用composer安装此包
> 3.  安装命令：`composer require doing/extp dev-master`
> 4.  请先更改TP5的配置选项引入此类（在application/config.php里面搜索`exception_handle`,默认值是空修改成`'exception_handle' => '\extp\core\ExceptionHandler',`
> 5. 返回信息说明
 ~~~
{ 
     msg: "我是提示信息",//提示信息
     error_code: "40000",//自定义错误码
     request_url: "/credits/public/index.php/api/index/index"//请求地址
 }
 说明:http的状态码code是提现在header上
 ~~~

## 使用步骤

> 前提：必须引用对应的类如:`use extp\diy\NullException;`

使用场景一:快速抛出异常

```
//直接New一个doing/extp/src/diy下的自定义异常对象快速抛出异常
throw New  NullException();  
说明:取对象类的默认属性值:msg，error_code,code
```
使用场景二:自定义返回信息
```
$exceptions['msg'] = '我是提示信息';
$exceptions['error_code'] = '40000'//自定义错误码
exceptions['code'] = '401'//http的状态码
throw New NullException($exceptions);
说明:自定义类有三个属性:需要更改哪一个就传哪一个，如果只修改提示信息msg和自定义错误码,其他信息就使类的默认属性值,那就就只需要传msg和error_code
以上代码可以简写throw New NullException(['msg'=>'我是提示信息','error_code'=>'4000'])
使用时不建议修改code属性,因为是基于http的状态码封装的
```

自定义类的封装

> 1.  建议按Http的状态码分类封装:如NullExcption就代码的是抛出http状态码为404异常:用于查找无数据等情况抛出
> 2.  自定义错误类放在doing/extp/src/diy文件夹下
> 3.  建议直接复制我已封装的类进行修改
> 4.  3中主要修改地方:文件名和类名保持一直且采用驼峰命名首字母大写全部采用Exception结尾。修改三个对应属性值code,msg,errorCode
> 5.  已封装的3个自定义类说明:NullException(用于404异常及查找无数据等)，ParamsException(用于客户端请求的参数错误异常),SuccessException(用于操作成功如删除成功等操作)
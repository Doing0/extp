# 使用说明

## 介绍

> 1.  是基于ThinkPHP5(下简写TP5)重写的抛出异常类，故只能用于TP5内部不能适用于其他框架
> 2.  请用composer安装此包
> 3.  安装命令：`composer require doing/extp dev-master`
> 4.  请先更改TP5的配置选项引入此类（在application/config.php里面搜索`exception_handle`,默认值是空修改成`'exception_handle' => '\extp\core\ExceptionHandler',`

## 使用步骤

> 前提：必须引用对应的类如:`use extp\diy\NullException;`

使用场景一:快速抛出异常

    <span class="hljs-comment">//直接New一个doing/extp/src/diy下的自定义异常对象快速抛出异常</span>
    <span class="hljs-function"><span class="hljs-keyword">throw</span> New <span class="hljs-title">NullException</span><span class="hljs-params">()</span></span>;  
    说明:取对象类的默认属性值:msg，error_code,code
    `</pre>

    使用场景二:自定义返回信息

    <pre>`<span class="hljs-variable">$exceptions</span>[<span class="hljs-string">'msg'</span>] = <span class="hljs-string">'我是提示信息'</span>;
    <span class="hljs-variable">$exceptions</span>[<span class="hljs-string">'error_code'</span>] = <span class="hljs-string">'40000'</span>;<span class="hljs-comment">//自定义错误码</span>
    <span class="hljs-variable">$exceptions</span>[<span class="hljs-string">'code'</span>] = <span class="hljs-string">'401'</span>;<span class="hljs-comment">//http的状态码</span>
    <span class="hljs-keyword">throw</span> <span class="hljs-keyword">New</span> NullException(<span class="hljs-variable">$exceptions</span>);
    说明:自定义类有三个属性:需要更改哪一个就传哪一个，如果只修改提示信息msg其他信息就使类内的默认值,那就就只需要传<span class="hljs-variable">$exceptions</span>[‘msg’]
    以上代码可以简写
    <span class="hljs-keyword">throw</span> <span class="hljs-keyword">New</span> NullException([<span class="hljs-string">'msg'</span>=><span class="hljs-string">'我是提示信息'</span>,<span class="hljs-string">'error_code'</span>=><span class="hljs-string">'40000'</span>]);

自定义类的封装

> 1.  建议按Http的状态码分类封装:如NullExcption就代码的是抛出http状态码为404异常:用于查找无数据等情况抛出
> 2.  自定义错误类放在doing/extp/src/diy文件夹下
> 3.  建议直接复制我已封装的类进行修改
> 4.  3中主要修改地方:文件名和类名保持一直且采用驼峰命名首字母大写全部采用Exception结尾。修改三个对应属性值code,msg,errorCode
> 5.  已封装的3个自定义类说明:NullException(用于404异常及查找无数据等)，ParamsException
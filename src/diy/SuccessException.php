<?php
/**
 * Created by PhpStorm
 * PROJECT:于TP5的异常类
 * User: Doing <vip.dulin@gmail.com>
 * Desc:成功异常类:用于操作成功时(比如删除成等)
 */
namespace exceptionfromtp\lib;
class SuccessException extends BaseException {
    //HTTP 状态码：400，200，500...
    public $code = 200;
    //错误具体信息：最好用英文
    public $msg = 'success';
    //自定义的错误码
    public $errorCode = '200';

}//class
<?php
/**
 * Created by PhpStorm
 * PROJECT:于TP5的异常类
 * User: Doing <vip.dulin@gmail.com>
 * Desc:查找数据为空时抛出的异常
 */
namespace exceptionfromtp\lib;
class NullException extends BaseException {
    //HTTP 状态码：400，200，500...
    public $code = 404;
    //错误具体信息：最好用英文
    public $msg = 'Request resources were not found!';
    //自定义的错误码-自己改写
    public $errorCode = '40000';

}//class
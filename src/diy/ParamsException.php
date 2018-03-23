<?php
/**
 * Created by PhpStorm
 * PROJECT:于TP5的异常类
 * User: Doing <vip.dulin@gmail.com>
 * Desc:客户端请求参数错误:数据验证每通过时抛出的异常
 */
namespace extp\diy;
use extp\core\BaseException;

class ParamsException extends BaseException {
    //HTTP 状态码：400，200，500...
    public $code = 400;
    //错误具体信息：最好用英文
    public $msg = 'Request parameter error!';
    //自定义的错误码-自己改写
    public $errorCode = '40000';

}//class
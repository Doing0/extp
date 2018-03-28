<?php
/**
 * Created by PhpStorm
 * PROJECT:于TP5的异常类
 * User: Doing <vip.dulin@gmail.com>
 * Desc:服务器错误code=600是第三方(微信或支付宝等异常,500是自己服务器问题)
 */
namespace extp\diy;
use extp\core\BaseException;
class ServiceException extends BaseException {
    //HTTP 状态码：400，200，500...
    public $code = 600;
    //错误具体信息：最好用英文
    public $msg = 'Third party server exception please contact supplier';
    //自定义的错误码
    public $errorCode = '60000';

}//class
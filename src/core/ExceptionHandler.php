<?php
/**
 * Created by PhpStorm
 * PROJECT:基于TP5的异常类
 * User: Doing <vip.dulin@gmail.com>
 * Desc:重写框架的Hander类（异常处理类）
 * 启动：改配置文件application/config.php
 * 异常处理handle类 默认是留空的,留空使用 \think\exception\Handle
 * 修改如下
 * 'exception_handle' => '\exceptionfromtp5\src\ExceptionHandler',
 */


namespace extp\core;
use think\Log;

class ExceptionHandler extends Handle {
    private $code;
    private $msg;
    private $errorCode;
    //覆盖Handle里面的render方法
    public function render(\Exception $e)
    {
        if ($e instanceof BaseException)
        {
            # 客户端错误
            //自定义的异常
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        }# 服务器端错误
        else
        {
            //默认render 页面呈现
            if (config('app_debug')) return parent::render($e);
            $this->code = 500;
            $this->msg = 'I am sorry!';
            $this->errorCode = 999;
            $this->recordErrorLog($e);
        }
        $result = [
            'msg'         => $this->msg,
            'error_code'  => $this->errorCode,
            //需要返回客户端当前请求的URL路径
            'request_url' => request()->url()
        ];
        return json($result, $this->code);
    }//render

    /*
    * 将异常写入日志
    */

    private function recordErrorLog(\Exception $e)
    {
        //初始化Log
        Log::init([
                      'type'  => 'File',
                      'path'  => LOG_PATH,
                      'level' => ['error']
                  ]);
//        Log::record($e->getTraceAsString());
        //写入日志
        Log::record($e->getMessage(), 'error');
    }
}//class
<?php
    
        $postArr = $GLOBALS['HTTP_RAW_POST_DATA'];
        $postObj = simplexml_load_string( $postArr );
        if( strtolower( $postObj->MsgType) == 'event'){
            if( strtolower($postObj->Event == 'subscribe') ){
                //回复用户消息(纯文本格式)
                $toUser   = $postObj->FromUserName;
                $fromUser = $postObj->ToUserName;
                $time     = time();
                $msgType  =  'text';
                $content  = '欢迎关注我们的微信公众账号'.$postObj->FromUserName.'-'.$postObj->ToUserName;
                $template = "<xml>
                                <ToUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%s</CreateTime>
                                <MsgType><![CDATA[%s]]></MsgType>
                                <Content><![CDATA[%s]]></Content>
                                </xml>";
                $info     = sprintf($template, $toUser, $fromUser, $time, $msgType, $content);
                echo $info;
            }
        }
		if(strtolower( $postObj->MsgType) == 'text')
        {
          	$content = $postObj->Content;
          	if($content=='天气'){
           		$time     = time();
                $toUser   = $postObj->FromUserName;
                $fromUser = $postObj->ToUserName;
            	$msgType  =  'text';
            	$content  = '北京天气：霾,0~10℃';
            	$template = "<xml>
                                <ToUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%s</CreateTime>
                                <MsgType><![CDATA[%s]]></MsgType>
                                <Content><![CDATA[%s]]></Content>
                                </xml>";
            	$info     = sprintf($template, $toUser, $fromUser, $time, $msgType, $content);
            	echo $info;
            }

        }

    
<?php

/*
 **************************************************************************
 *                                                                        *
 *               DDDDD   iii                 dd  iii                      *
 *               DD  DD      mm mm mmmm      dd      mm mm mmmm           *
 *               DD   DD iii mmm  mm  mm  ddddd  iii mmm  mm  mm          *
 *               DD   DD iii mmm  mm  mm dd  dd  iii mmm  mm  mm          *
 *               DDDDDD  iii mmm  mm  mm  ddddd  iii mmm  mm  mm          *
 *                                                                        *
 **************************************************************************
 **************************************************************************
 *                                                                        *
 * Part of the Dimdim V 1.5 alpha Codebase (http://www.dimdim.com)	      *
 *                                                                        *
 * Copyright (c) 2007 Dimdim Inc. All Rights Reserved.                    *
 *                                                                        *
 *                                                                        *
 * This code is licensed under the Dimdim License                         *
 * For details please visit http://www.dimdim.com/license                 *
 *                                                                        *
 **************************************************************************
 * 中文化 by Eric Hsin http://moodle.tw
 */


$string['beep'] = '嗶';
$string['dimdimintro'] = '會議議程';
$string['details'] = '簡短註解';
$string['dimdimname'] = 'Dimdim會議室名稱';
$string['conferencename'] = '網路會議名稱';
$string['maxparticipants'] = '最多參與人數';
$string['dimdimreport'] = 'dimdim sessions';
$string['dimdimtime'] = 'Next dimdim time';
$string['startschedule'] = '開始的時間';
$string['configmethod'] = 'The normal dimdim method involves the clients regularly contacting the server for updates. It requires no configuration and works everywhere, but it can create a large load on the server with many dimdimters.  Using a server daemon requires shell access to Unix, but it results in a fast scalable dimdim environment.';
$string['configoldping'] = 'What is the maximum time that may pass before we detect that a user has disconnected (in seconds)? This is just an upper limit, as usually disconnects are detected very quickly. Lower values will be more demanding on your server. If you are using the normal method, <strong>never</strong> set this lower than 2 * dimdim_refresh_room.';
$string['configrefreshroom'] = 'How often should the dimdim room itself be refreshed? (in seconds).  Setting this low will make the dimdim room seem quicker, but it may place a higher load on your web server when many people are dimdimting';
$string['configrefreshuserlist'] = 'How often should the list of users be refreshed? (in seconds)';
$string['configserverhost'] = '設定Dimdim伺服器的網址或IP';
$string['configserverip'] = 'The numerical IP address that matches the above hostname';
$string['configservermax'] = 'Max number of clients allowed';
$string['configserverport'] = '設定Dimdim伺服器的連接埠';
$string['currentdimdims'] = 'Active dimdim sessions';
$string['currentusers'] = '目前用戶';
$string['deletesession'] = 'Delete this session';
$string['deletesessionsure'] = 'Are you sure you want to delete this session?';
$string['donotusedimdimtime'] = 'Don\'t publish any dimdim times';
$string['enterdimdim'] = '點按這裏立刻進入 xyz ';
$string['errornousers'] = 'Could not find any users!';
$string['explaingeneralconfig'] = 'These settings are <strong>always</strong> into effect';
$string['explainmethoddaemon'] = 'These settings matter <strong>only</strong> if you have selected \"dimdim server daemon\" for dimdim_method';
$string['explainmethodnormal'] = 'These settings matter <strong>only</strong> if you have selected \"Normal method\" for dimdim_method';
$string['generalconfig'] = '一般設定';
$string['helpdimdimting'] = 'Help with dimdimting';
$string['idle'] = 'Idle';
$string['messagebeepseveryone'] = '$a beeps everyone!';
$string['messagebeepsyou'] = '$a has just beeped you!';
$string['messageenter'] = '$a has just entered this dimdim';
$string['messageexit'] = '$a has left this dimdim';
$string['messages'] = '訊息';
$string['methodnormal'] = '正常的方法';
$string['methoddaemon'] = 'dimdim server daemon';
$string['modulename'] = 'Dimdim 網路會議';
$string['modulenameplural'] = 'Dimdim 網路會議';
$string['neverdeletemessages'] = 'Never delete messages';
$string['nextsession'] = 'Next scheduled session';
$string['noguests'] = 'The dimdim is not open to guests';
$string['nomessages'] = '目前沒有訊息';
$string['5'] = '5位';
$string['10'] = '10位';
$string['15'] = '15位';
$string['20'] = '20位';
$string['enable'] = '啟用';
$string['disable'] = '取消';
$string['lobby'] = '等待區';
$string['enterprise_check_label'] = 'Do you have Dimdim account';
$string['invalid_schedule'] = 'Meeting can not be in past';
$string['enterprise_username_label'] = 'Dimdim account User name';
$string['enterprise_password_label'] = 'Dimdim account Password';
$string['maxmikes'] = 'Attendee Mikes';
$string['meetinghours'] = '會議持續幾小時';
$string['1hour'] = '1小時';
$string['2hour'] = '2小時';
$string['3hour'] = '3小時';
$string['4hour'] = '4小時';
$string['5hour'] = '5小時';
$string['0mike'] = '0';
$string['1mike'] = '1';
$string['2mike'] = '2';
$string['3mike'] = '3';
$string['4mike'] = '4';
$string['5mike'] = '5';
$string['Audio Video'] = '影音';
$string['audio'] = '只有聲音';
$string['audio-video'] = '聲音+影像';
$string['Video-Chat'] =  '影像+聊天';
$string['NoAudioVideo'] = '沒有聲音和影像';
$string['Video-Only'] = '只有影像';
$string['Network'] = '網路品質';
$string['dial-up'] = '電話撥接';
$string['cable/dsl'] = 'ADSL或Cable';
$string['lan'] = '區域網路';
$string['repeatdaily'] = 'At the same time every day';
$string['repeatnone'] = 'No repeats - use the specified time only ';
$string['repeattimes'] = '重複';
$string['repeatweekly'] = 'At the same time every week';
$string['savemessages'] = 'Save past sessions';
$string['seesession'] = 'See this session';
$string['sessions'] = 'dimdim sessions';
$string['strftimemessage'] = '%%H:%%M';
$string['studentseereports'] = 'Everyone can view past sessions';
$string['viewreport'] = 'View past dimdim sessions';
$string['privatechat'] = '私人對話';
$string['publicchat'] = '公開對話';
$string['screencast'] = '螢幕展示';
$string['whiteboard'] = '電子白板';
$string['participantlist'] = '與會者清單';
$string['interntoll'] = '國際長途電話';
$string['moderatorpasscode'] = '主席的Passcode';
$string['attendeepasscode'] = '與會者的Passcode';
$string['displaydialinfo'] = '顯示電話資訊';
$string['meetingkey'] = 'Meeting Key';
$string['hostkey'] = 'Host Key';
$string['feedback'] = '回饋信箱';
$string['collaburl'] = 'Collabration URL';
$string['assistantenabled'] = '使用小幫手';
$string['assignmikeonjoin'] = '與會者可以使用麥克風';
$string['handsfreeonload'] = '講話時免用手點按';
$string['allowattendeeinvite'] = '允許與會者邀請他人';
$string['featuredocshare'] = '文件分享';
$string['featurecobshare'] = '共同瀏覽';
$string['featurerecording'] = '錄影';
$string['dimdim:deletelog'] = '刪除日誌紀錄';
$string['dimdim:dimdim'] = '使用Dimdim';
$string['dimdim:readlog'] = '讀取日誌紀錄';
?>


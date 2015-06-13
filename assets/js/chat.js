
        var mchatTimerId = -1;
        var mmchat_list_limit = 10;
        var mchat_more_count = 5;
        var mchat_list = new Array();

        var mcheckDuplicate = function(chat_one) {

            for(var i=(mchat_list.length-1);i>=0;i--) {

                if(mchat_list[i][3] == chat_one[3]) {

                    return true;
                }
            }

            return false;

        }

        var maddChats = function(arrayOfData) {

            for(var i=0;i<arrayOfData.length;i++) {

                var chat_one = arrayOfData[i];

                if(!mcheckDuplicate(chat_one)) {

                    mchat_list.push(chat_one);
                    
                    var child = '';
                    
                    child += '<li style="height:55px;background:white;width:100%;border-top:1px solid #fff;">';
                    child += '    <span class="rounded-image topbar-profile-image" style="width:44px;margin:5px 5px;background:white;border:1px solid #bbb;float:left;">';
                    child += '        <img src="' + chat_one[4] + '">';
                    child += '    </span>';
                    child += '    <span style="color:#5b5b5b;width:230px;float:right;margin-top:7px;margin-right:10px;">'; 
                    child += '        <span style="float:left;"><b>'+chat_one[3]+'</b></span>';
                    child += '        <span style="float:right;">'+chat_one[2]+'</span>';
                    child += '        <span style="width:240px;float:left;">'+chat_one[1]+'</span>';
                    child += '    </span>';
                    child += '</li>';

                    $("#unread").prepend(child);
                    $("#unreadBadge").text(parseInt($("#unreadBadge").text()) + 1);

                    time = chat_one[3];
                }
            }
        }

        var mgetNewChats = function () {

            var time = "";
            if(mchat_list.length > 0) {
                time = mchat_list[mchat_list.length-1][3];
            }

            var get_url = "/chat/getUnread";

            $.getJSON(get_url, function (data){

                if(mchatTimerId != -1) {

                    maddChats(data);

                }
            });
        }

        var mstartTimer = function() {

            if(mchatTimerId == -1) {

                mchatTimerId = setInterval(function () {
                    mgetNewChats(0);
                }, 2000);
            }
        }

        var mstopTimer = function() {

            if(mchatTimerId != -1) {

                clearInterval(mchatTimerId);
                mchatTimerId = -1;
            }
        }

        
        $(document).ready(function() {

            mstartTimer();

        });
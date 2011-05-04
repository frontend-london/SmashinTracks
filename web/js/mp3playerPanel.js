
    var flashvars={
            application:"swf/smashinPlayerPanel.swf",
            config:"swf/res/xmls/config.xml"
    };
    var params = {
            menu: "false",
            salign: "lt",
            allowscriptaccess :"sameDomain",
            wmode:"transparent"
    };
    var attributes = {
            id:"smashinPlayerPanel",
            name:"smashinPlayerPanel"
    };
    
    swfobject.embedSWF("swf/mainLoader_v01.swf", "mp3player-inner", "100%", "102", "10.0.0", "expressInstall.swf",flashvars,params,attributes);
    
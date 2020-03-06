var temp = {
    appid : soa_chat_object.chat_appid,         //you app id key
    appkey: soa_chat_object.chat_appkey,         //your app key
    domain: soa_chat_object.chat_domain,            //add domain
    global: soa_chat_object.global,                                        //if you want global chat, all users can chat else set flag to zero
    id: soa_chat_object.current_user_id,                                            //logged in user id
    element: '#mychatwindow',                       //element on which chat window will append
    colorScheme: '741e88'                        //element on which chat window will append
}
if (soa_chat_object.onlyAudio == "1") {
    temp.onlyAudio = 1;
}
if (soa_chat_object.admin_selection != ''){
    temp.toid = soa_chat_object.admin_selection;
}
ocs.init(temp);
console.log(temp);










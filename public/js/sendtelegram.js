var telegram_bot_id = "6398817589:AAE2zwkh588CWUhNXAtIqTCM-zwGUNV6umQ"; // token'ni o'rniga Siz yaratgan Bot tokenini yozing
//chat id
var chat_id = 5008167286; // 1111'ni o'rniga habar borishi kerak bo'lgan joyni ID'sini yozing (Batafsil videoda)
var category, phone;
var ready = function() {
    category = document.getElementById("category").value;
    phone = document.getElementById("phone").value;
    phone = "Category: " + category +  "\ntel:"+phone ;
};
var sendtelegram = function() {
    ready();
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": "https://api.telegram.org/bot" + telegram_bot_id + "/sendMessage",
        "method": "POST",
        "headers": {
            "Content-Type": "application/json",
            "cache-control": "no-cache"
        },
        "data": JSON.stringify({
            "chat_id": chat_id,
            "text": message
        })
    };
    $.ajax(settings).done(function(response) {
        console.log(response);
    });
    document.getElementById("category").value = "";
    document.getElementById("phone").value = "";
    return false;
};

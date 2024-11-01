(function($) {
    'use strict';
     
    $(document).on("click", '#social-share-buttons a', function() {
        var channel = $(this).attr("data-channel");

        function openDialog(path) {
            window.open(path, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');
        }

        if (channel) {
            var text = encodeURIComponent($(this).attr('data-text'));
            var url = encodeURIComponent($(this).attr("data-url"));
        
            if (channel === "facebook") {
                openDialog('https://www.facebook.com/sharer/sharer.php?u=' + url + '&t=' + text);
            }

            if (channel === "twitter") {
                openDialog('https://twitter.com/intent/tweet?url=' + url + '&text=' + text);
            }

            if (channel === "linkedin") {
                openDialog('https://www.linkedin.com/sharing/share-offsite/?url=' + url);
            }

            if (channel === "whatsapp") {
                var message = "";
                if (text) {
                    message = text + " - " + url;
                } else {
                    message = url;
                }
                window.location.href = "whatsapp://send?text=" + message;
            }

            if (channel === "fbmessenger") {
                window.open('fb-messenger://share?link=' + url); //May need app id? fb-messenger://share?link={url}&app_id={app_id}
            }

            if (channel === "pinterest") {
                openDialog('https://pinterest.com/pin/create/link/?url=' + url);
            }

            if (channel === "reddit") {
                openDialog('https://reddit.com/submit?url=' + url + '&title=' + text);
            }
        }
    });
	
})(jQuery);
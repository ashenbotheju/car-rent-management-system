document.addEventListener("DOMContentLoaded", function () {
    // Show the chat icon after 2 seconds
    setTimeout(function () {
        var messageIcon = document.getElementById("message-icon");
        if (messageIcon) {
            messageIcon.classList.remove("hidden", "opacity-0", "translate-y-10");
            messageIcon.classList.add("opacity-100", "translate-y-0");
        }
    }, 3000);
});

// Function to open chat tray
function toggleChatTray() {
    var chatTray = document.getElementById("chat-tray");
    var messageIcon = document.getElementById("message-icon");

    // Toggle tray visibility and animate message icon
    if (chatTray.classList.contains("hidden")) {
        chatTray.classList.remove("hidden");
        messageIcon.classList.add("transform", "translate-y-10");
    } else {
        chatTray.classList.add("hidden");
        messageIcon.classList.remove("transform", "translate-y-10");
    }
}


function openWhatsApp() {
    var phoneNumber = "94762507409";
    var message = encodeURIComponent("Hi, could you provide more details on pricing, available vehicles, and rental terms?");
    var url = "https://wa.me/" + phoneNumber + "?text=" + message;

    // Open the URL in a new tab
    window.open(url, '_blank');
    closeChatTray();
}
function closeChatTray() {
    var chatTray = document.getElementById("chat-tray");
    var messageIcon = document.getElementById("message-icon");

    // Hide the chat tray and reset the message icon position
    chatTray.classList.add("hidden");
    messageIcon.classList.remove("transform", "translate-y-10");
}


// Close the tray when user clicks outside
document.addEventListener("click", function (event) {
    var chatTray = document.getElementById("chat-tray");
    var messageIcon = document.getElementById("message-icon");
    // Check if the click is outside of the chat tray and message icon
    if (!chatTray.contains(event.target) && !messageIcon.contains(event.target)) {
        chatTray.classList.add("hidden");
        messageIcon.classList.remove("transform", "translate-y-10");
    }
});

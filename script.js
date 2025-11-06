const el = {
    searchUser: document.querySelector('#searchUser'),
    userList: document.querySelector('.user-list'),

    users: document.querySelectorAll('.user-item'),
    onlineIndicator: document.querySelectorAll('.onlineStatus'),
    messagesContainer: document.querySelector('.messages-container'),
    messageInput: document.querySelector('.message-input'),
    sendButton: document.querySelector('.send-button'),
};

//============= adding onclick listener on user list ============
el.users.forEach((user) => {
    user.addEventListener('click', () => {
        console.log('User clicked:', user);
    });
});
//============= Search User Functionality ===================
el.searchUser.addEventListener('input', () => {
    console.log('Input event detected');
    const filter = el.searchUser.value.toLowerCase();

    const users = el.userList.getElementsByClassName('user-item');
    console.log('Users:', users);

    Array.from(users).forEach((user) => {
        const userName = user
            .querySelector('.user-name')
            .textContent.toLowerCase();

        if (userName.indexOf(filter) > -1) {
            user.style.display = '';
        } else {
            user.style.display = 'none';
        }
    });
});

//============= Send Message Functionality ===================
el.sendButton.addEventListener('click', () => {
    sendMessage();
});
document.addEventListener('keyup', (event) => {
    if (event.key == 'Enter') {
        sendMessage();
    }
});

function sendMessage() {
    const messageText = el.messageInput.value.trim();
    if (messageText !== '') {
        const messageElement = document.createElement('div');
        const preMessageElement = document.createElement('pre');
        messageElement.classList.add('message', 'sent');
        preMessageElement.textContent = messageText;
        messageElement.appendChild(preMessageElement);
        el.messagesContainer.appendChild(messageElement);
        el.messageInput.value = '';
    }
}

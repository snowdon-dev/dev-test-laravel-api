require('./bootstrap');

const axiosModule = require('axios');
const axios = axiosModule.create({
    withCredentials: true
});

let token = '';
const getConfig = () => ({
    headers: { Authorization: `Bearer ${token}` }
});
const loginBtn = document.getElementById('loginBtn');
const registerBtn = document.getElementById('registerBtn');
const logoutBtn = document.getElementById('logoutBtn');

const submitMessageBtn = document.getElementById('submitMessageBtn');
const messageDOM = document.getElementById('messageBody');
const messageContainer = document.getElementById('messageContainer');

const submitMessageEvent = async () => {
    const payload = {
        message: messageDOM.value,
    };
    try {
        axios.post('/api/messages/', payload, getConfig());

        messageDOM.value = ''; 
        loadEvent();
    } catch (e) {
        alert('Failed to submit a message');
    }
};

const logoutEvent = async () => {
    await axios.post('/logout');
    console.log('logged out');
};

const registerEvent = async () => {

};

const renderMessageEvent = (messages) => {
    const template = (message) => `author: ${message.user.name}, message: ${message.message}, createdAt: ${message.created_at}`;

    let body = '<ul>';
    messages.forEach((message) => {
        body += '<li>'+template(message)+'</li>';
    });
    messageContainer.innerHTML = body;
};

const loadEvent = async () => {
    try {
        const response = await axios.get('/api/messages', getConfig());
        renderMessageEvent(response.data);
    } catch(e) {
        alert("Failed getting the messages");
    }
};

const loginEvent = async () => {
    const payload = {
        email: "dale@snowdon.dev",
        password: "123456789",
    }
    await axios.get("/sanctum/csrf-cookie");
    const response = await axios.post("api/sanctum/token", payload);
    const tokenTmp = response.data.token;

    // set token
    token = tokenTmp;

    loadEvent();
};

loginBtn.addEventListener('click', loginEvent);
registerBtn.addEventListener('click', registerEvent);
logoutBtn.addEventListener('click', logoutEvent);

submitMessageBtn.addEventListener('click', submitMessageEvent);
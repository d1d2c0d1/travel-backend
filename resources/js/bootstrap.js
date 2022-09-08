window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

window.createClient = (url) => {

    if( !url || !url.length || (url.length && url.length <= 0) ) {
        url = 'ws://ws.u-gid.com:9001';
    }

    let client = {};
    client.ws = new WebSocket(url);

    client.ws.onopen = function () {
        console.log('подключился');
    }

    client.ws.onmessage = function (message) {
        console.log('Message: %s', message.data);
    }

    client.echo = (value) => {
        client.ws.send(JSON.stringify({action: 'echo', data: value.toString()}));
    }

    client.ping = () => {
        client.ws.send(JSON.stringify({action: 'ping'}));
    }

    return client;
}

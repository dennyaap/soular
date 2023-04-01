async function postJSON(route, data, method, _token) {
    const response = await fetch(route, {
        method,
        headers: {
            "Content-type": "application/json;charset=utf-8",
        },
        body: JSON.stringify({
            data,
            _token,
        }),
    });
    return await response.json();
}

async function getJSON(route) {
    const response = await fetch(route);

    return await response.json();
}

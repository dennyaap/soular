async function getAllProducts(csrf_token, route, data = {}) {
    return await postJSON(
        route,
        {
            data,
        },
        csrf_token
    );
}

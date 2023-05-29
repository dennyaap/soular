async function getAllArtists(csrf_token, route, data = {}) {
    return await postJSON(
        route,
        {
            data,
        },
        csrf_token
    );
}

async function getSearchArtists(csrf_token, route, data = {}) {
    return await postJSON(
        route,
        {
            data,
        },
        csrf_token
    );
}

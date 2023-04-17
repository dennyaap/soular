async function getAllArtists(csrf_token, data = {}) {
    return await postJSON(
        "http://127.0.0.1:8000/artists/getAll",
        {
            data,
        },
        csrf_token
    );
}
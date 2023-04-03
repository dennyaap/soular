async function getAllProducts(csrf_token, data = {}) {
    return await postJSON(
        "http://127.0.0.1:8000/paintings/getAll",
        {
            data,
        },
        csrf_token
    );
}

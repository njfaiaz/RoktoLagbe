function autocompleteInput(
    inputId,
    listId,
    hiddenId,
    url,
    extraParams = {},
    onItemClick = null
) {
    $(`#${inputId}`).on("keyup", function () {
        let query = $(this).val();
        if (!query) return;

        let params = {
            query,
            ...extraParams(),
        };

        $.get(url, params, function (data) {
            $(`#${listId}`).empty();
            data.forEach((item) => {
                $(`#${listId}`).append(
                    `<li class="form-control bg-blush" data-id="${
                        item.id
                    }" data-name="${item[`${inputId}_name`]}">${
                        item[`${inputId}_name`]
                    }</li>`
                );
            });
        });
    });

    $(document).on("click", `#${listId} li`, function () {
        const id = $(this).data("id");
        const name = $(this).data("name");
        $(`#${inputId}`).val(name);
        $(`#${hiddenId}`).val(id);
        $(`#${listId}`).empty();

        if (onItemClick) onItemClick();
    });
}

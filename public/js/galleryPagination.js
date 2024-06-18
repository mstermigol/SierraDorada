document.addEventListener("DOMContentLoaded", function () {
    const images = JSON.parse(
        document.getElementById("galleryData").dataset.images
    );
    const folderPath =
        document.getElementById("galleryData").dataset.folderPath;
    const itemsPerPage = 8;
    let currentPage = 1;
    const deletedImages = [];

    function showImages(page) {
        const gallery = document.getElementById("gallery");
        const noImagesMessage = document.getElementById("noImagesMessage");
        gallery.innerHTML = "";

        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;
        const paginatedImages = images.slice(start, end);

        if (paginatedImages.length > 0) {
            paginatedImages.forEach((image) => {
                const imgWrapper = document.createElement("a");
                imgWrapper.href = `${folderPath}/${image}`;
                imgWrapper.target = "_blank";
                imgWrapper.className = "img-wrapper";

                const img = document.createElement("img");
                img.src = `${folderPath}/${image}`;
                img.alt = "Image";
                img.className = "img-fluid img-gallery";

                imgWrapper.appendChild(img);
                gallery.appendChild(imgWrapper);
            });
            noImagesMessage.style.display = "none";
        } else {
            noImagesMessage.style.display = "block";
        }

        // Disable buttons if on the first or last page
        const prevPageButton = document.getElementById("prevPage");
        const nextPageButton = document.getElementById("nextPage");
        prevPageButton.classList.toggle("my-disabled", page === 1);
        nextPageButton.classList.toggle(
            "my-disabled",
            page * itemsPerPage >= images.length
        );
    }

    function handlePagination() {
        const prevPageButton = document.getElementById("prevPage");
        const nextPageButton = document.getElementById("nextPage");

        prevPageButton.addEventListener("click", () => {
            if (currentPage > 1) {
                currentPage--;
                showImages(currentPage);
            }
        });

        nextPageButton.addEventListener("click", () => {
            if (currentPage * itemsPerPage < images.length) {
                currentPage++;
                showImages(currentPage);
            }
        });
    }

    function initGallery() {
        const totalPages = Math.ceil(images.length / itemsPerPage);
        const paginationControls = document.getElementById(
            "pagination-controls"
        );

        if (totalPages <= 1) {
            paginationControls.style.setProperty('display', 'none', 'important');
        } else {
            paginationControls.style.setProperty('display', 'flex', 'important');
        }
        showImages(currentPage);
        handlePagination();
    }

    initGallery();
});

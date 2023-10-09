document.addEventListener("DOMContentLoaded", function () {
    const dataTable = document.getElementById("dataTable");
    const listRestaurant = document.getElementById("list-restaurant");
    const searchInput = document.getElementById("searchInput");
    const pagination = document.getElementById("pagination");

    let currentPage = 1;
    const itemsPerPage = 2;
    let timeoutId;
    var selectedSortOption = "";
    var selectedFilterOption = "";
    var selectedCatOption = "";
    var selectedTypeOption = "";

    var sortOptions = document.querySelectorAll(".menu-sort li");
    sortOptions.forEach(function (option) {
        option.addEventListener("click", function () {
            // Remove the "active" class from all sort options
            sortOptions.forEach(function (opt) {
                opt.classList.remove("active");
            });

            this.classList.add("active");

            selectedSortOption = this.getAttribute("data-sort");
            console.log(selectedSortOption);
            selectedCatOption = this.getAttribute("category");
            console.log(selectedCatOption);

            updateTable();
        });
    });

    var filterOptions = document.querySelectorAll(".menu-filter li");
    filterOptions.forEach(function (option) {
        option.addEventListener("click", function () {
            filterOptions.forEach(function (opt) {
                opt.classList.remove("active");
            });

            this.classList.add("active");

            selectedFilterOption = this.getAttribute("data-filter");
            selectedTypeOption = this.getAttribute("type");

            // console.log(selectedFilterOption);
            // console.log(selectedTypeOption);

            updateTable();
        });
    });

    // Fungsi untuk mengisi tabel dengan data restoran
    function isiTabel(data) {
        listRestaurant.innerHTML = "";
        data.forEach(function (cardHTML) {
            listRestaurant.innerHTML += cardHTML;
            });
    }

    // make pagination buttons
    function createPaginationButtons(totalPages) {
        pagination.innerHTML = "";
        if (currentPage > 1) {
            const prevButton = document.createElement("button");
            prevButton.textContent = "<";
            prevButton.addEventListener("click", () => {
                currentPage--;
                updateTable();
            });
            pagination.appendChild(prevButton);
        }

        //first
        const firstButton = document.createElement("button");
        firstButton.textContent = "First";
        firstButton.addEventListener("click", () => {
            currentPage = 1;
            updateTable();
        });
        pagination.appendChild(firstButton);

        for (let i=1; i <= totalPages; i++) {
            const button = document.createElement("button");
            button.textContent = i;
            button.addEventListener("click", () => {
                currentPage = i;
                updateTable();
            });
            pagination.appendChild(button);
        }

        //last
        const lastButton = document.createElement("button");
        lastButton.textContent = "Last";
        lastButton.addEventListener("click", () => {
            currentPage = totalPages;
            updateTable();
        });
        pagination.appendChild(lastButton);

        if (currentPage < totalPages) {
            const nextButton = document.createElement("button");
            nextButton.textContent = ">";
            nextButton.addEventListener("click", () => {
                currentPage++;
                updateTable();
            });
            pagination.appendChild(nextButton);
        }
    }

    function updateTable() {
        const searchQuery = searchInput.value.trim();
        // console.log(searchQuery);
        
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `../../../api/search.php?page=${currentPage}&search=${searchQuery}&sort_option=${selectedSortOption}&cat_option=${selectedCatOption}&filter_option=${selectedFilterOption}&type_option=${selectedTypeOption}&action=admin`, true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
                const response = JSON.parse(xhr.responseText);
                const { data, totalPages } = response;
                isiTabel(data);
                createPaginationButtons(totalPages);
            }
        };

        xhr.send();
    }

    // event listener for search
    searchInput.addEventListener("input", function () {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(updateTable, 200);
    });

    updateTable();
});

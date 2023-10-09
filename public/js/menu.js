document.addEventListener("DOMContentLoaded", function () {
    const listMenu = document.getElementById("menu-list");
    const restoID = parseInt(document.getElementById("resto_id").innerHTML);

    let currentPage = 1;
    const itemsPerPage = 5;
    let timeoutId;

    function isiTabel(data) {
        listMenu.innerHTML = "";
        data.forEach(function (cardHTML) {
            listMenu.innerHTML += cardHTML;
        });
    }

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
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `../../../api/menu.php?restoID=${restoID}&page=${currentPage}`, true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
                const response = JSON.parse(xhr.responseText);
                isiTabel(response.data);
                createPaginationButtons(response.totalPages);
            }
        };

        xhr.send();
    }

    updateTable();
});
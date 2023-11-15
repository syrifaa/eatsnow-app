document.addEventListener("DOMContentLoaded", function () {
    const listReview = document.getElementById("review-list");
    
    function isiTabel(data) {
        listReview.innerHTML = "";
        data.forEach(function (cardHTML) {
            listReview.innerHTML += cardHTML;
        });
    }
    
    function updateTable() {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `../../../api/menu.php?restoID=${restoID}&page=${currentPage}`, true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
                const response = JSON.parse(xhr.responseText);
                isiTabel(response.data);
            }
        };

        xhr.send();
    }

    updateTable();
});
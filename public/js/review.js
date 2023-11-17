document.addEventListener("DOMContentLoaded", function () {
    const listReview = document.getElementById("review-list");
    const restoID = parseInt(document.getElementById("resto_id").innerHTML);
    
    function isiTabel(data) {
        listReview.innerHTML = "";
        if (data == null) {
            listReview.innerHTML = "<p>Belum ada review</p>";
        }else if (data === "error"){
            listReview.innerHTML = "<p>Terjadi kesalahan</p>";
        }
        else{
            data.forEach(function (cardHTML) {
                listReview.innerHTML += cardHTML;
            });
        }
    }
    
    function updateTable() {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `../../../api/review.php?restoID=${restoID}`, true);

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
function refreshData() {
    $.ajax({
        url: "/api/orders",
        method: "GET",
        dataType: "json",
        headers: { token: window.localStorage["token"] },
        success: (res) => {
            console.log(res);
            var data = res.data.data;
            var content = "";

            for (var i = 0; i < data.length; i++) {
                var item = data[i];
                var btnhapus = `<a href='' class='btn btn-danger mx-2 link-hapus' data-id='${item.id}'>Hapus</a>`;
                var linkEdit = `<a href='' class='btn btn-warning link-edit' data-id='${item.id}'>Edit</a>`;
                // console.log(item.id);
                content += `
                <tr>
                    <td>${i + 1}</td>
                    <td>${item.order_date}</td>
                    <td>${item.product_title}</td>
                    <td>${item.price}</td>
                    <td>${item.qty}</td>
                    <td>${item.first_name} ${item.last_name}</td>
                    <td>${btnhapus}${linkEdit}</td>
                </tr>
            `;
            }
            $("table.table tbody").html(content);
        },
        error: (res, status, err) => {
            console.log(res);
            alert("terjadi Kesalahan");
        },
    });
}

function hapus(id) {
    $.ajax({
        url:'api/orders/'+id,
        method:'DELETE',
        type:'json',
        headers:{ 'token' : window.localStorage['token']},
        success:(res)=>{
            alert('Data berhasil dihapus');
            refreshData();
        },
        error: (res, status, err)=>{
            alert('Gagal hapus data');
        }

    });
}

function edit(id) {}

document.addEventListener("DOMContentLoaded", (c) => {
    refreshData();



    $("body").on("click", "a.link-hapus", (e) => {
        var c = confirm("Yakin ingin dihapus?");
        if (c === true) {
            // var id = $(this).data("id");
            // console.log();
            hapus(7);
        }
    });

    $("body").on("click", "a.link-edit", (e) => {
        var id = $(e.currentTarget).data("id");
        edit(id);
    });
});

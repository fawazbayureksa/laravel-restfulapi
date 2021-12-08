document.addEventListener("DOMContentLoaded", (c) => {
    $("button#btn-login").on("click", () =>
        //jika tombol login di tekan di click
        {
            var email = $("input[name=email]").val(); //mengambil isi dari form email
            var sandi = $("input[name=password]").val(); //mengambil isi dari form password

            $.ajax({
                url: "/api/auth",
                dataType: "json",
                method: "GET",
                headers: {
                    //mengirim header Authorization = base64encode (emil:sandi)
                    'Authorization': "basic " + window.btoa(email + ":" + sandi),
                },
                success: (msg) => {
                    alert(
                        `Selamat datang ${msg.data.first_name} ${msg.data.last_name}`
                    );
                    window.localStorage.setItem("token", msg.data.token); //Mengambil dan menyimpan token dari sever
                    window.location = "/list-order"; //pindah ke list order
                },
                error: (req, status, err) => {
                    console.log(req); // menampilkan log eror
                    alert(req.responseJSON.error[0]); // menampilkan pesan eror dari server
                },
            });
        }
    );
});

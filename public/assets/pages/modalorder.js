function fillCustumer(){
    $.ajax({
        url:'api/auth',
        method:'GET',
        dataType:'json',
        headers:{ 'token' : window.localStorage['token']},
        success:(res)=>{
            var data = res.data.data;
            var content = '';
            for(var i=0;i<data.length(); i++){
                var item = data[i];
                content+= `<option value='${item.id}'>${item.first_name} ${item.last_name}</option>`
            }
            $('select[name=costumer_id]').html(content);
        },
        error:(res, status, err)=>{
            alert('terjadi kesalahan baca data isi select custumer');
        }

    });
}
function fillProduct(){

}

function save(){

}

document.addEventListener("DOMContentLoaded", (c) => {
    fillProduct();
    fillCustumer();

    $('button#simpan'),on('click',(e)=>{
        save();
    });
});

function fillCustumer(){
    $.ajax({
        url:'api/custumers',
        method:'GET',
        dataType:'json',
        headers:{ 'token' : window.localStorage['token']},
        success:(res)=>{
            var data = res.data.data;
            var content = '';
            for(var i=0;i<data.length; i++){
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
    $.ajax({
        url:'api/products',
        method:'GET',
        dataType:'json',
        headers:{ 'token' : window.localStorage['token']},
        success:(res)=>{
            var data = res.data.data;
            var content = '';
            for(var i=0;i<data.length; i++){
                var item = data[i];
                content+= `<option value='${item.id}'>${item.title} | ${item.category}</option>`
            }
            $('select[name=product_id]').html(content);
        },
        error:(res, status, err)=>{
            alert('terjadi kesalahan baca data isi select product');
        }

    });
}

function save(id){
    $.ajax({
        url:'api/orders' + (id !== undefined ? `/${id}`:''),
        method:id !== undefined ? 'PATCH':'POST',
        dataType:'json',
        data:{
            'product_id' : $('select[name=product_id]').val(),
            'costumer_id' :$('select[name=costumer_id]').val(),
            'qty' : $('input[name=qty]').val(),
        },
        headers: { 'token' : window.localStorage['token']},
        success:(res)=>{
            console.log('sukses',res);
            alert('Data order berhasil di tambahkan');
            $('#exampleModal').modal('hide');
            refreshData();
        },
        error: (res,status, err)=>{
            console.log('error:',res);
            alert('Order gagal ditambahkan ')
        }
    });
}

document.addEventListener("DOMContentLoaded", (c) => {
    fillProduct();
    fillCustumer();

    $('button#simpan').on('click',(e)=>{
        save();
    });
});

    $(document).ready(function () {
 
        var dataHari = ['Minggu','Senin','Selasa','Rabu','Kamis','Jum&#39at','Sabtu'];
        var dataKeteranga = ['Pagi','Siang','Malam'];
        var dataBulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

        var datetime = null,
            date = null,
            keterangan = null,
            timeContent = null;

        var update = function () {
            date = moment(new Date());
            let tanggal = date.format('D');
            let hari = date.format('d');
            let bulan = date.format('M');
            let tahun = date.format('Y');
            datetime.html(date.format('H:mm:ss'));
            timeContent.html(dataHari[hari]+', '+ tanggal+' '+dataBulan[bulan-1]+' '+tahun);
        };

        datetime = $('#time-content');
        timeContent = $('#date-content');
        keteranganContent = $('#keterangan-content');
        update();
        setInterval(update, 1000);

        var d = new Date(); // for now
            d.getHours(); // => 9
            d.getMinutes(); // =>  30
            d.getSeconds(); // => 51
console.log (d.getHours())
if ( d.getHours() > 1 && d.getHours() < 12 ){
    $('#greeting-content').html('Selamat Pagi');

}else if (d.getHours() >= 12 && d.getHours() < 15 ){
    $('#greeting-content').html('Selamat Siang');
}else if (d.getHours() >= 15 && d.getHours() < 18 ){
    $('#greeting-content').html('Selamat Sore');
}else if (d.getHours() >= 18 && d.getHours() < 24 ){
    $('#greeting-content').html('Selamat Malam');
}

    })

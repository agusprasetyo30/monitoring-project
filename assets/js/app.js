$(document).on('nifty.ready', function() {

   var dataXY = new Array();

   // Digunakan untuk menampung URL dari view
   let url = $('#base_url').val();

   $.get(url, function( hasil ) {

      Morris.Bar({
         element: 'demo-morris-bar',
         data: [{"bulan":"January","piutang":40,"penagihan":10}, {"bulan":"February","piutang":30,"penagihan":20}, {"bulan":"March","piutang":60,"penagihan":20}],
         xkey: 'bulan',
         ykeys: ['piutang', 'penagihan'],
         labels: ['Piutang (%)', 'Penagihan (%)'],
         gridEnabled: true,
         gridLineColor: 'rgba(0,0,0,.1)',
         gridTextColor: '#8f9ea6',
         gridTextSize: '11px',
         barColors: ['#e00000', '#12db00'],
         resize:true,
         hideHover: 'auto'
      });
   }, "json");


   console.log( dataXY );

   console.log(url);
});
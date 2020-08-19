<?php session_start();
include "Connections/connect_mysql.php";?>
<div class="page-title">
    <div class="title_left">
     <h3>History Barcode</h3>
         </div>
    </div>
<div class="row">
 <div class="col-md-12">
    <div class="x_panel">
     <div class="x_title">
        <h2>History</h2>
       <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
           <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
             </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
         <li><a class="close-link"><i class="fa fa-close"></i></a>
         </li>
       </ul>
       <div class="clearfix"></div>
     </div>
     <div class="x_content">
    <table id="tablehistory" class="table table-striped table-bordered">
            <thead>
                 <tr>
                    <th>ลำดับ</th>
                    <th>รหัสพนักงาน</th>
                    <th>รหัสลูกค้า</th>
                    <th>สาขา</th>
                    <th>บาร์โค้ด</th>
                    <th>บาร์โค้ดราคา</th>
                    <th>วันที่ใช้</th>
                 </tr>
                </thead>
              <tfoot>
                     <tr>
                        <th>ลำดับ</th>
                        <th>รหัสพนักงาน</th>
                        <th>รหัสลูกค้า</th>
                        <th>สาขา</th>
                        <th>บาร์โค้ด</th>
                        <th>บาร์โค้ดราคา</th>
                        <th>วันที่ใช้</th>
                     </tr>
                </tfoot>
                <?php $sql_chk = 'SELECT * FROM tblcheck';
                      $objchk = mysql_query($sql_chk);

                      ?>
                <tbody>
                    <?php while ($row = mysql_fetch_array($objchk)) {
                           $chk_id = $row['chk_id'];
                           $chk_cuse = $row['chk_use_code'];
                           $chk_customer = $row['chk_customer'];
                           //$chk_order = $row['chk_num_order'];
                           $row['chk_bran_id'];
                           $row['chk_cup_id'];
                           $chk_day = $row['chk_day_using'];
                    $sql = 'SELECT * FROM tblbrand, tblcupong WHERE bran_id = "'.$row['chk_bran_id'].'" AND cup_id = "'.$row['chk_cup_id'].'"';
                    $result = mysql_query($sql);
                    while ($row1 = mysql_fetch_array($result)) {
                      $bran = $row1['bran_names'];
                      $cup = $row1['cup_code'];
                      $row1['cup_price'];

                      $sql2 = 'SELECT * FROM tblmoney WHERE mon_id = "'.$row1['cup_price'].'"';
                      $result2 = mysql_query($sql2);
                        while ($row2 = mysql_fetch_array($result2)) {
                          $mon = $row2['mon_name'];
                    ?>
                     <tr>
                        <td><?php echo $chk_id; ?></td>
                        <td><?php echo $chk_cuse;?></td>
                        <td><?php echo $chk_customer; ?></td>
                        <!--<td><?php //echo $chk_order; ?></td>-->
                        <td><?php echo $bran; ?></td>
                        <td><?php echo $cup; ?></td>
                        <td><?php echo $mon; ?></td>
                        <td><?php echo $chk_day; ?></td>
                    </tr>
                  <?php }}}mysql_close($c);?>
                </tbody>
         </table>
     </div>
</div>
</div>
</div>
<script>
$(document).ready(function() {
    $('#tablehistory').DataTable( {
        dom: 'Bfrtip',
        lengthMenu: [
        [ 25, 50, -1 ],
        [ '25 rows', '50 rows', 'Show all' ]
    ],
          buttons: [
            'pageLength', 'print' , 'excel' ,
            {extend: 'colvis',
            collectionLayout: 'fixed two-column'},
            {extend: 'pdfHtml5',
            text: '<i class="fa fa-file-pdf-o"></i>',
            titleAttr: 'PDF',
            filename: 'Data using barcode export',
            message: 'PDF History using Barcode.'}
        ]
    } );
} );
    //กำหนดส่วน footer ให้มีช่องพิมพ์ textbox สำหรับค้นหา
		$('#tablehistory tfoot th').each( function () {
			var title = $(this).text();
			if((title != 'แก้ไข') && (title !='ลบ') && (title !='ลายเซนต์') && (title !='รูปภาพ') ){
				$(this).html( '<input type="text" placeholder=" '+title+'" style="width:90%;"  />' );
			}else{
				$(this).html(' ');
			}
		} );

		// Apply the search ค้นหาจาก footer ------------------------
		$('#tablehistory').DataTable().columns().every( function () {
			var that = this;
			//ค้นหาจาก footer
			$( 'input', this.footer() ).on( 'keyup change', function () {
				if ( that.search() !== this.value ) {
					that
						.search( this.value )
						.draw();
				}
			} );
		} );

</script>

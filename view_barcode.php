<?php session_start();
date_default_timezone_set("Asia/Bangkok");
include "Connections/connect_mysql.php";?>
<div class="page-title">
    <div class="title_left">
     <h3>Barcode Management </h3>
         </div>
    </div>
<div class="row">
 <div class="col-md-12">
    <div class="x_panel">
     <div class="x_title">
        <h2>Barcode</h2>
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
    <table id="tablebarcode" class="table table-striped table-bordered">
            <thead>
                 <tr>
                    <th>ลำดับ</th>
                    <th>รหัสบาร์โค้ด</th>
                    <th>ราคา</th>
                    <th>วันที่ใช้งาน</th>
                    <th>วันที่หมดอายุ</th>
                    <th>สถานะการใช้งาน</th>
                    <th>แก้ไข/ลบ</th>
                 </tr>
                </thead>
                <tfoot>
                     <tr>
                        <th>ลำดับ</th>
                        <th>รหัสบาร์โค้ด</th>
                        <th>ราคา</th>
                        <th>วันที่ใช้งาน</th>
                        <th>วันที่หมดอายุ</th>
                        <th>สถานะการใช้งาน</th>
                        <th>แก้ไข/ลบ</th>
                     </tr>
                   </tfoot>
                <?php $sql_barcodeS = 'SELECT * FROM tblcupong';
                      $objbarcodeS = mysql_query($sql_barcodeS);

                      ?>
                <tbody>
                    <?php while ($row = mysql_fetch_array($objbarcodeS)) {
                           $barid  = $row['cup_id'];
                           $barcode = $row['cup_code'];
                           $price = $row['cup_price'];
                           $datestart = $row['cup_day_start'];
                           $dateend = $row['cup_day_end'];
                           $status_code = $row['cup_status_using'];
                           $sql2 = 'SELECT * FROM tblmoney WHERE mon_id = "'.$row['cup_price'].'"';
                           $objmonS = mysql_query($sql2);
                           while ($row2 = mysql_fetch_array($objmonS)) {
                           $price = $row2['mon_name'];
                    ?>
                     <tr>
                        <td><?php echo $barid; ?></td>
                        <td><?php echo $barcode;?></td>
                        <td><?php echo $price; ?></td>
                        <td><?php echo $datestart; ?></td>
                        <td><?php echo $dateend; ?></td>
                        <td>
                          <?php if ($status_code == 1) { ?>
                            <?php if ($dateend < date('Y-m-d')) { ?>
                              <button class="form-control btn-warning" style="Width:120px;">หมดอายุ</button>
                            <?php }else{ ?>
                              <button class="form-control btn-success" style="Width:120px;">ใช้ได้ปกติ</button>
                            <?php } ?>
                          <?php }else { ?>
                            <button class="form-control btn-danger" style="Width:120px;">ใช้งานแล้ว</button>
                          <?php }?>
                        </td>
                        <td>
                             <a href="javascript:edit_barcode(<?=$barid?>);" class="btn btn-info btn-xs" ><i class="fa fa-pencil"></i> Edit </a>
                             <a href="javascript:delete_barcode(<?=$barid?>,'<?=$barcode?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                        </td>
                    </tr>
                  <?php }}mysql_close($c);?>
                </tbody>
         </table>
     </div>
</div>
</div>
</div>
<script>
    $(document).ready(function() {
        $('#tablebarcode').DataTable( {
            dom: 'Bfrtip',
            lengthMenu: [
            [ 25, 50, -1 ],
            [ '25 rows', '50 rows', 'Show all' ]
        ],
            buttons: [
              'pageLength', 'print' ,
              {extend: 'colvis',
              collectionLayout: 'fixed two-column'},
              {extend: 'pdfHtml5',
              text: '<i class="fa fa-file-pdf-o"></i>',
              titleAttr: 'PDF',
              filename: 'Data barcode export',
              message: 'PDF View Barcode.'}
            ]
        } );
    } );

    //กำหนดส่วน footer ให้มีช่องพิมพ์ textbox สำหรับค้นหา
		$('#tablebarcode tfoot th').each( function () {
			var title = $(this).text();
			if((title != 'แก้ไข/ลบ') && (title !='ลบ') && (title !='ลายเซนต์') && (title !='รูปภาพ') ){
				$(this).html( '<input type="text" placeholder=" '+title+'" style="width:90%;"  />' );
			}else{
				$(this).html(' ');
			}
		} );

		// Apply the search ค้นหาจาก footer ------------------------
		$('#tablebarcode').DataTable().columns().every( function () {
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

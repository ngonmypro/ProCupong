<?php session_start();
include "Connections/connect_mysql.php";?>
<div class="page-title">
    <div class="title_left">
     <h3>Branch Management</h3>
         </div>
    </div>
<div class="row">
 <div class="col-md-12">
    <div class="x_panel">
     <div class="x_title">
        <h2>Branch</h2>
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
    <table id="tablebranch" class="table table-striped table-bordered">
            <thead>
                 <tr>
                    <th>ลำดับ</th>
                    <th>สาขา</th>
                    <th>ชื่อย่อ</th>
                    <th>สร้างโดย</th>
                    <th>วันที่สร้าง</th>
                    <th>แก้ไขโดย</th>
                    <th>วันที่แก้ไข</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                 </tr>
                </thead>
                <tfoot>
                     <tr>
                       <th>ลำดับ</th>
                       <th>สาขา</th>
                       <th>ชื่อย่อ</th>
                       <th>สร้างโดย</th>
                       <th>วันที่สร้าง</th>
                       <th>แก้ไขโดย</th>
                       <th>วันที่แก้ไข</th>
                       <th>แก้ไข</th>
                       <th>ลบ</th>
                     </tr>
                  </tfoot>
                <?php $sql_userS = 'SELECT * FROM tblbrand';
                      $objuserS = mysql_query($sql_userS);

                      ?>
                <tbody>
                    <?php while ($row = mysql_fetch_array($objuserS)) {
                           $id = $row['bran_id'];
                           $name = $row['bran_name'];
                           $names = $row['bran_names'];
                           $creby = $row['bran_createby'];
                           $cretime = $row['bran_createtime'];
                           $upby = $row['bran_updateby'];
                           $uptime = $row['bran_updatetime'];
                    ?>
                     <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $name;?></td>
                        <td><?php echo $names;?></td>
                        <td><?php echo $creby; ?></td>
                        <td><?php echo $cretime; ?></td>
                        <td><?php echo $upby; ?></td>
                        <td><?php echo $uptime; ?></td>
                        <td>
                             <a href="javascript:edit_branch(<?=$id?>);" class="btn btn-info btn-xs" ><i class="fa fa-pencil"></i> Edit </a>
                        </td>
                        <td>
                             <a href="javascript:delete_branch(<?=$id?>,'<?=$name?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                         </td>
                    </tr>
                  <?php }mysql_close($c);?>
                </tbody>
         </table>
     </div>
</div>
</div>
</div>
<script charset="utf-8">
$(document).ready(function() {
  $('#tablebranch').DataTable( {
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
          filename: 'Data using barcode export',
          message: 'PDF History using Barcode.'}
      ]
  } );
} );

    //กำหนดส่วน footer ให้มีช่องพิมพ์ textbox สำหรับค้นหา
		$('#tablebranch tfoot th').each( function () {
			var title = $(this).text();
			if((title != 'แก้ไข') && (title !='ลบ') && (title !='ลายเซนต์') && (title !='รูปภาพ') ){
				$(this).html( '<input type="text" placeholder=" '+title+'" style="width:90%;"  />' );
			}else{
				$(this).html(' ');
			}
		} );

		// Apply the search ค้นหาจาก footer ------------------------
		$('#tablebranch').DataTable().columns().every( function () {
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

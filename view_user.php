<?php session_start();
include "Connections/connect_mysql.php";?>
<div class="page-title">
    <div class="title_left">
     <h3>Users Management</h3>
         </div>
    </div>
<div class="row">
 <div class="col-md-12">
    <div class="x_panel">
     <div class="x_title">
        <h2>Users</h2>
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
    <table id="tableuser" class="table table-striped table-bordered">
            <thead>
                 <tr>
                    <th>ลำดับ</th>
                    <th>รหัสพนักงาน</th>
                    <th>username</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>สาขา</th>
                    <th>กลุ่มผู้ใช้งาน</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                 </tr>
                </thead>
                <tfoot>
                     <tr>
                        <th>ลำดับ</th>
                        <th>รหัสพนักงาน</th>
                        <th>username</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>สาขา</th>
                        <th>กลุ่มผู้ใช้งาน</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>
                     </tr>
                  </tfoot>
                <?php $sql_userS = 'SELECT * FROM tbluser';
                      $objuserS = mysql_query($sql_userS);
                      ?>
                <tbody>
                    <?php while ($row = mysql_fetch_array($objuserS)) {
                           $useid = $row['use_id'];
                           $use_cuse = $row['use_code_user'];
                           $use_user = $row['use_username'];
                           $use_name = $row['use_name'];
                           $use_lname = $row['use_lname'];
                           $row['use_branid'];
                           $row['use_groid'];
                           $sql = 'SELECT * FROM tblbrand, tblgroup WHERE bran_id = "'.$row['use_branid'].'" AND gro_id = "'.$row['use_groid'].'"';
                           $obj = mysql_query($sql);
                           while ($row1 = mysql_fetch_array($obj)) {
                           $bran  = $row1['bran_names'];
                           $group = $row1['gro_name'];
                    ?>
                     <tr>
                        <td><?php echo $useid; ?></td>
                        <td><?php echo $use_cuse;?></td>
                        <td><?php echo $use_user; ?></td>
                        <td><?php echo $use_name; ?></td>
                        <td><?php echo $use_lname; ?></td>
                        <td><?php echo $bran; ?></td>
                        <td><?php echo $group; ?></td>
                        <td>
                             <a href="javascript:edit_user(<?=$useid?>);" class="btn btn-info btn-xs" ><i class="fa fa-pencil"></i> Edit </a>
                           </td>
                           <td>
                             <a href="javascript:delete_user(<?=$useid?>,'<?=$use_name?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                         </td>
                    </tr>
                  <?php }}mysql_close($c);?>
                </tbody>
         </table>
     </div>
</div>
</div>
</div>
<script charset="utf-8">
$(document).ready(function() {
  $('#tableuser').DataTable( {
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

/*$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );

    table.buttons().container()
        .insertBefore( '#example_filter' );
} );*/

    //กำหนดส่วน footer ให้มีช่องพิมพ์ textbox สำหรับค้นหา
		$('#tableuser tfoot th').each( function () {
			var title = $(this).text();
			if((title != 'แก้ไข/ลบ') && (title !='ลบ') && (title !='ลายเซนต์') && (title !='รูปภาพ') ){
				$(this).html( '<input type="text" placeholder=" '+title+'" style="width:90%;"  />' );
			}else{
				$(this).html(' ');
			}
		} );

		// Apply the search ค้นหาจาก footer ------------------------
		$('#tableuser').DataTable().columns().every( function () {
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

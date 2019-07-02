<!doctype html>
<html>
    <head>
        <title>Paginasi - Harviacode.com</title>
        <link rel="stylesheet" href="bootstrap.min.css"/>
    </head>
    <body>
        <?php 
//        includekan fungsi paginasi
        include 'pagination1.php';
//        koneksi ke database
        $koneksi = mysql_connect('localhost', 'root', '');
        $db = mysql_select_db('harviacode');
        
//        query
        $sql =  "SELECT * FROM provinsi ORDER BY provinsi";
        $result = mysql_query($sql);
        
        //pagination config start
        $rpp = 10; // jumlah record per halaman
        $reload = "index.php?pagination=true";
        $page = intval($_GET["page"]);
        if($page<=0) $page = 1;  
        $tcount = mysql_num_rows($result);
        $tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number
        $count = 0;
        $i = ($page-1)*$rpp;
        $no_urut = ($page-1)*$rpp;
        //pagination config end
        ?>
        <div class="container" style="margin-top: 50px">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Provinsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while(($count<$rpp) && ($i<$tcount)) {
                        mysql_data_seek($result,$i);
                        $data = mysql_fetch_array($result);
                    ?>
                    <tr>
                        <td width="80px">
                            <?php echo ++$no_urut;?> 
                        </td>

                        <td>
                            <?php echo $data ['provinsi']; ?> 
                        </td>
                        <td width="120px" class="text-center">
                            <a href="#"> Edit</a> |
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                    <?php
                        $i++; 
                        $count++;
                    }
                    ?>
                </tbody>
            </table>
            <div><?php echo paginate_one($reload, $page, $tpages); ?></div>
        </div>
    </body>
</html>

<!--harviacode.com-->
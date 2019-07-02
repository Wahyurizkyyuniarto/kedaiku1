</fieldset>
    <legend>Cari Pelamar Kerja</legend>
 <form id="fftgpelamar" method="POST" action="lap-pelamar.php">
   <table cellpadding="5">
          <tr>
             <td>Dari</td>
             <td>:</td>
             <td><input class="easyui-datebox" name="Dari" data-options="formatter:myformatter,parser:myparser" style="width:200px;height:25px"></td>
         </tr>
         <tr>
             <td>Sampai</td>
             <td>:</td>
             <td><input class="easyui-datebox" name="Sampai" data-options="formatter:myformatter,parser:myparser" style="width:200px;height:25px"></td>
         </tr>
         <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
<td><input class="easyui-linkbutton c1" type="submit" name="Submit"  value="Proses" style="width:100px;height:30px">
<input class="easyui-linkbutton c3" type="reset" name="reset" value="Close" style="width:100px;height:30px" onclick="javascript:$('#dlgtglpelamar').dialog('close')"></td>
        </tr>
        </table>
     </form>
</fieldset>
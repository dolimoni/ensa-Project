<html>
<body>
    <h3>Upload excel file (2eme annee) that contains the list of second year students</h3>
    <form enctype="multipart/form-data" method="post" action="<?= site_url('admin_controller/importExcel') ?>">
        <input type="file"  name="excelfile">
        <input type="submit"  name="submit" value="upload">
    </form>
</body>
</html>